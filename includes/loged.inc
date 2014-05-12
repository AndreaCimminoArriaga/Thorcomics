<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

	<!-- Modulo flotante de la izquiera para cuando el usuario esta registrado-->
	
	<div id="login" class="modulo">
			
			<div>
				<p>Hola <b><?php echo $_SESSION['usuario']['nombre'] ?></b>.</p>	
			</div>
			<a href="consultarPedidos.php">Pedidos</a><br>
			<a class="linkLogin" href="./form_actualizacion.php">Modificar Perfil</a><br>
			<hr>
			<form action="./cgi-bin/cierraSesion.php">
				<div><button  type="submit">Cerrar Sesion</button >	</div>
			</form><br>
			<form id="borra_user" action="./cgi-bin/borra_usuario.php">
				<div><button type="submit">Borrar Usuario</button></div>
			</form>
					
	</div>