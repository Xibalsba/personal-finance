<?php
session_start();
require_once "controllers/controller.app.php";
require_once "controllers/controller.presupuestos.php";
require_once "controllers/controller.gastos.php";
require_once "controllers/controller.categorias.php";
require_once "controllers/controller.user.php";

require_once "models/model.app.php";
require_once "models/model.presupuestos.php";
require_once "models/model.gastos.php";
require_once "models/model.categorias.php";
require_once "models/model.user.php";

$app = new ControlGastosAppCtrl();
$app -> appControlGastos();
?>
