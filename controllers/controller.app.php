<?php

class ControlGastosAppCtrl{
  /*----------- Plantilla del sitio -----------*/

  static public function appControlGastos(){
		include "views/template.php";
	}

  /*----------- Control de los links -----------*/

	static public function linkControlGastos(){
		if (isset($_GET["action"])) {
			$link = $_GET["action"];
		}else{
			$link = "ingreso";
		}
		$respuesta = ControlGastosAppMdl::linkControlGastos($link);
		include $respuesta;
	}

  /*----------- Parsear la fecha -----------*/

	static public function modificarFecha($fecha){
		$fechaC = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fechaC));
		$dia = date('l', strtotime($fechaC));
		$mes = date('F', strtotime($fechaC));
		$anio = date('Y', strtotime($fechaC));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		$fechaDato = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

		return $fechaDato;
	}

  static public function zFill($numero,$maximo){
		$largo_numero = strlen($numero);
		$largo_maximo = $maximo;
		$resto = $largo_maximo-$largo_numero;

		for ($i=0; $i < $resto; $i++) {
			$numero = "0".$numero;
		}

		return $numero;
	}


  static public function cambiarMes($mes){
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    return $meses[$mes];
  }

  /*=============================================>>>>>
	= Encriptar y desencriptar datos =
	===============================================>>>>>*/

	static public function openCypher ($action='encrypt',$string=false){
	    $action = trim($action);
	    $output = false;

	    $myKey = 'oW%c76+jb2';
	    $myIV = 'A)2!u467a^';
	    $encrypt_method = 'AES-256-CBC';

	    $secret_key = hash('sha256',$myKey);
	    $secret_iv = substr(hash('sha256',$myIV),0,16);

	    if ( $action && ($action == 'encrypt' || $action == 'decrypt') && $string ){
	        $string = trim(strval($string));

	        if ( $action == 'encrypt' ){
	            $output = openssl_encrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
	        }

	        if ( $action == 'decrypt' ){
	            $output = openssl_decrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
	        }
	    }

	    return $output;
	  }

    /*=======================================================
  	=            Guardar imágenes en el servidor            =
  	=======================================================*/

  	static public function guardarImagen($archivo,$tipo,$ruta){
  	  list($ancho, $alto) = getimagesize($archivo);

        $nuevoAncho = 800;
        $nuevoAlto = 800;

        /*=============================================
        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
        =============================================*/

        if($tipo == "image/jpeg"){
          /*=============================================
          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
          =============================================*/
          $origen = imagecreatefromjpeg($archivo);
          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
          imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
          imagejpeg($destino, $ruta);

        }

        if($tipo == "image/png"){

          /*=============================================
          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
          =============================================*/
          $origen = imagecreatefrompng($archivo);
          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
          imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
          imagepng($destino, $ruta);

        }
  	}

    /*======================================
  	=            Crear carpetas            =
  	======================================*/

  	static public function crearCarpeta($direccion){
  		return (mkdir($direccion, 0777, true)) ? 'exito':'error';
  	}

  	/*=====  Fin de Crear carpetas  ======*/


    /*=============================================>>>>>
    = Generar colores hexadecimales aleatorios =
    ===============================================>>>>>*/

    static public function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    static public function random_color() {
        return ControlGastosAppCtrl::random_color_part() . ControlGastosAppCtrl::random_color_part() . ControlGastosAppCtrl::random_color_part();
    }

    /*= End of Generar colores hexadecimales aleatorios =*/
    /*=============================================<<<<<*/


    /*=============================================>>>>>
    = Sacar porcentajes =
    ===============================================>>>>>*/

    static public function porcentaje($total=0,$incognita=0){
      return bcdiv(($incognita*100)/$total,1,2);
    }

    /*= End of Sacar porcentajes =*/
    /*=============================================<<<<<*/
}

?>
