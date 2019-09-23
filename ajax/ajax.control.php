<?php

require_once "../controllers/controller.app.php";
require_once "../controllers/controller.presupuestos.php";
require_once "../controllers/controller.gastos.php";

require_once "../models/model.presupuestos.php";
require_once "../models/model.gastos.php";

class ControlGastosAjax{
  public $keyDato;
  /*=============================================>>>>>
  = Presupuestos =
  ===============================================>>>>>*/

  /*----------- Consultar datos del presupuesto -----------*/
  public function consultarDatosPresupuesto(){
    $key = $this->keyDato;
    $consulta = PresupuestosCtrl::consultarDatosPresupuesto(ControlGastosAppCtrl::openCypher("decrypt",$key),"presupuestos");
    echo json_encode($consulta);
  }

  /*= End of Presupuestos =*/
  /*=============================================<<<<<*/

  /*=============================================>>>>>
  = Gastos =
  ===============================================>>>>>*/

  public function consultarDatosGasto(){
    $key = $this->keyDato;
    $consulta = GastosCtrl::consultarDatosGasto(ControlGastosAppCtrl::openCypher("decrypt",$key),"gastos");
    echo json_encode($consulta);
  }

  /*= End of Gastos =*/
  /*=============================================<<<<<*/
}


if(isset($_POST["keyPresupuesto"])){
  $consulta = new ControlGastosAjax();
  $consulta -> keyDato = $_POST["keyPresupuesto"];
  $consulta -> consultarDatosPresupuesto();
}

if(isset($_POST["keyGasto"])){
  $consulta = new ControlGastosAjax();
  $consulta -> keyDato = $_POST["keyGasto"];
  $consulta -> consultarDatosGasto();
}
?>
