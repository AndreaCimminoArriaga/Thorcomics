<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

	<!-- Modulo flotante de la izquiera para cuando el usuario NO esta registrado-->

	<div id="login" class="modulo">
		<form  name="modulo_login" method="post" action="cgi-bin/login.php">
			<div>
				<label for="user"> Usuario:</label>
				<input id="user" name="user" type="text" onBlur="login_correo(this);" value="<?php echo $formularioLogin["user"]; ?>" >
			</div>
			<div>
			
				<label for="password">Contrase&ntilde;a:</label>
				<input id="password" name="password" type="password" onBlur="login_pass(this);" value="<?php echo $formularioLogin["pass"]?>">
			
			</div>
			<?php 
				
				//Imprimiendo posibles errores en la validación en servidor
			
				if(count($errores)>0 ){
					echo "<div id=\"erroresLogin\"><p>";
					foreach($errores as $e){
				 		echo "$e <br>";
					}
					echo "</p></div>";
				}
			?>
			<div>
				<button onclick="validaLogin()" type="submit">Login</button>
			</div>
		</form>
		<a href="formulario.php">Pulsa aqui para registrarte</a>			
</div>