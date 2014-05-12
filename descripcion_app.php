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
		<title>Thor Comics - Descripcion de la Aplicacion</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo CSS y javascript-->
	 	
	 	<?php include ($dir.'/thorcomics/includes/imports.inc'); ?>	
	 	
	 	<link rel="stylesheet" href="css/tablaDescriptiva.css" type="text/css" >
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
				<h2>Descripción de la aplicación web ThorComics</h2>
				<p>ThorComics es simplemente un portal donde los usuarios pueden, si están registrados, realizar una serie de compras 					online. Lo que nos gustó del proyecto, motivo por el cual lo realizamos, fue las posibilidades de poner en práctica lo 					aprendido en la asignatura con relativa facilidad gracias a la flexibilidad que se le puede dar a este proyecto.</p>
				<h2>Base de datos:</h2>
				<p>La base de datos consta de 6 tablas: categorias,estado_pedidos, pedidos, productos, novedades y usuarios. Para 							facilitar la descripción de la misma exponemos a continuación el diagrama E/ER de la base de datos:</p>
				<img src="media/er.png" alt="nopic"><br>
				<p>Descripción de cada tabla: </p>
				<img src="media/descripcion.png" alt="nopic"><br><br>
				<p>Estructura de cada tabla: </p>
				<img src="media/estructura.png" alt="nopic"><br>
				<p>A continuación vamos a exponer los puntos de control de la lista proporcionada en clase y donde podemos ver esos punto en nuestro trabajo</p>			
				<table>	
					<tr><th colspan="2">Evaluación Basica.</th></tr>
					
					<tr> 
						<td class="subtitulo"><p>Objetivo</p></td>
						<td class="subtitulo"><p>Descripción</p></td>
					</tr>
					
					<tr>
						<td><p>Entrega correcta de la practica.</p></td>
						<td><p> - </p></td>
					</tr>
					
					<tr>
						<td><p>Instalación correcta (index.html/php).</p></td>
						<td><p> - </p></td>
					</tr>
					
					<tr>
						<td><p>Ausencia de errores de programación.</p></td>
						<td><p> - </p></td>
					</tr>
					<tr>
						<td><p>Uso marcado HTML/XHTML estricto.</p></td>
						<td><p> Todas las paginas tienen su doctype correspondiente </p></td>
					</tr>

					<tr>
						<td><p>Uso de css en archivos externos.</p></td>
						<td><p>Se puede ver en la carpeta css.</p></td>
					</tr>
					
					<tr>
						<td><p>Maquetación con CSS de todas las páginas.</p></td>
						<td><p>Todas las paginas han sido maquetadas exclusivamente con css</p></td>
					</tr>
					
					<tr>
						<td><p>Formularios.</p></td>
						<td><p>En la web tenemos el formulario de login, de registro, filtrado de productos, actualización de datos y también algún formulario mas pequeño para la compra de productos.</p></td>
					</tr>
					
					<tr>
						<td><p>Validación en cliente de todos los formularios.</p></td>
						<td><p>Todos los formularios han sido validados en javascript, concretamente en: formulario_ins.js y login.js.</p></td>
					</tr>
					
					<tr>
						<td><p>Validación en servidor de todos los formularios.</p></td>
						<td><p>todos los formularios han sido validados en php, concretamente en: login.php, actualización y registro.php</p></td>
					</tr>
					
					<tr>
						<td><p>Base de datos en tercera forma normal (3FN).</p></td>
						<td><p>Mirar descripción superior.</p></td>
					</tr>
					
					<tr>
						<td><p>Inserción en BD.</p></td>
						<td><p>Hemos implementado esta función a la hora de insertar un usuario nuevo y un pedido nuevo.</p></td>
					</tr>
					
					<tr>
						<td><p>Actualización en BD.</p></td>
						<td><p>Hemos implementado esta función a la hora de poder modificar los datos de un usuario registrado.</p></td>
					</tr>
					
					<tr>
						<td><p>Borrado en BD.</p></td>
						<td><p>Hemos implementado esta función a la hora de dar de alta a un usuario.</p></td>
					</tr>
					
					<tr>
						<td><p>Consulta en BD formateando los resultados en una tabla HTML.</p></td>
						<td><p>Tenemos una tabla en la barra lateral de comics más vendidos que precisamente implementa este punto, usando una función de gestion_productos.php. Ademas los usuarios registrados pueden ver sus pedidos también en una tabla.</p></td>
					</tr>
					
					<tr>
						<td><p>Tratamiento de errores de acceso a BD en servidor.</p></td>
						<td><p>Siempre que se produce un error en el acceso a servidor la aplicación redirige al usuario a una pagina de error (error.php), y si se produce un error en el acceso de una query se devolverá false y se registra el error en una variable de sesión.</p></td>
					</tr>
				</table>
				
				<table>
					<tr><th colspan="2">Evaluación Avanzada.</th></tr>
					
					<tr> 
						<td class="subtitulo"><p>Objetivo</p></td>
						<td class="subtitulo"><p>Descripción</p></td>
					</tr>

					<tr>
						<td><p>Página de descripción de la aplicación en HTML.</p></td>
						<td><p>Esta misma.</p></td>
					</tr>
					
					<tr>
						<td><p>Uso avanzado de JavaScript (a parte de validación).</p></td>
						<td><p>Implementado en el menú desplegable superior, menu de noticias, interacción con círculos rojos y verdes para validez de campos.</p></td>
					</tr>
					
					<tr>
						<td><p>Uso de expresiones regulares en JavaScript o PHP.</p></td>
						<td><p>Los formulario de inscripción y login son filtrados por expresiones regulares en javascript, concretamente en los ficheros: login.js y formulario_ins.js. Ademas hay varias funcionalidades implementadas con expresiones regulares, como comprar.</p></td>
					</tr>
					
					<tr>
						<td><p>Facilidad de navegación.</p></td>
						<td><p>Hemos intentado que la navegación sea intuitiva y simple colocando un menú superior que permite acceder a todas las partes de la web rápidamente, un panel omnipresente de login para poder acceder desde cualquier página, y poder cerrar sesión igualmente, un menú de carrito para facilitar al usuario el saber que esta comprando y cuanto le cuesta. Ademas de todo lo anterior en nuestros diseños intentamos crear una aplicación, visualmente, simple .</p></td>
					</tr>
					
					<tr>
						<td><p>Usabilidad de la aplicación.</p></td>
						<td><p>-</p></td>
					</tr>
					
					<tr>
						<td><p>Modularidad del código cliente.</p></td>
						<td><p>Se puede ver este punto en la carpeta javascript</p></td>
					</tr>
					
					<tr>
						<td><p>Modularidad del código en servidor (reutilización, uso de buenas prácticas, uso de include y similares, etc.).</p></td>
						<td><p>Se puede ver este punto en la carpeta cgi-bin y practicamente cualquier fichero php</p></td>
					</tr>
					
					<tr>
						<td><p>Complejidad de la base de datos (número de tablas y relaciones).</p></td>
						<td><p>Mirar descripción anterior.</p></td>
					</tr>
					
					<tr>
						<td><p>Integridad Referencial.</p></td>
						<td><p>Mirar descripción anterior.</p></td>
					</tr>
					
					<tr>
						<td><p>Uso de sesión en PHP.</p></td>
						<td><p>Implementado con la sesión de usuarios de la web y carrito de compras.</p></td>
					</tr>
					
					<tr>
						<td><p>Legibilidad del código.</p></td>
						<td><p>Hemos intentado tabular todas la paginas y modular el código lo mas posible para la facilitar la legibilidad.</p></td>
					</tr>
					
					<tr>
						<td><p>HTML validado en W3C.</p></td>
						<td><p>Todas las paginas están validadas, mirar carpeta validaciones.</p></td>
					</tr>
					<tr>
						<td><p>CSS validado en W3C.</p></td>
						<td><p>Todas las paginas están validadas, mirar carpeta validaciones.</p></td>
					</tr>
					
					<tr>
						<td><p>Implementación de RSS</p></td>
						<td><p>Se puede ver en la sección de novedades</p></td>
					</tr>
				</table>	
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