<?php
session_start();

//Definición de la función que nos permitira conectarnos a la BD

function conecta(){

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname='comics';
$conexion=null;
try {
	$conexion = new PDO("mysql:host=$hostname;dbname=$dbname;charset=UTF-8",$username,$password);	
	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //para que lance excepciones
	}
catch( PDOException $e ) {
	$_SESSION["excepcion"];
	header("Location: http://localhost/thorcomics/error.php");
	}
return $conexion;

}

//Definición de la función que nos permitira desconectarnos a la BD

function desconecta($conexion){
	$conexion=null;
}

?>