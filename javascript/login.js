//Funcion de validacion para el campo login

function login_correo(elem){
	var exp = /^[a-ú][a-ú-_0-9.]+@[a-ú-_0-9.]+.[a-ú]{2,3}$/i;
	
	if(!elem.value.match(exp)){
		alert("Por favor revisa que el correo electronico tenga un formato correcto: \n\t tucorreo@dominio.extensión");
	}
	
}

//Funcion de validacion para el campo pass

function login_pass(elem){
	
	var exp =/^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]{4,}[a-ú0-9-_.¿?¡!]$/i;
		
	if(!elem.value.match(exp)  ){
		alert("Por favor revisa la contraseña, los caracteres especiales aceptados son: Letras, Números, ¿, ?, !, ¡, -, _, . \n Debera tener un minimo de 6 caracteres.");
	}
	
}

//Funcion de validacion para el login

function validaLogin(){
	
	var user = document.getElementById("user");
	var pass = document.getElementById("password");
	var expU = /^[a-ú][a-ú-_0-9.]+@[a-ú-_0-9.]+.[a-ú]{2,3}$/i;
	var expP = /^[a-ú0-9-_.¿?¡!][a-ú0-9-_.¿?¡!]{4,}[a-ú0-9-_.¿?¡!]$/i;
	var bandera = true;
	
	if(!user.value.match(expU)){
		alert("Por favor revisa que el correo electronico tenga un formato correcto: \n\t tucorreo@dominio.extensión");
		bandera = false;
	}
	if(!pass.value.match(expP)){
		alert("Por favor revisa la contraseña, los caracteres especiales aceptados son: Letras, Números, ¿, ?, !, ¡, -, _, . \n Debera tener un minimo de 6 caracteres.");
		bandera = false;
	}
	if(bandera){
		document.getElementById("modulo_login").submit();
	}



}
