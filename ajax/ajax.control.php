<?php
session_start();
require_once "../controllers/controller.app.php";
require_once "../controllers/controller.presupuestos.php";
require_once "../controllers/controller.gastos.php";
require_once "../controllers/controller.categorias.php";

require_once "../models/model.presupuestos.php";
require_once "../models/model.gastos.php";
require_once "../models/model.categorias.php";

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

  /*=============================================>>>>>
  = Consultar datos para la grafica =
  ===============================================>>>>>*/
  public function consultarDatosGraficaPAjax(){
    $tipo = $this->keyDato;
    $anio = date("Y");
    $consulta = PresupuestosCtrl::consultarDatosGrafica($anio);
    echo json_encode($tipo);
  }

  public function consultarDatosGraficaAjax(){
    $anio = date("Y");
    $datos = array();

    $presupuestos = PresupuestosCtrl::consultarDatosGrafica($_SESSION["userKey"],$anio);
    $gastos = GastosCtrl::consultarDatosGrafica($_SESSION["userKey"],$anio);

    array_push($datos,$presupuestos);
    array_push($datos,$gastos);

    echo json_encode($datos);
  }

  /*= Fin de Consultar datos para la grafica =*/
  /*=============================================<<<<<*/


  public function consultarDatosCategoria(){
    $key = $this->keyDato;
    $consulta = CategoriasCtrl::consultarDatosCategoria(ControlGastosAppCtrl::openCypher("decrypt",$key),"categorias");
    echo json_encode($consulta);
  }
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

if (isset($_POST["pgGraficaTipo"])) {
  $grafica = new ControlGastosAjax();
  $grafica -> consultarDatosGraficaAjax();
}

if (isset($_POST["categoriaEditar"])) {
  $consulta = new ControlGastosAjax();
  $consulta -> keyDato = $_POST["categoriaEditar"];
  $consulta -> consultarDatosCategoria();
}
?>
