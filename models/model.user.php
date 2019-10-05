<?php

require_once "model.config.php";

class UsuariosMdl extends Conexion{
  static public function iniciarSesion($correo,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo_usuario=:correo");
    $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }
}

?>
