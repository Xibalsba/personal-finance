<?php

class UsuariosCtrl{
  /*----------- Iniciar sesión -----------*/
  static public function iniciarSesion(){
    if (isset($_POST["correoUsuario"]) && isset($_POST["contraseniaUsuario"])) {
      $consulta = UsuariosMdl::iniciarSesion($_POST["correoUsuario"],"usuarios");

      if($_POST["correoUsuario"] == $consulta[0][2] && $_POST["contraseniaUsuario"] == $consulta[0][3]){
        $acceso = "true";
        $key = $consulta[0][0];
        $foto = $consulta[0][4];

        $_SESSION["acceso"] = "$acceso";
        $_SESSION["userKey"] = "$key";
        $_SESSION["userFt"] = "$foto";
        echo '<script>window.location = "inicio"</script>';
      }else{
        echo '<script>window.location = "ingreso"</script>';
      }
    }
  }


  /*----------- Agregar nuevo usuario -----------*/
  static public function nuevoUsuario(){
    if (isset($_POST["correoUsuarioRegistro"])) {

      $ruta_g = '';

			/*----------  Verificamos la imagen  ----------*/

	    if(isset($_FILES["imagenUsuarioRegistro"]["tmp_name"])){
        $contar = UsuariosMdl::contarUsuarios("usuarios");
	      $carpeta = 'static/images/usuarios/'.ControlGastosAppCtrl::zfill($contar[0]+1,10);

				$crear_carpeta = ControlGastosAppCtrl::crearCarpeta($carpeta);

				if ($crear_carpeta == "exito") {

	        	$imagen = $_FILES["imagenUsuarioRegistro"]["tmp_name"];
        		$aleatorio = mt_rand(10000,99999);
    				$tipo = $_FILES["imagenUsuarioRegistro"]["type"];

    				($tipo == "image/jpeg") ? $ruta = $carpeta."/".$aleatorio.".jpg":"";
    				($tipo == "image/png") ? $ruta = $carpeta."/".$aleatorio.".png":"";

    				$ruta_g = $ruta;

        		ControlGastosAppCtrl::guardarImagen($imagen,$tipo,$ruta);
				}
			}

      $datos = array(
        "nombre"=>$_POST["nombreUsuarioRegistro"],
        "correo"=>$_POST["correoUsuarioRegistro"],
        "contrasenia"=>$_POST["contraseniaUsuarioRegistro"],
        "imagen"=>$ruta_g,
      );

      $registro = UsuariosMdl::nuevoUsuario($datos,"usuarios");

      echo ($registro == "exito") ? '<script>window.location = "ingreso";</script>':'<script>window.location = "registro"</script>';
    }
  }
}

?>
