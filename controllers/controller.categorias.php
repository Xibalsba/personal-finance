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

  /*=============================================>>>>>
  = Mostrar las categorias =
  ===============================================>>>>>*/
  static public function mostrarCategorias(){
      $categorias = CategoriasMdl::mostrarCategorias($_SESSION["userKey"],"categorias");
      $cont = 1;
      foreach ($categorias as $key => $categoria) {
        echo '<tr>
            <th scope="row">'.$cont.'</th>
            <td>'.$categoria["nom_categoria"].'</td>
            <td>'.$categoria["descripcion_categoria"].'</td>
            <td>'.$categoria["fecha_categoria"].'</td>
            <td>'.$categoria["tipo_categoria"].'</td>
            <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-secondary btnEditarCategoria" kyCategoria="'.ControlGastosAppCtrl::openCypher("encrypt",$categoria["id_categoria"]).'" nmCategoria="'.ControlGastosAppCtrl::openCypher("encrypt",$categoria["nom_categoria"]).'" tpCategoria="'.ControlGastosAppCtrl::openCypher("encrypt",$categoria["tipo_categoria"]).'" dcCategoria="'.ControlGastosAppCtrl::openCypher("encrypt",$categoria["descripcion_categoria"]).'">Editar</button>
                  <button type="button" class="btn btn-secondary btnEliminarCategoria" keyCategoria="'.ControlGastosAppCtrl::openCypher("encrypt",$categoria["id_categoria"]).'">Eliminar</button>
                </div>
            </td>
        </tr>';
        $cont++;
      }
  }

  /*=============================================>>>>>
  = Contar las categorias por tipo =
  ===============================================>>>>>*/

  static public function contarCategorias($tipo){
    $contar = CategoriasMdl::contarCategorias($tipo,$_SESSION["userKey"],"categorias");
    echo $contar[0];
  }
}
?>
