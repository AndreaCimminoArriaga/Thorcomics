<?php 
	session_start();
	
	//Filtro para que un cliente no registrado no pueda acceder
	
	if(!$_SESSION['registrado']){
		header('Location: ../index.php');
	}
	
	//Cargando ficheros con funciones auxiliares y conexion con BD
	
	$dir = $_SERVER['DOCUMENT_ROOT'];
	include ($dir.'/thorcomics/includes/gestion_sesion.inc');
	require_once($dir.'/thorcomics/cgi-bin/gestion_conexiones.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_productos.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_pedidos.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_estados.php');
	$conexion = conecta();
	
	//Rescantando la información del usuario
	
	$usuario = $_SESSION['usuario'];
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Thor Comics - Pedidos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo CSS y javascript-->
	 	
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	 	
	 	<link rel="stylesheet" href="css/tablaDescriptiva.css" type="text/css">
	</head>
	<body>
	
	<!-- Cabecera -->
	
		<?php include ($dir.'/thorcomics/includes/cabecera.inc'); ?>

	<!-- Novedades -->
				
		<div id="page" >	
			<?php include('./includes/noticias.inc'); ?>

	<!-- Cuadro central -->
		
		<div id="main" >
			<div class="modulo">
				<h2>Hola <?php echo $_SESSION['usuario']['nombre'];?>, estos son tus pedidos:</h2>
				
				<table>	
					<?php 
						$stmt=pedidos($conexion, $_SESSION['usuario']['id_usuario']);
						if($stmt!=false){
							
					?>	
						<tr> 
						<td class="subtitulo"><p>Articulo</p></td>
						<td class="subtitulo"><p>Fecha Pedido</p></td>
						<td class="subtitulo"><p>Precio/Unidad</p></td>
						<td class="subtitulo"><p>Cantidad</p></td>
						<td class="subtitulo"><p>Total(+iva)</p></td>
						<td class="subtitulo"><p>Estado</p></td>
						</tr>
					<?php	
						
							$n=0;
							foreach($stmt as $l){
								$n++;		
								$id_producto=$l['id_producto'];
								$busqueda=encuentraPorId($conexion,$id_producto);
								$nombre='';
								if($busqueda!=false)
									foreach($busqueda as $n){
										$nombre = $n["nombre"];
									}else{
										$nombre="no title";
									
									}
								$fecha=$l['fecha_pedido'];
								$precio=$l['precio'];
								$cantidad=$l['cantidad'];
								$busqueda= estadoPorId($conexion,$l['id_estado']);
								$estado='';
								if($busqueda!=false)
									foreach($busqueda as $n){
										$estado = $n["estado"];
									}else{
										$estado=$nombre="no state";
									}
						
					?>					
					<tr> 
						<td><p><?php echo $nombre;?></p></td>
						<td><p><?php echo $fecha;?></p></td>
						<td><p><?php echo $cantidad;?></p></td>
						<td><p><?php echo $precio;?></p></td>
						<td><p><?php echo $cantidad;?></p></td>
						<td><p><?php echo $estado;?></p></td>
					</tr>
					<?php 
							}
							if($n==0){
								echo "<p>Aun no has comprado nada</p>";
							}
						}
					
					?>	
				</table>
								
			</div>		
		</div>
		
		
		<!-- Barra lateral -->
	
		<div id="sidebar">			
			<?php include($dir.'/thorcomics/includes/gestion_sesionLogin.inc'); ?>
			<?php include($dir.'/thorcomics/includes/topventas.inc');?>
		</div>
		
		<!-- Footer -->
		
		<?php include ($dir.'/thorcomics/includes/footer.inc');?>
		</div>
	</body>
</html>
<?php desconecta($conexion); ?>