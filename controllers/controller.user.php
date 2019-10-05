<?php

class UsuariosCtrl{
  /*----------- Iniciar sesión -----------*/
  static public function iniciarSesion(){
    if (isset($_POST["correoUsuario"]) && isset($_POST["contraseniaUsuario"])) {
      $consulta = UsuariosMdl::iniciarSesion($_POST["correoUsuario"],"usuarios");

      if($_POST["correoUsuario"] == $consulta[0][2] && $_POST["contraseniaUsuario"] == $consulta[0][3]){
        $acceso = "true";
        $key = $consulta[0][0];

        $_SESSION["acceso"] = "$acceso";
        $_SESSION["userKey"] = "$key";
        echo '<script>window.location = "inicio"</script>';
      }else{
        echo '<script>window.location = "ingreso"</script>';
      }
    }
  }
}

?>
