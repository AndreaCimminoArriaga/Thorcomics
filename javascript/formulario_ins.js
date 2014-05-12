//Funcion de validacion para el campo nombre

function validaN(elem){
	
	var exp = /^[a-ú][a-ú\s]*[a-ú]$/i;
	
	if(elem.value.match(exp)){
	$("#verdeN").css("visibility", "visible");
	$("#rojoN").css("visibility", "hidden");
	return true;
	}else{
	$("#verdeN").css("visibility", "hidden");
	$("#rojoN").css("visibility", "visible");
	return false;
	}
	
}

//Funcion de validacion para el campo apellidos

function validaA(elem){
	
	var exp = /^[a-ú][a-ú\s]*[a-ú]$/i;
	
	if(elem.value.match(exp)){
	
	$("#verdeA").css("visibility", "visible");
	$("#rojoA").css("visibility", "hidden");
	
	}else{
	
	$("#verdeA").css("visibility", "hidden");
	$("#rojoA").css("visibility", "visible");

	}

}

//Funcion de validacion para el campo dni

function validaDn(elem){
	
	var exp = /^[0-9]{7}([0-9][A-Z]|[0-9])$/;
	
	if( elem.value.match(exp) ){
	
	$("#verdeDn").css("visibility", "visible");
	$("#rojoDn").css("visibility", "hidden");

	}else{
	
	$("#verdeDn").css("visibility", "hidden");
	$("#rojoDn").css("visibility", "visible");

	}	
}

//Funcion de validacion para el campo dirección

function validaDi(elem){
	
	var exp =/^[a-ú\s/\\/0-9ºª,][a-ú\s/\\/0-9ºª,]*[a-ú\s/\\/0-9ºª,]$/i;
	
	if( elem.value.match(exp) ){
	
	$("#verdeDi").css("visibility", "visible");
	$("#rojoDi").css("visibility", "hidden");

	}else{
	
	$("#verdeDi").css("visibility", "hidden");
	$("#rojoDi").css("visibility", "visible");

	}	
}

//Funcion de validacion para el campo codigo postal

function validaCp(elem){
	
	var exp =/^\d{5}$/ ;
	
	if( elem.value.match(exp) ){
	
	$("#verdeCp").css("visibility", "visible");
	$("#rojoCp").css("visibility", "hidden");

	}else{
	
	$("#verdeCp").css("visibility", "hidden");
	$("#rojoCp").css("visibility", "visible");

	}	
}

//Funcion de validacion para el campo telefono

function validaT(elem){
	var exp = /^\d{5,17}$/;
	
	if( elem.value.match(exp)){
	$("#verdeT").css("visibility", "visible");
	$("#rojoT").css("visibility", "hidden");

	}else{
	$("#verdeT").css("visibility", "hidden");
	$("#rojoT").css("visibility", "visible");

	}

}

//Funcion de validacion para el campo correo1

function validaC1(elem){
	var exp = /^[a-ú][a-ú-_0-9.]+@[a-ú-_0-9.]+.[a-ú]{2,3}$/i;
	
	
	if( elem.value.match(exp)){
	$("#verdeC1").css("visibility", "visible");
	$("#rojoC1").css("visibility", "hidden");

	}else{
	$("#verdeC1").css("visibility", "hidden");
	$("#rojoC1").css("visibility", "visible");
	alert("Por favor revisa que el correo electronico tenga un formato correcto: \n\t tucorreo@dominio.extensión");

	}
	
}

//Funcion de validacion para el campo correo2

function validaC2(elem1){
	
	var elem2 = document.getElementById("input_correo1");
	
	var exp = /^[a-ú][a-ú-_0-9.]+@[a-ú-_0-9.]+.[a-ú]{2,3}$/i;
	if(!elem1.value.match(exp)){
		alert("Por favor revisa que el correo electronico tenga un formato correcto: \n\t tucorreo@dominio.extensión");
	
	}else{
	if( elem2.value == elem1.value  ){
	$("#verdeC2").css("visibility", "visible");
	$("#rojoC2").css("visibility", "hidden");
	
	}else{
	$("#verdeC2").css("visibility", "hidden");
	$("#rojoC2").css("visibility", "visible");
	alert("Los correos introducidos son distintos");
	}
	}
}

//Funcion de validacion para el campo contraseña1

