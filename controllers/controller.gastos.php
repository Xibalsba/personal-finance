<?php

class GastosCtrl{
  /*=============================================>>>>>
  = Nuevo gasto =
  ===============================================>>>>>*/
  static public function nuevoGasto(){
    if (isset($_POST["montoGastoNuevo"])) {

      date_default_timezone_set('America/Mexico_City');
			$time = mktime();
			$fecha = date("Y-m-d h:i:s a", $time);

      $datos = array(
        "key"=>$_SESSION["userKey"],
        "monto"=>$_POST["montoGastoNuevo"],
        "pago"=>$_POST["formaPagoGastoNuevo"],
        "productoservicio"=>$_POST["productoServicioGastoNuevo"],
        "fecha"=>$fecha,
        "tipo"=>$_POST["tipoGastoNuevo"],
        "estado"=>$_POST["estadoGastoNuevo"],
        "comentario"=>$_POST["comentarioGastoNuevo"]
      );

      $registro = GastosMdl::nuevoGasto($datos,"gastos");

      echo ($registro == "exito") ? '<script>window.location = "index.php?action=gastos&add=success"</script>':'<script>window.location = "index.php?action=gastos&add=error"</script>';
    }
  }

  /*=============================================>>>>>
  = Sumar presupuestos =
  ===============================================>>>>>*/

  static public function sumarGastos($key,$tabla){
    $consulta = GastosMdl::sumarGastos($key,$tabla);
    return $consulta;
  }

  /*=============================================>>>>>
  = Mostrar presupuestos =
  ===============================================>>>>>*/


  static public function mostrarGastos(){
    $gastos = GastosMdl::consultarGastos($_SESSION["userKey"],"gastos");

    $cont = 1;
    foreach ($gastos as $key => $gasto) {
      $fecha = ControlGastosAppCtrl::modificarFecha($gasto["fecha_gasto"]);
      echo '<tr>
              <th scope="row">'.$cont.'</th>
              <td>$'.number_format($gasto["monto_gasto"],2,'.',',').'MX<i class="mdi mdi-trending-down text-danger"></i></td>
              <td>'.$gasto["producto_servicio_gasto"].'</td>
              <td>'.$gasto["forma_pago_gasto"].'</td>
              <td>'.$fecha.'</td>
              <td>'.$gasto["tipo_gasto"].'</td>
              <td>';
              if ($gasto["estado_gasto"] == "LIQUIDADO") {
                echo '<span class="badge badge-success">'.$gasto["estado_gasto"].'</span></td>';
              } else if($gasto["estado_gasto"] == "ABONADO"){
                echo '<span class="badge badge-warning">'.$gasto["estado_gasto"].'</span></td>';
              }else{
                echo '<span class="badge badge-danger">'.$gasto["estado_gasto"].'</span></td>';
              }
        echo '</td>
              <td>'.$gasto["comentario_gasto"].'</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-secondary btnEditarGasto" keyGasto="'.ControlGastosAppCtrl::openCypher("encrypt",$gasto["id_gasto"]).'">Editar</button>
                  <button type="button" class="btn btn-secondary btnEliminarGasto" keyGasto="'.ControlGastosAppCtrl::openCypher("encrypt",$gasto["id_gasto"]).'">Eliminar</button>
                </div>
              </td>
            </tr>';
          $cont++;
    }
  }

  /*=============================================>>>>>
  = consultar los datos del presupuesto =
  ===============================================>>>>>*/

  static public function consultarDatosGasto($key,$tabla){
    $consulta = GastosMdl::consultarDatosGasto($key,$tabla);
    return $consulta;
  }


