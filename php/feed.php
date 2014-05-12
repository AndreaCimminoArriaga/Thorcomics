<?php

//Importando los ficheros con las funciones de conexion a la BD y conectandonos

require_once("./cgi-bin/gestion_conexiones.php");
$conexion = conecta();	

//Capturando excepciónes

try {

//Seleccionamos todo de la tabla noticias 

$consulta = "SELECT * FROM noticias";
$lineas = $conexion->query($consulta);

//Generando el canal RSS 

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>'; 
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>Thor Comics</title>';
echo '<link>http://localhost/thorcomics</link>';
echo '<language>es-ES</language>';
echo '<description>Tienda de comics online.</description>';

//Imprimiendo las lineas de la consulta

foreach ($lineas as $linea){
	echo '<item>';
	echo '<title>'.$linea["titulo"].'</title>';
	echo '<link>'.$linea["link"].'</link>';
	echo '<pubDate>'.$linea["fecha"].'</pubDate>';
	echo '<description>'.$linea["descripcion"].'</description>';
	echo '</item>';
}
echo '</channel>';
echo '</rss>';

//Capturamos la excepción en caso de que hubiera

}catch(PDOException $e){
    echo '<p>Lo sentimos, actualmente no se encuentra disponible la suscripci&oacute;n de RSS';
}
?>