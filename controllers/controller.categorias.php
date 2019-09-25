<?php
class CategoriasCtrl{
  /*=============================================>>>>>
  = Agregar nueva categoria =
  ===============================================>>>>>*/
  static public function agregarCategoria(){
    if (isset($_POST["keyCategoriaNuevo"])) {

      date_default_timezone_set('America/Mexico_City');
      $time = mktime();
      $fecha = date("Y-m-d h:i:s a", $time);

      $datos = array(
        "nombre"=>$_POST["nombreCategoriaNuevo"],
        "tipo"=>$_POST["tipoCategoriaNuevo"],
        "descripcion"=>$_POST["descripcionCategoriaNuevo"],
        "fecha"=>$fecha,
        "key"=>ControlGastosAppCtrl::openCypher("decrypt",$_POST["keyCategoriaNuevo"])
      );

      $registro = CategoriasMdl::agregarCategoria($datos,"categorias");
      echo ($registro == "exito") ? '<script>window.location = "index.php?action=categorias&add=success"</script>':'<script>window.location = "index.php?action=categorias&add=error"</script>';
    }
  }
}
?>
