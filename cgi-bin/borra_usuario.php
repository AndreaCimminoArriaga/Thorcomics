<?php
session_start();

//Cargando los ficheros con fuciones auxiliares y conexión con BD

$dir = $_SERVER['DOCUMENT_ROOT'];
include($dir."/thorcomics/cgi-bin/gestion_conexiones.php");
include($dir."/thorcomics/cgi-bin/gestion_usuarios.php");
$conexion=conecta();

//Anulando variables de sesion

$formulario = $_SESSION['registro'];
$_SESSION['registro']=null;
$_SESSION['erroresRegistro']=null;
$usuario=$_SESSION['usuario'];

//Ejecutando función de borrado

$exito = borrarUsuario($conexion,$usuario['id_usuario']);

//Comprobación de que no hubo problemas

if($exito!=1){
	header('Location: ../error.php');
}else{
	session_destroy();
	header('Location: ../index.php');				
}
		
?>
