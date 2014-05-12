<?php 
session_start();

//Filtro para redireccionar a un cliente si no viene de carrito.php

if($_SESSION["deCarrito"]!=0 || !$_SESSION['registrado']){
	header('Location: ../index.php');
}

//Cargamos los ficheros con las funciones auxiliares y conectamos con la BD

$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir.'/thorcomics//cgi-bin/gestion_conexiones.php');
require_once($dir.'/thorcomics//cgi-bin/gestion_pedidos.php');
require_once($dir.'/thorcomics//cgi-bin/gestion_productos.php');
$conexion = conecta();

//Cargamos las variables de session que necesitaremos

$usuario=$_SESSION['usuario'];
$encargo=$_SESSION['encargo'];

//Obtenemos los identificadores de los productos que estamos comprando, elestado del pedido y la fecha.

array_shift($encargo);						
$fecha=DATE("Y-m-d");
$estado='1';

//Procemos a añadir los pedidos a la BD

foreach($encargo as $linea){
	list($nombre, $cantidad, $precio, $id) = preg_split('/,/',trim($linea));	
	añadePedido($conexion, $usuario['id_usuario'], $id, $fecha, $cantidad, $precio, $estado);
}

//Por último redireccionamos al usuario

$_SESSION['confirmacionCompra']=true;
header('Location: ../confirmacionCompra.php');

?>