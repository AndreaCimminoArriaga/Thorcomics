<?php
session_start();

//En caso de no acceder desde el formulario el cliente es redireccionado.

if(!isset($_SESSION['registro'])){
	header('Location: ../formulario.php');
}

//Carga de ficheros de funciones y conexión con la BD

$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir."/thorcomics/cgi-bin/gestion_conexiones.php");
include($dir."/thorcomics/cgi-bin/gestion_usuarios.php");
$conexion=conecta();

//Extracción de los datos del formulario

$formulario['input_nombre']=$_REQUEST['input_nombre'];
$formulario['input_apellidos']=$_REQUEST['input_apellidos'];
$formulario['input_dni']=$_REQUEST['input_dni'];
$formulario['input_direccion']=$_REQUEST['input_direccion'];
$formulario['input_codigoPostal']=$_REQUEST['input_codigoPostal'];
$formulario['input_tlf']=$_REQUEST['input_tlf'];
$formulario['input_correo1']=$_REQUEST['input_correo1'];
$formulario['input_correo2']=$_REQUEST['input_correo2'];
$formulario['input_contrasena1']=$_REQUEST['input_contrasena1'];
$formulario['input_contrasena2']=$_REQUEST['input_contrasena2'];
$_SESSION['registro']=$formulario;

//LLamada a la función auxiliar de validación.

$errores=validar($formulario);

//Comprobacion de que el correo introducido, futuro usuario, no exista ya en la base de datos.

$existe=existe($conexion, $formulario['input_correo1']);

if( $existe!=0 && count($errores)==0 ){
$errores[]="El correo electronico ya existe";
}

//En este punto si hay no errores, iremos a exitoCreaUsuario.php e insertaremos el nuevo usuario.

if (count($errores)>0){
 	$_SESSION["erroresRegistro"]=$errores;
 	header('Location: ../formulario.php');
}else{
 	header('Location: ../cgi-bin/exitoCrearUsuario.php');
}

//Funcion Auxiliar
	
function validar($formulario) {
	
	//Variables auxiliares que usaremos para comprobar si preg_match encuentra alguna coincidencia.
	
	$nombre = array();
	$apellidos = array();
	$dni=array();
	$direccion=array();
	$cp=array();
	$tlf=array();
	$correo1=array();
	$correro2=array();
	$pass1=array();
	$pass2=array();
	
	//Generación de todas las expresiones regulares.
	
	preg_match("/^[a-ú][a-ú\s]*[a-ú]$/i",$formulario['input_nombre'],$nombre);
	preg_match("/^[a-ú][a-ú\s]*[a-ú]$/i",$formulario['input_apellidos'],$apellidos);
	preg_match("/^[0-9]{7}([0-9][A-Z]|[0-9])$/",$formulario['input_dni'],$dni);
	preg_match("/^[a-ú\s0-9\\/ºª,][a-ú\s0-9\\/ºª,]*[a-ú\s0-9\\/ºª,]$/i",$formulario['input_direccion'],$direccion);
	preg_match("/^\d{5}$/",$formulario['input_codigoPostal'],$cp);
	preg_match("/^\d{5,17}$/",$formulario['input_tlf'],$tlf);
	preg_match("/^[a-z][a-z-_0-9.]+@[a-z-_0-9.]+.[a-z]{2,3}$/i", $formulario['input_correo1'], $correo1);
	preg_match("/^[a-z][a-z-_0-9.]+@[a-z-_0-9.]+.[a-z]{2,3}$/i",$formulario['input_correo2'], $correo2);
	preg_match("/^[\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!]*[\w-.¿?¡!]$/i",$formulario['input_contrasena1'],$pass1);
	preg_match("/^[\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!][\w-.¿?¡!]*[\w-.¿?¡!]$/i",$formulario['input_contrasena2'],$pass2);
	
	//Comprobación de la validez de los datos introducidos
	
	if(!isset($formulario['input_nombre']) || count($nombre)>1){
		$errores[]='El campo <b>nombre</b> no es correcto';
	}
	
	if(!isset($formulario['input_apellidos']) || count($apellidos)>1){
		$errores[]='El campo <b>apellidos</b> no es correcto';
	}
	
	if(!isset($formulario['input_dni']) || count($dni)>9 ){
		$errores[]='El campo <b>dni</b> no es correcto';
	}
	
	if(!isset($formulario['input_direccion']) || count($direccion)>1 ){
		$errores[]='El campo <b>direccion</b> no es correcto';
	}
	
	if(!isset($formulario['input_codigoPostal']) || count($cp)>1 ){
		$errores[]='El campo <b>codigo postal</b> no es correcto';
	}
	
	if(!isset($formulario['input_tlf']) || count($tlf)>1 ){
		$errores[]='El campo <b>telefono</b> no es correcto';
	}
	
	if(!isset($formulario['input_correo1']) || !isset($formulario['input_correo2']) || count($correo1)>1 || count($correo2)>1 || $correo1[0]!=$correo2[0]){
		$errores[]='El campo <b>correo</b> no es correcto';
	}
	
	if(!isset($formulario['input_contrasena1']) || !isset($formulario['input_contrasena2']) || count($pass1)>1 || count($pass2)>1 || $pass1[0]!=$pass2[0]){
		$errores[]='El campo <b>contraseña</b> no es correcto';
	}
	
	return $errores;
}




?>