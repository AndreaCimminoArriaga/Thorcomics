<?php 
	
	//Cargando ficheros con funciones auxiliares, la session y conectando con la BD
	
	$dir = $_SERVER['DOCUMENT_ROOT'];
	include ($dir.'/thorcomics/includes/gestion_sesion.inc');
	require_once($dir.'/thorcomics/cgi-bin/gestion_conexiones.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_productos.php');
	$conexion = conecta();
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Thor Comics - Contacto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo el CSS y el javascript-->
	 	
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	 	
	</head>
	<body>
	
	<!-- Cabecera -->
	
		<?php include ($dir.'/thorcomics/includes/cabecera.inc'); ?>

		
	<!-- Novedades -->			
		
		<div id="page" >	
			<?php include($dir.'/thorcomics/includes/noticias.inc'); ?>

	<!-- Cuadro central -->
	
		<div id="main" >
	
			<div class="modulo">
			<h2>Contactar con nosotros.</h2>
			<p>Estimado cliente, puede escribirnos un email con su gestor favorito a través <a href="mailto:administracion@thorcomics.com">de este enlace</a> o escribirnos a administracion@thorcomics.com.</p>.	
			</div>
			
		</div>
		
	<!-- Barra lateral -->
		
		<div id="sidebar">
			<?php include($dir.'/thorcomics/includes/gestion_sesionLogin.inc');  ?>
			<?php include($dir.'/thorcomics/includes/carrito.inc');?>
			<?php include($dir.'/thorcomics/includes/topventas.inc');?>
		</div>
		
	<!-- Footer -->
		
			<?php include ($dir.'/thorcomics/includes/footer.inc');?>
		</div>
	</body>
</html>
<?php desconecta($conexion); ?>