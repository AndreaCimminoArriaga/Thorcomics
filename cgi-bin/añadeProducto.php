<?php 
session_start();

//Filtro para asegurar que el cliente accede correctamente a este fichero

if(!isset($_SERVER["pedido"])){
header("Location: ../index.php");
}

//Recopilando datos de formulario de productos.

$carrito=array();
$localizacion = $_REQUEST["localizacion"]; 
$carrito["cantidad"] = $_REQUEST["cantidad"];
$carrito["precio"] = $_REQUEST["precio"];
$carrito["nombre"] = $_REQUEST["nombre"];
$carrito["id"] = $_REQUEST["id"];

//Recuperando la variable que guarda el precio y cantidad de productos acumulados.

$pedido = $_SESSION["pedido"];
$ids = $_SESSION["ids"];

//Actualizando los nuevos valores

$anterior = $pedido["pedido"]."!".$carrito["nombre"].",".$carrito["cantidad"].",".$carrito["precio"].",".$carrito["id"];

$pedido["pedido"]=  $anterior;
$pedido["precio"] = $pedido["precio"] + ($carrito["precio"]*$carrito["cantidad"]);
$pedido["cantidad"] = $pedido["cantidad"] + $carrito["cantidad"];


//Guardando los cambios

$_SESSION["pedido"]=$pedido;

header("Location: ../$localizacion");






?>