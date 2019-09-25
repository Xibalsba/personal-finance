<?php
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
    static public function mostrarCategorias($tabla){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}
?>
