<?php 
class Seguridad{
	function Seguridad(){

	}
	public function generarToken(){
		if (session_status() === PHP_SESSION_NONE){session_start();}
		$nuevoToken = md5(microtime());
		$_SESSION['token'] = $nuevoToken;
		return $nuevoToken;
	}
	public function validarToken($cadena,$regenerar = false){
		if (session_status() === PHP_SESSION_NONE){session_start();}
		$cadena = filter_var($cadena, FILTER_SANITIZE_EMAIL);//
		//echo "$_SESSION['token']";
		if($regenerar === false){
			return ($_SESSION['token'] === $cadena);
		}else{
			return array(($_SESSION['token'] === $cadena),$this->generarToken());
		}
		//return $_SESSION['token'];
	}

}
?>
