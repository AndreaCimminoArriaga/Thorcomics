<?php
session_start();

//Cargamos el directorio raíz del proyecto

$dir = $_SERVER['DOCUMENT_ROOT'];

//Filtro por asegurarnos de que el usuario accede correctamente al fichero de validación php

if(!isset($_SESSION['erroresActualizacion']) || $_SESSION['erroresActualizacion']==null){
	$formulario['input_nombre']="";
	$formulario['input_apellidos']="";
	$formulario['input_dni']="";
	$formulario['input_direccion']="";
	$formulario['input_codigoPostal']="";
	$formulario['input_tlf']="";
	$formulario['input_correo1']="";
	$formulario['input_correo2']="";
	$formulario['input_contraseña1']="";
	$formulario['input_contraseña2']="";
	$_SESSION['actualizacion']=$formulario;
}else{
	$formulario=$_SESSION['actualizacion'];
}

//Imprimiendo los posibles errores de formato que tengan los campos

if(isset($_SESSION['erroresActualizacion']) && count($_SESSION['erroresActualizacion'])>0){
	echo "<div id=\"erroresRegistro\">";
	foreach($_SESSION['erroresActualizacion'] as $error){
		echo "<p>".$error."</p><br>";
	}
	echo "</div>";
	$_SESSION['erroresActualizacion']=null;

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Thor Comics - Modificar Perfil</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Añadiendo CSS y javascript-->

		<?php include($dir.'/thorcomics/includes/imports.inc');?>
		
		<link rel="stylesheet" href="css/formularios.css" type="text/css"> 
    	<script type="text/javascript" src="javascript/formulario_ins.js"></script>
    	
	</head>
	<body>
		
		<!-- Cabecera -->
	
		<?php include ($dir.'/thorcomics/includes/cabecera.inc'); ?>
	
		<!-- Cuadro central -->
	
		<div id="page" >
		
			<form id="formulario_inscripcion" name="formulario_inscripcion" method="post" action="cgi-bin/actualizacion.php" >
				<fieldset id="fieldsetleft">
					<legend>Datos Personales</legend>
			
					<label for="input_nombre">Nombre: </label>
					<input id="input_nombre"  name="input_nombre" type="text" onblur="validaN(this);" value="<?php echo $formulario['input_nombre'] ?>">
					<img id="verdeN" src="media/verde.jpg" alt="no-pic">
					<img id="rojoN" src="media/rojo.jpg" alt="no-pic">
			
					<label for="input_apellidos">Apellidos: </label>
					<input id="input_apellidos" name="input_apellidos"  type="text" onblur="validaA(this);" value="<?php echo $formulario['input_apellidos'] ?>" >
					<img id="verdeA" src="media/verde.jpg" alt="no-pic" >
					<img id="rojoA" src="media/rojo.jpg" alt="no-pic">
			
					<label for="input_dni">DNI: </label>
					<input id="input_dni" name="input_dni"  type="text" onblur="validaDn(this);" value="<?php echo $formulario['input_dni'] ?>">
					<img id="verdeDn" src="media/verde.jpg" alt="no-pic" >
					<img id="rojoDn" src="media/rojo.jpg" alt="no-pic">
			
					<label for="input_direccion">Dirección: </label>
					<input id="input_direccion" name="input_direccion"  type="text" onblur="validaDi(this);" value="<?php echo $formulario['input_direccion'] ?>">
					<img id="verdeDi" src="media/verde.jpg" alt="no-pic">
					<img id="rojoDi" src="media/rojo.jpg" alt="no-pic">
			
					<label for="input_codigoPostal">C.p.: </label>
					<input id="input_codigoPostal" name="input_codigoPostal"  type="text"  onblur="validaCp(this);" value="<?php echo $formulario['input_codigoPostal'] ?>">
					<img id="verdeCp" src="media/verde.jpg" alt="no-pic">
					<img id="rojoCp" src="media/rojo.jpg" alt="no-pic" ><br >
			
					<label for="input_tlf">Tlf: </label>
					<input id="input_tlf" name="input_tlf"  type="text" onblur="validaT(this);" value="<?php echo $formulario['input_tlf'] ?>">	
					<img id="verdeT" src="media/verde.jpg" alt="no-pic">
					<img id="rojoT" src="media/rojo.jpg" alt="no-pic">
			
				</fieldset>
			
				<fieldset id="fieldsetright">
					<legend>Datos de Usuario</legend>
			
					<label for="input_correo1">Correo: </label>
					<input id="input_correo1"  name="input_correo1" type="text" onblur="validaC1(this);" value="<?php echo $formulario['input_correo1'] ?>">
					<img id="verdeC1" src="media/verde.jpg" alt="no-pic">
					<img id="rojoC1" src="media/rojo.jpg" alt="no-pic"><br>
			
					<label for="input_correo2">Correo de nuevo: </label>
					<input id="input_correo2" name="input_correo2"  type="text" onblur="validaC2(this);" value="<?php echo $formulario['input_correo2'] ?>">
					<img id="verdeC2" src="media/verde.jpg" alt="no-pic">
					<img id="rojoC2" src="media/rojo.jpg" alt="no-pic" ><br>	
					
					<label for="input_contrasena1">Contrase&ntilde;a: </label>
					<input id="input_contrasena1" name="input_contrasena1"  type="password" onblur="validaP1(this);" value="<?php echo $formulario['input_contraseña1'] ?>">
					<img id="verdeP1" src="media/verde.jpg" alt="no-pic" >
					<img id="rojoP1" src="media/rojo.jpg" alt="no-pic" ><br>
			
					<label for="input_contrasena2">Contrase&ntilde;a de nuevo: </label>
					<input id="input_contrasena2" name="input_contrasena2"  type="password" onblur="validaP2(this);" value="<?php echo $formulario['input_contraseña2'] ?>">
					<img id="verdeP2" src="media/verde.jpg" alt="no-pic" >
					<img id="rojoP2" src="media/rojo.jpg" alt="no-pic" >
					<div id="nivelS">
						<label >Nivel de seguridad:</label> 
						<img id="rojoNi"  src="media/rojo.jpg" alt="no-pic">
						<img id="naranjaNi" src="media/naranja.jpg" alt="no-pic">
						<img id="verdeNi" src="media/verde.jpg" alt="no-pic">
					</div>
				</fieldset>
				<div><input name="botonR" type="submit" value="Modificar" onclick="validaTodo();" >
				<input name="botonB" type="reset" value="Borrar Datos">
				</div>
			</form>	
		</div>
		
		<!-- Footer -->
	
		<?php include($dir.'/thorcomics/includes/footer.inc');?>
	</body>
</html>
<?php desconecta($conexion);?>