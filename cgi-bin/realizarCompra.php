<?php 
session_start();

//Filtro para asegurarnos que el cliente accede a este fichero correctamente

if(!isset($_SESSION["pedido"])){
	header("Locarion: ../index.php");
}

//Rescatamos la información de la variable de sesión del pedido.

$pedido = $_SESSION["pedido"];
$encargos=array();

//Separamos los distintos productos del encargo con un preg_split (recuerdese que estaban separados por !)

$encargos = preg_split("/!/",$pedido["pedido"]);
$_SESSION["encargo"]=$encargos;

//Redireccionamos al cliente

header("Location: ../carrito.php");

?>