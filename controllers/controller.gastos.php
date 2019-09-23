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
}

?>
