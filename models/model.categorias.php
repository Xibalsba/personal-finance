<?php

require_once "model.config.php";

class CategoriasMdl extends Conexion{
    /*=============================================>>>>>
    = Agregar nueva categoria =
    ===============================================>>>>>*/
    static public function agregarCategoria($datos,$tabla){
      $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nom_categoria,tipo_categoria,descripcion_categoria,fecha_categoria,id_usuario) VALUES (:nombre,:tipo,:descripcion,:fecha,:key)");
      $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
      $stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
      $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
      $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
      $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
      return ($stmt->execute()) ? 'exito':'error';
      $stmt->close();
    }

    /*=============================================>>>>>
    = Mostrar las categorias =
    ===============================================>>>>>*/
    static public function mostrarCategorias($key,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario=:key");
        $stmt->bindParam(":key",$key,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    static public function mostrarCategoriasTipo($key,$tipo,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario=:key AND tipo_categoria=:tipo");
        $stmt->bindParam(":key",$key,PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    /*=============================================>>>>>
    = Contar las categorias =
    ===============================================>>>>>*/

    static public function contarCategorias($tipo,$tabla){
      $stmt=Conexion::conectar()->prepare("SELECT COUNT(id_categoria) FROM $tabla WHERE tipo_categoria=:tipo");
      $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();
    }

    /*= Fin de Contar las categorias =*/
    /*=============================================<<<<<*/
}
?>
