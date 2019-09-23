<?php

require_once "model.config.php";

class ControlGastosAppMdl extends Conexion{
  static public function linkControlGastos($link){
		if (isset($_SESSION["acceso"])) {
      if($link == "inicio" || $link == "presupuestos" || $link == "gastos" || $link == "ingreso" || $link == "perfil"){
        $page = "views/modules/".$link.".php";
      }else if($link == "salir"){
        $page = "views/system/salir.php";
      }
		}else{
			$page = "views/system/salir.php";
		}
		return $page;
	}

  static public function iniciarSesion($correo,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo_usuario=:correo");
    $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }
}

?>
