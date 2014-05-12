<?php 
	
	//Cargando ficheros con funciones auxiliares, la session y conectando con la BD
	
	$dir = $_SERVER['DOCUMENT_ROOT'];
	include ($dir.'/thorcomics/includes/gestion_sesion.inc');
	require_once($dir.'/thorcomics/cgi-bin/gestion_conexiones.php');
	require_once($dir.'/thorcomics/cgi-bin/gestion_productos.php');
	$conexion = conecta();
	
	//Rescatando los datos del pedido y el usuario de las variables de sesion
	
	$encargo=$_SESSION['encargo'];
	$usuario=$_SESSION['usuario'];
	
	//Ponemos deCarrito a 0 para luego asegurar que el cliente accede al fichero php correctamente
	
	$_SESSION["deCarrito"]=0;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Thor Comics - Carrito</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo CSS y javascript-->
	 
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	
	</head>
	<body>
	
	<!-- Cabeceza -->
	
		<?php include ($dir.'/thorcomics/includes/cabecera.inc');?>
	
	<!--Noticias-->			
	
		<div id="page" >
		<?php include($dir.'/thorcomics/includes/noticias.inc'); ?>
	
	<!-- Cuadro central -->
		
		<div id="main" >
			<div class="modulo">
				<?php 
					if($_SESSION["registrado"]){
				?>
				<h2>Datos de env&iacute;o:</h2>
				<p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?><br>
				<strong>Apellidos:</strong> <?php echo $usuario['apellidos']; ?> <br>
				<strong>DNI:</strong> <?php echo $usuario['dni']; ?> <br >
				<strong>Direcci&oacute;n:</strong> <?php echo $usuario['direccion'];?> <br>
				<strong>C&oacute;odigo postal:</strong> <?php echo $usuario['cp'];?> <br><br >
				<span style="text-decoration:underline"><strong>M&eacute;todos de contacto:</strong></span><br>
				<em>Nos pondremos en contacto contigo cuando tu pedido salga del almacen.</em><br>
				<strong>Email:</strong> <?php echo $usuario['correo']; ?><br>
				<strong>Telefono:</strong> <?php echo $usuario['telefono']; ?><br>
				</p>
				<br>
				<?php 
				
				}else{
					echo "<p>Debes ser un usuario registrado para comprar en la web.</p>";
				}
				?>
				<h2>Pedido:</h2>
				
				<table>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio/unidad</th>
					</tr>
					<?php 
						array_shift($encargo);
						$vacio=0;
						foreach($encargo as $linea){
						list($nombre, $cantidad, $precio, $id) = preg_split('/,/',trim($linea));
						$vacio=$vacio+$cantidad;
					?>
						<tr>
						<td><p><?php echo $nombre?></p></td>
						<td><p><?php echo $cantidad?></p></td>
						<td><p><?php echo $precio?> $</p></td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td colspan="2" style="height:1em;"><p><strong>Subtotal:</strong></p></td>
						<td><p><?php $precioT = $_SESSION["pedido"]["precio"];
									 echo $precioT; ?> $</p></td>
					</tr>
					<tr>
						<td colspan="2"><p><strong>IVA:</strong></p></td>
						<td><p><?php $iva = ($precioT*8)/100;
									 echo $iva; ?> $ (8%)</p></td>
					</tr>
					<tr>
						<td colspan="2"><p><strong>TOTAL:</strong></p></td>
						<td><p><?php echo  $precioT+$iva ?> $</p></td>
					</tr>
					
				</table>
		
				
				<?php 
				if($_SESSION["registrado"]){
					if($vacio!=0){
						echo "<form action=\"./cgi-bin/finalizaPedido.php\">
							<input class=\"boton\" type=\"submit\" value=\"Confirmar pedido\">
								</form>";
						}
				}else{
				 	echo "";
				}
				?>	
				<br>
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