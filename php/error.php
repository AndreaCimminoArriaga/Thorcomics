<?php 

	//Cargando ficheros con funciones auxiliares, la session y conectando con la BD

	$dir = $_SERVER['DOCUMENT_ROOT'];
	include ($dir.'/thorcomics/includes/gestion_sesion.inc');
	require_once($dir.'/thorcomics/cgi-bin/gestion_productos.php');

	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>ERROR</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo el CSS y el javascript-->
	 	
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	 	
	</head>
	<body>
	
	<!-- Cabecera -->
		<?php include ($dir.'/thorcomics/includes/cabecera.inc'); ?>

	<!--Resto de la web-->			

		<div id="page" >		
			<?php include($dir.'/thorcomics/includes/noticias.inc'); ?>		

	<!-- Cuadro central -->
	
		<div id="main" >
			<div class="modulo">
				<img id="imgerror" src="media/error.jpg" alt="nopic">
			</div>
		</div>
		
	<!-- Barra lateral -->
		
		<div id="sidebar">
			
			<?php include($dir.'/thorcomics/includes/gestion_sesionLogin.inc');  ?>
			
		</div>
	<!-- Footer -->
		
		<?php include ($dir.'/thorcomics/includes/footer.inc');?>
		</div>
	</body>
</html>
