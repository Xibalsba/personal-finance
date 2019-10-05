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

  static public function contarUsuarios($tabla){
    $stmt=Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  static public function nuevoUsuario($datos,$tabla){
    $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_usuario,correo_usuario,contrasenia_usuario,imagen_usuario) VALUES (:nombre,:correo,:contrasenia,:imagen)");
    $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",$datos["correo"],PDO::PARAM_STR);
    $stmt->bindParam(":contrasenia",$datos["contrasenia"],PDO::PARAM_STR);
    $stmt->bindParam(":imagen",$datos["imagen"],PDO::PARAM_STR);
    return ($stmt->execute()) ? "exito":"error";
    $stmt->close();
  }
}

?>
