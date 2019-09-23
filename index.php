<?php
session_start();
require_once "controllers/controller.app.php";
require_once "controllers/controller.presupuestos.php";
require_once "controllers/controller.gastos.php";

require_once "models/model.app.php";
require_once "models/model.presupuestos.php";
require_once "models/model.gastos.php";

$app = new ControlGastosAppCtrl();
$app -> appControlGastos();
?>
