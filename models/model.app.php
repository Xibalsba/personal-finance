<?php

require_once "model.config.php";

class ControlGastosAppMdl extends Conexion{
  static public function linkControlGastos($link){
		if (isset($_SESSION["acceso"])) {
      if($link == "inicio" || $link == "presupuestos" || $link == "gastos" || $link == "ingreso" || $link == "perfil" || $link == "categorias"){
        $page = "views/modules/".$link.".php";
      }else if($link == "salir"){
        $page = "views/system/salir.php";
      }
		}else{
			$page = "views/system/salir.php";
		}
		return $page;
	}
}

?>
