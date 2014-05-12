<?php 
	
	//Cargando ficheros con funciones auxiliares, la session y conectando con la BD
	
	$dir = $_SERVER['DOCUMENT_ROOT'];
	include ($dir.'/thorcomics/includes/gestion_sesion.inc');
	require_once($dir.'/thorcomics/cgi-bin/gestion_conexiones.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_productos.php');
	$conexion = conecta();
	
	//Filtro para asegurarnos que el cliente accede a este fichero correctamente
	
	if(!isset($_SESSION['confirmacionCompra'])){
		header('Location: ../error.php');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Thor Comics - Confirmacion Compra</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo el CSS y el javascript-->
	
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	
	</head>
	<body>
	
	<!-- Cabecera -->	
	
		<?php include ($dir.'/thorcomics/includes/cabecera.inc');?>
	
	<!-- Novedades -->	
			
		<div id="page" >	
			<?php include($dir.'/thorcomics/includes/noticias.inc'); ?>
		
	<!-- Cuadro Central -->		
	
		<div id="main" >
			<div class="modulo">
				<p>¡Gracias! Su pedido ha sido procesado correctamente. En unas semanas recibir&aacute; el paquete en su casa.</p>
			</div>		
		</div>
		
		<!-- Barra lateral -->
		
		<div id="sidebar">
			<?php include($dir.'/thorcomics/includes/gestion_sesionLogin.inc');  ?>
			<?php include($dir.'/thorcomics/includes/topventas.inc');?>
			
		</div>
		
		<!-- Footer -->
		
		<?php include ($dir.'/thorcomics/includes/footer.inc');?>
		
		</div>
	</body>
</html>
<?php desconecta($conexion); ?>