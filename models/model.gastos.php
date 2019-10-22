<?php

require_once "model.config.php";

Class GastosMdl extends Conexion{
  /*----------- Nuevo gasto -----------*/
  static public function nuevoGasto($datos,$tabla){
    $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario_gasto,monto_gasto,forma_pago_gasto,producto_servicio_gasto,fecha_gasto,tipo_gasto,estado_gasto,comentario_gasto) VALUES (:key,:monto,:pago,:productoservicio,:fecha,:tipo,:estado,:comentario)");
    $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
    $stmt->bindParam(":monto",$datos["monto"],PDO::PARAM_STR);
    $stmt->bindParam(":pago",$datos["pago"],PDO::PARAM_STR);
    $stmt->bindParam(":productoservicio",$datos["productoservicio"],PDO::PARAM_STR);
    $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
    $stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
    $stmt->bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
    $stmt->bindParam(":comentario",$datos["comentario"],PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
                =Sumar gastos=
  ===============================================>>>>>*/

  static public function sumarGastos($key,$tabla,$type=null){
    if (is_null($type)) {
      $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_gasto) FROM $tabla WHERE id_usuario_gasto=:key");
    }else{
      $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_gasto) FROM $tabla WHERE id_usuario_gasto=:key AND tipo_gasto=:tipo");
      $stmt->bindParam(":tipo",$type,PDO::PARAM_STR);
    }
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  /*=============================================>>>>>
        = Consultar gastos por usuario=
  ===============================================>>>>>*/

  static public function consultarGastos($key,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario_gasto=:key ORDER BY id_gasto DESC");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  /*=============================================>>>>>
        = Consultar gastos por key=
  ===============================================>>>>>*/
  static public function consultarDatosGasto($key,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_gasto=:key");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  /*=============================================>>>>>
        = Editar gasto por key=
  ===============================================>>>>>*/
  static public function editarGasto($datos,$tabla){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET monto_gasto=:monto,forma_pago_gasto=:pago,producto_servicio_gasto=:productoservicio,tipo_gasto=:tipo,estado_gasto=:estado,comentario_gasto=:comentario WHERE id_gasto=:key");
    $stmt->bindParam(":key",$datos["key"],PDO::PARAM_STR);
    $stmt->bindParam(":monto",$datos["monto"],PDO::PARAM_STR);
    $stmt->bindParam(":pago",$datos["pago"],PDO::PARAM_STR);
    $stmt->bindParam(":productoservicio",$datos["productoservicio"],PDO::PARAM_STR);
    $stmt->bindParam(":tipo",$datos["tipo"],PDO::PARAM_STR);
    $stmt->bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
    $stmt->bindParam(":comentario",$datos["comentario"],PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
                = Eliminar gasto=
  ===============================================>>>>>*/

  static public function eliminarGasto($key,$tabla){
    $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_gasto=:key");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    return ($stmt->execute()) ? 'exito':'error';
    $stmt->close();
  }

  /*=============================================>>>>>
            =Sumar gastos item=
  ===============================================>>>>>*/

  static public function sumarGastosItem($key,$tipo,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_gasto) FROM $tabla WHERE id_usuario_gasto=:key AND tipo_gasto=:tipo");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  /*=============================================>>>>>
            =Sumar gastos item=
  ===============================================>>>>>*/

  static public function sumarGastosFormaPago($key,$tipo,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT SUM(monto_gasto) FROM $tabla WHERE id_usuario_gasto=:key AND forma_pago_gasto=:tipo");
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

  /*=============================================>>>>>
                =Sumar gastos=
  ===============================================>>>>>*/

  static public function sumarGastosMes($key,$mes,$anio,$tabla){
    $stmt=Conexion::conectar()->prepare("SELECT ROUND(SUM(monto_gasto),1) FROM $tabla WHERE ((MONTH(fecha_gasto)=:mes) AND (YEAR(fecha_gasto)=:anio)) AND (id_usuario_gasto=:key)");
    $stmt->bindParam(":mes",$mes,PDO::PARAM_STR);
    $stmt->bindParam(":anio",$anio,PDO::PARAM_STR);
    $stmt->bindParam(":key",$key,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

}

?>
