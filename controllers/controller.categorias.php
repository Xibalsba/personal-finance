<?php
class CategoriasCtrl{
  /*=============================================>>>>>
  = Agregar nueva categoria =
  ===============================================>>>>>*/
  static public function agregarCategoria(){
    if (isset($_POST["keyCategoriaNuevo"])) {
      $datos = array(
        "nombre"=>$_POST["nombreCategoriaNuevo"],
        "tipo"=>$_POST["tipoCategoriaNuevo"],
        "comentario"=>$_POST["comentariosCategoriaNuevo"],
        "key"=>ControlGastosAppCtrl::openCypher("decrypt",$_POST["keyCategoriaNuevo"])
      );

      $registro = CategoriasMdl::agregarCategoria($datos,"categorias");
      echo ($registro == "exito") ? '<script>window.location = "index.php?action=categorias&add=success"</script>':'<script>window.location = "index.php?action=categorias&add=error"</script>';
    }
  }
}
?>
