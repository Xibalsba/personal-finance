<?php

class PresupuestosCtrl{
  /*=============================================>>>>>
  = Nuevo presupuesto =
  ===============================================>>>>>*/
  static public function nuevoPresupuesto(){
    if (isset($_POST["montoPresupuestoNuevo"])) {

      date_default_timezone_set('America/Mexico_City');
			$time = mktime();
			$fecha = date("Y-m-d h:i:s a", $time);

      $datos =  array(
        "key"=>$_SESSION["userKey"],
        "monto"=>$_POST["montoPresupuestoNuevo"],
        "pago"=>$_POST["formaPagoPresupuestoNuevo"],
        "fecha"=>$fecha,
        "estado"=>$_POST["estadoPresupuestoNuevo"],
        "comentario"=>$_POST["comentariosPresupuestoNuevo"],
      );

      $registro = PresupuestosMdl::nuevoPresupuesto($datos,"presupuestos");
      echo ($registro == "exito") ? '<script>window.location = "index.php?action=presupuestos&add=success"</script>':'<script>window.location = "index.php?action=presupuestos&add=error"</script>';
    }
  }

  /*=============================================>>>>>
  = mostrar todos los presupuestos =
  ===============================================>>>>>*/

  static public function mostrarPresupuestos(){
    if (isset($_SESSION["userKey"])) {
      $presupuestos = PresupuestosMdl::mostrarPresupuestos($_SESSION["userKey"],"presupuestos");

      $cont = 1;
      foreach ($presupuestos as $key => $presupuesto) {
        $fecha = ControlGastosAppCtrl::modificarFecha($presupuesto["fecha_presupuesto"]);
        echo '<tr>
                <th scope="row">'.$cont.'</th>
                <td>$'.number_format($presupuesto["monto_presupuesto"],2,'.',',').'MX<i class="mdi mdi-trending-up text-success ml-"></i></td>
                <td>'.$presupuesto["forma_pago_presupuesto"].'</td>
                <td>'.$fecha.'</td>
                <td>';
                $consultar = CategoriasMdl::consultarCategoria($_SESSION["userKey"],$presupuesto["estado_presupuesto"],"categorias");
                echo $consultar[0];
                echo '</td>
                <td>'.$presupuesto["comentario_presupuesto"].'</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary btnEditarPresupuesto" keyPresupuesto="'.ControlGastosAppCtrl::openCypher("encrypt",$presupuesto["id_presupuesto"]).'">Editar</button>
                    <button type="button" class="btn btn-secondary btnEliminarPresupuesto" keyPresupuesto="'.ControlGastosAppCtrl::openCypher("encrypt",$presupuesto["id_presupuesto"]).'">Eliminar</button>
                  </div>
                </td>
              </tr>';
              $cont++;
      }
    }
  }

  /*=============================================>>>>>
  = consultar los datos del presupuesto =
  ===============================================>>>>>*/

  static public function consultarDatosPresupuesto($key,$tabla){
    $consulta = PresupuestosMdl::consultarDatosPresupuesto($key,$tabla);
    return $consulta;
  }

  /*=============================================>>>>>
  = Editar los datos del presupuesto =
  ===============================================>>>>>*/
  static public function actualizarDatosPresupuesto(){
    if (isset($_POST["idPresupuestoEditar"])) {
      $datos = array(
        "key"=>ControlGastosAppCtrl::openCypher("decrypt",$_POST["idPresupuestoEditar"]),
        "monto"=>$_POST["montoPresupuestoEditar"],
        "pago"=>$_POST["formaPagoPresupuestoEditar"],
        "estado"=>$_POST["estadoPresupuestoEditar"],
        "comentarios"=>$_POST["comentariosPresupuestoEditar"]
      );

      $actualizar = PresupuestosMdl::actualizarDatosPresupuesto($datos,"presupuestos");
      echo ($actualizar == "exito") ? '<script>window.location = "index.php?action=presupuestos&edit=success"</script>':'<script>window.location = "index.php?action=presupuestos&edit=error"</script>';
    }
  }

  /*=============================================>>>>>
  = Eliminar presupuesto =
  ===============================================>>>>>*/

  static public function eliminarPresupuesto(){
    if (isset($_POST["keyPresupuestoEliminar"])) {
      $eliminar = PresupuestosMdl::eliminarPresupuesto(ControlGastosAppCtrl::openCypher("decrypt",$_POST["keyPresupuestoEliminar"]),"presupuestos");
      echo ($eliminar == "exito") ? '<script>window.location = "index.php?action=presupuestos&delete=success"</script>':'<script>window.location = "index.php?action=presupuestos&delete=error"</script>';
    }
  }

  /*=============================================>>>>>
  = Sumar presupuestos =
  ===============================================>>>>>*/

  static public function sumarPresupuestos($key,$tabla){
    $consulta = PresupuestosMdl::sumarPresupuestos($key,$tabla);
    return $consulta;
  }

  /*=============================================>>>>>
  = Sumar presupuestos =
  ===============================================>>>>>*/

  static public function sumarPresupuestosMes($key,$tabla){
    date_default_timezone_set('America/Mexico_City');
    $time = mktime();
    $mes = date("m",$time);
    $anio = date("Y",$time);

    $consulta = PresupuestosMdl::sumarPresupuestosMes($key,$mes,$anio,$tabla);
    return $consulta;
  }

  /*=============================================>>>>>
  = Graficas de gastos =
  ===============================================>>>>>*/
  static public function consultarDatosGrafica($user,$anio){
    $meses = array("01","02","03","04","05","06","07","08","09","10","11","12");
    $datos = array();
    foreach ($meses as $key => $mes) {
      $consultar = PresupuestosMdl::sumarPresupuestosMes($user,$mes,$anio,"presupuestos");
      if (empty($consultar[0])) {
        array_push($datos,"0");
      }else{
        array_push($datos,$consultar[0]);
      }
    }
    return $datos;
  }


  static public function porcentajeDePresupuestoPorCategoria(){
    $categorias =  CategoriasMdl::mostrarCategoriasTipo($_SESSION["userKey"],"PRESUPUESTO","categorias");
    $porcentajes = array();
    $total = 0;


    foreach ($categorias as $key => $categoria) {
      $color = ControlGastosAppCtrl::random_color();

      $consulta = PresupuestosMdl::sumarPresupuestos($_SESSION["userKey"],"presupuestos",$categoria["id_categoria"]);

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
}

?>
