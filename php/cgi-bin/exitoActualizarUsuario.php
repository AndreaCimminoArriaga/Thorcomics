<?php
session_start();

//Carga de archivos auxiliares y conexión con BD

require_once('../cgi-bin/gestion_conexiones.php');
include("../cgi-bin/gestion_usuarios.php");
$conexion=conecta();

//Recuperando la información del formulario y del usuario de las variables de sesion

$formulario = $_SESSION['actualizacion'];
$usuario=$_SESSION['usuario'];

//Generación de variables auxiliares que nos permitirán saber si hubo errores en la actualizacion o no.

$_SESSION['actualizacion']=null;
$_SESSION['erroresRegistro']=null;

//Actualizamos los datos

$exito=actualizaUsuario($conexion,$usuario['id_usuario'], $formulario['input_correo1'],$formulario['input_contrasena1'],$formulario['input_nombre'],$formulario['input_apellidos'],$formulario['input_dni'], $formulario['input_direccion'],$formulario['input_tlf'],$formulario['input_codigoPostal']);

//Si no hubo problemas con la actualización redireccionamos al usuario a index.php.

if($exito==0){		
	header('Location: ../error.php');
}else{
	$_SESSION['usuario']=existeUsuario($conexion,$formulario['input_correo1'],$formulario['input_contrasena1']);
	$_SESSION['registrado']=true;
	header('Location: ../index.php');				
}
			
?>