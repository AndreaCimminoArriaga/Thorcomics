<?php
	session_start();

	//Rescata si hay errores de login y los datos del formulario

	$errores = $_SESSION["erroresLogin"];
	$formularioLogin = $_SESSION["formularioLogin"];

	//Filtro que se usa para asegurarse de que el cliente accede correctamente al fichero de login
	//relacionado con la validación

	if(!isset($formularioLogin)){
		$formularioLogin["user"]="";
		$formularioLogin["pass"]="";
		$_SESSION["formularioLogin"]=$formularioLogin;
	}

?>