<?php
class CategoriasMdl extends Conexion{
    /*=============================================>>>>>
    = Agregar nueva categoria =
    ===============================================>>>>>*/
    static public function agregarCategoria($datos,$tabla){
      $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nom_categoria,tipo_categoria,descripcion_categoria,id_usuario) VALUES (:nombre,:tipo,:descripcion,:key)");
      $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
      $stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
      $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
      $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
      return ($stmt->execute()) ? 'exito':'error';
      $stmt->close();
    }
}
?>
