<?php
session_start();

//Cargando ficheros con funciones auxiliares y conectando con la BD

$dir = $_SERVER['DOCUMENT_ROOT'];
include ($dir.'/thorcomics/cgi-bin/gestion_conexiones.php');
include($dir.'/thorcomics/cgi-bin/gestion_usuarios.php');
$conexion=conecta();

//Medida de seguridad por si alguien cargase en el browser directamente la direccion de este fichero

if(!isset($_SESSION["formularioLogin"])){
	header ("Location: ../index.php");
}

//Obtencion valores del formulario.

$formulario["user"]=$_REQUEST["user"];
$formulario["pass"]=$_REQUEST["password"];

//Guardando los valores del formulario en una variable de sesión

$_SESSION["formularioLogin"]=$formulario;

//Validación de los valores del formulario con una función auxiliar.

$_SESSION["erroresLogin"]=validar($formulario);

//Comprobamos si existe el usuario

$user =  existeUsuario($conexion,$formulario['user'],$formulario['pass']);
if($user==false && count($_SESSION["erroresLogin"])==0){
	$_SESSION['erroresLogin']=array("el usuario no existe");
}

//Redireccionamos al usuario y guardamos los posibles errores en variables de sesión

if(count($_SESSION["erroresLogin"])>0 || ($user == false) || empty($user) ){	
	$_SESSION["registrado"]=false;
}else{
	$_SESSION["registrado"]=true;
	$_SESSION['usuario']=$user;	
}
header ("Location: ../index.php");



//Función Auxiliar

function validar($formulario){
	$errores=array();
	$correo=array();
	$pass=array();
	preg_match("/^[a-z][a-z-_0-9.]+@[a-z-_0-9.]+.[a-z]{2,3}$/i",$formulario["correo"],$correo);
	preg_match("/^[a-z0-9-_.¿?¡!][a-z0-9-_.¿?¡!]{4,}[a-z0-9-_.¿?¡!]$/i",$formulario["contrasena"],$pass);
	
	if(strlen($formulario["user"])<5 || (count($correo)>1) ){
		$errores[0]="El usuario es incorrecto";
	}
	if(strlen($formulario["pass"])<5 || (count($pass)>1)){
		$errores[1]="La contraseña es incorrecta";
	}
	return $errores;
}


?>