  /*=============================================>>>>>
  = Editar gasto =
  ===============================================>>>>>*/
  static public function editarGasto(){
    if(isset($_POST["keyGastoEditar"])){
      $datos = array(
        "key"=>ControlGastosAppCtrl::openCypher("decrypt",$_POST["keyGastoEditar"]),
        "monto"=>$_POST["montoGastoEditar"],
        "pago"=>$_POST["formaPagoGastoEditar"],
        "productoservicio"=>$_POST["productoServicioGastoEditar"],
        "tipo"=>$_POST["tipoGastoEditar"],
        "estado"=>$_POST["estadoGastoEditar"],
        "comentario"=>$_POST["comentarioGastoEditar"]
      );

      $editar = GastosMdl::editarGasto($datos,"gastos");

      echo ($editar == "exito") ? '<script>window.location = "index.php?action=gastos&edit=success"</script>':'<script>window.location = "index.php?action=gastos&edit=error"</script>';
    }
  }

  /*=============================================>>>>>
  = Eliminar presupuesto =
  ===============================================>>>>>*/

  static public function eliminarGasto(){
    if (isset($_POST["keyGastoEliminar"])) {
      $eliminar = GastosMdl::eliminarGasto(ControlGastosAppCtrl::openCypher("decrypt",$_POST["keyGastoEliminar"]),"gastos");
      echo ($eliminar == "exito") ? '<script>window.location = "index.php?action=gastos&delete=success"</script>':'<script>window.location = "index.php?action=gastos&delete=error"</script>';
    }
  }

  /*=============================================>>>>>
  = Graficas de gastos =
  ===============================================>>>>>*/
  static public function consultarDatosGrafica($user,$anio){
    $meses = array("01","02","03","04","05","06","07","08","09","10","11","12");
    $datos = array();
    foreach ($meses as $key => $mes) {
      $consultar = GastosMdl::sumarGastosMes($user,$mes,$anio,"gastos");
      if (empty($consultar[0])) {
        array_push($datos,"0");
      }else{
        array_push($datos,$consultar[0]);
      }
    }
    return $datos;
  }


  /*=============================================>>>>>
  = Ver porcentaje de gastos por categoria =
  ===============================================>>>>>*/

  static public function porcentajeDeGastoPorCategoria(){
    $categorias =  CategoriasMdl::mostrarCategoriasTipo($_SESSION["userKey"],"GASTO","categorias");
    $porcentajes = array();
    $total = 0;

    foreach ($categorias as $key => $categoria) {
      $color = ControlGastosAppCtrl::random_color();

      $consulta = GastosMdl::sumarGastos($_SESSION["userKey"],"gastos",$categoria["id_categoria"]);

      if ($consulta[0] != 0) {
        $datos = array(
          "nombre"=>$categoria["nom_categoria"],
          "color"=>'#'.$color,
          "total"=>$consulta[0]
        );

        array_push($porcentajes,$datos);
        $total += $consulta[0];
      }

    }
    // print_r($porcentajes);
    // echo "<br><br>Ordenamiento:<br>";

    foreach ($porcentajes as $key => $porcentaje) {
      $totales[$key] = $porcentaje["total"];
    }

    array_multisort($totales,SORT_DESC,$porcentajes);
    // print_r($porcentajes);
    // echo "<br>total: ".$total;

    /*----------- Sacar los porcentajes -----------*/
    foreach ($porcentajes as $key => $porcentaje) {
      // print_r($porcentaje);
      // echo "<br><br>".$porcentaje["nombre"]."<br>";
      // echo $porcentaje["color"]."<br>";
      // echo $porcentaje["total"]."<br>";
      $porcentaje_r = ControlGastosAppCtrl::porcentaje($total,$porcentaje["total"]);
      echo '<div class="progress-bar" role="progressbar" style="width: '.$porcentaje_r.'%;background:'.$porcentaje["color"].'" aria-valuenow="'.$porcentaje_r.'" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="'.$porcentaje["nombre"].': $'.number_format($porcentaje["total"],2,'.',',').'">'.$porcentaje_r.'%</div>';
    }
  }

  /*= End of Ver porcentaje de gastos por categoria =*/
  /*=============================================<<<<<*/
}

?>
