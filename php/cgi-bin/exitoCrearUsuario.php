<?php
session_start();

//Carga de archivos auxiliares y conexión con BD

require_once('../cgi-bin/gestion_conexiones.php');
include("../cgi-bin/gestion_usuarios.php");
$conexion=conecta();

//Recuperando los datos del formulario de la variable de sessión.

$formulario = $_SESSION['registro'];

//Generación de variables auxiliares que nos permitirán saber si hubo errores.

$_SESSION['registro']=null;
$_SESSION['erroresRegistro']=null;

//Insertamos el usuario, si hay algun error en este punto el usuario no se registrara.

$exito=insertaUsuario($conexion,$formulario['input_correo1'],$formulario['input_contrasena1'],$formulario['input_nombre'],$formulario['input_apellidos'],$formulario['input_dni'], $formulario['input_direccion'],$formulario['input_tlf'],$formulario['input_codigoPostal']);

//Redireccionamos al usuario

if($exito==1){
	$_SESSION['usuario']=existeUsuario($conexion,$formulario['input_correo1'],$formulario['input_contrasena1']);
	$_SESSION['registrado']=true;
	header("Location: ../index.php");
}else{	
	header("Location: ../error.php");			
}
		
?>