function validaP1(elem){
	
	var exp =/^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]{4,}[a-ú0-9-_.¿?¡!]$/i;
	var A = /^[a-ú][a-ú]*[a-ú]$/i;
	var A2 = /^[0-9][0-9]*[0-9]$/i;
	var B =/^[a-ú0-9][a-ú0-9]*[a-ú0-9]$/i;
	var C =/^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]*[a-ú0-9-_.¿?¡!]$/i;
	
	if( elem.value.match(exp)  ){
	$("#verdeP1").css("visibility", "visible");
	$("#rojoP1").css("visibility", "hidden");
	}else{
	$("#verdeP1").css("visibility", "hidden");
	$("#rojoP1").css("visibility", "visible");
	alert("Por favor revisa la contraseña, los caracteres aceptados son: Letras, Números, ¿, ?, !, ¡, -, _, . \n Debera tener un minimo de 6 caracteres.");
	}
	
	//Haciendo la evaluación de la seguridad de la contraseña
	
	if(elem.value.match(A) || elem.value.match(A2) ){
		$("#rojoNi").css("visibility", "visible");
		$("#verdeNi").css("visibility", "hidden");
		$("#naranjaNi").css("visibility", "hidden");
	}else{
	if(elem.value.match(B)){
		$("#naranjaNi").css("visibility", "visible");
		$("#rojoNi").css("visibility", "visible");
		$("#verdeNi").css("visibility", "hidden");
		
	}else{
	if(elem.value.match(C)){
		$("#verdeNi").css("visibility", "visible");
		$("#naranjaNi").css("visibility", "visible");
		$("#rojoNi").css("visibility", "visible");
	}}}

}

//Funcion de validacion para el campo contraseña2

function validaP2(elem1){
	
	var elem2 = document.getElementById("input_contrasena1");
	
	var exp =/^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]*[a-ú0-9-_.¿?¡!]$/i;
	if(!elem1.value.match(exp) ){
	alert("Por favor revisa la contraseña, los caracteres especiales aceptados son: Letras, Números, ¿, ?, !, ¡, -, _, . \n Debera tener un minimo de 6 caracteres.");
	}else{	
	if( elem2.value == elem1.value  ){
	$("#verdeP2").css("visibility", "visible");
	$("#rojoP2").css("visibility", "hidden");

	}else{
	$("#verdeP2").css("visibility", "hidden");
	$("#rojoP2").css("visibility", "visible");
	alert("Las contraseñas introducidas son distintas");

	}}
	
}  

//Funcion de validacion para todo el formulario que se activa al hacer click sobre el boton de envio

function validaTodo(elem){
	
	var expN = /^[a-ú][a-ú\s]*[a-ú]$/i;
	var expDni =  /^[0-9]{7}([0-9][A-Z]|[0-9]|[0-9][\\-][A-Z])$/;
	var expDir =/^[a-ú\s/\\/0-9ºª,][a-ú\s/\\/0-9ºª,]*[a-ú\s/\\/0-9ºª,]$/i;
	var expCp =/^\d{5}$/ ;
	var expTlf = /^\d{5,17}$/;	
	var expC1 = /^[a-ú][a-ú-_0-9.]+@[a-ú-_0-9.]+.[a-ú]{2,3}$/i;c
	var expP1 =/^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]*[a-ú0-9-_.¿?¡!]$/i;
	var nombre = document.getElementById("input_nombre");
	var apellidos = document.getElementById("input_apellidos");
	var dni = document.getElementById("input_dni");
	var dir = document.getElementById("input_direccion");
	var cp = document.getElementById("input_codigoPostal");
	var tlf = document.getElementById("input_tlf");
	var c1 = document.getElementById("input_correo1");
	var c2 = document.getElementById("input_correo2");
	var p1 = document.getElementById("input_contrasena1");
	var p2 = document.getElementById("input_contrasena2");	
	var bandera = true	;
	
	if(!nombre.value.match(expN)){
		alert("Hay un error con el formato del nombre insertado.");
		bandera = false;
	}		
	if(!apellidos.value.match(expN)){
		alert("Hay un error con el formato de los apellidos insertados.");
		bandera = false;
	}
	if(!dni.value.match(expDni)){
		alert("Hay un error con el formato del DNI insertado.");
		bandera = false;
	}
	if(!dir.value.match(expDir)){
		alert("Hay un error con el formato de la dirección insertada.");
		bandera = false;
	}
	
		
	if(!cp.value.match(expCp)){
		alert("Hay un error con el formato del codigo postal insertado.");
		bandera = false;
	}
	
	if(!tlf.value.match(expTlf)){
		alert("Hay un error con el formato del telefono insertado.");
		bandera = false;
	}
	
	if(!c1.value.match(expC1)){
		alert("Hay un error con el formato o el numero de caracteres del primer correo electronico insertado.");
		bandera = false;
	}
	if(!c2.value.match(expC1)){
		alert("Hay un error con el formato del segundo correo electronico insertado.");
		bandera = false;
	}
	if(!(c1.value == c2.value)){
		alert("Los correos electronicos insertados no coinciden.");
		bandera = false;
	}
	
	
	if(!p1.value.match(expP1)){
		alert("Hay un error con el formato de la primera contraseña insertada.");
		bandera = false;
	}
	if(!p2.value.match(expP1)){
		alert("Hay un error con el formato de la segunda contraseña insertada.");
		bandera = false;
	}
	
	if(! (p1.value==p2.value)){
		alert("Las contraseñas insertadas no coinciden.");
		bandera = false;
	}
		
	if(bandera){
	bandera=false;	
	document.getElementById("formulario_inscripcion").submit();
	}
				
}




 
 