<?php

require_once "model.config.php";

Class PresupuestosMdl{
  /*=============================================>>>>>
                  = Nuevo presupuesto =
  ===============================================>>>>>*/

  static public function nuevoPresupuesto($datos,$tabla){
    $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario_presupuesto,monto_presupuesto,forma_pago_presupuesto,fecha_presupuesto,estado_presupuesto,comentario_presupuesto) VALUES (:key,:monto,:pago,:fecha,:estado,:comentario)");+
    $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
    $stmt->bindParam(":monto",$datos["monto"],PDO::PARAM_STR);
    $stmt->bindParam(":pago",$datos["pago"],PDO::PARAM_STR);
    $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
    $stmt->bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
    $stmt->bindParam(":comentario",$datos["comentario"],PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
        = Consultar presupuestos por usuario=
  ===============================================>>>>>*/

  static public function mostrarPresupuestos($key,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario_presupuesto=:key ORDER BY id_presupuesto DESC");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  /*=============================================>>>>>
        = Consultar presupuestos por key=
  ===============================================>>>>>*/
  static public function consultarDatosPresupuesto($key,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_presupuesto=:key");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }
  /*=============================================>>>>>
        = Actualizar datos del presupuesto=
  ===============================================>>>>>*/
  static public function actualizarDatosPresupuesto($datos,$tabla){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET monto_presupuesto=:monto,forma_pago_presupuesto=:pago,estado_presupuesto=:estado,comentario_presupuesto=:comentarios WHERE id_presupuesto=:key");
    $stmt->bindParam(":monto",$datos["monto"],PDO::PARAM_STR);
    $stmt->bindParam(":pago",$datos["pago"],PDO::PARAM_STR);
    $stmt->bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
    $stmt->bindParam(":comentarios",$datos["comentarios"],PDO::PARAM_STR);
    $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
                = Eliminar presupuesto=
  ===============================================>>>>>*/

  static public function eliminarPresupuesto($key,$tabla){
    $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_presupuesto=:key");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
                =Sumar presupuestos=
  ===============================================>>>>>*/

  static public function sumarPresupuestos($key,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_presupuesto) FROM $tabla WHERE id_usuario_presupuesto=:key");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  /*=============================================>>>>>
                =Sumar presupuestos=
  ===============================================>>>>>*/

  static public function sumarPresupuestosMes($key,$mes,$anio,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT ROUND(SUM(monto_presupuesto),1) FROM $tabla WHERE ((MONTH(fecha_presupuesto)=:mes) AND (YEAR(fecha_presupuesto)=:anio)) AND (id_usuario_presupuesto=:key)");
    $stmt->bindParam(":mes",$mes,PDO::PARAM_STR);
    $stmt->bindParam(":anio",$anio,PDO::PARAM_STR);
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  /*=============================================>>>>>
            =Sumar presupuestos cuenta ahorro=
  ===============================================>>>>>*/

  static public function sumarPresupuestosItem($key,$estado,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_presupuesto) FROM $tabla WHERE id_usuario_presupuesto=:key AND estado_presupuesto=:estado");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }
}

?>
