//Funcion para el menú flotante

function mainmenu(){

//Indicamos que no se muestr el submenu de categorías

$(" #navegador ul ").css({display: "none"}); // Opera Fix

//Indicamos que cuando el cursor este sobre el <li> de Comics se ejecute esta función

$(" #navegador li").hover(function(){
		
		//Distinguimos si el cliente unsa firefox o chrome (los motores que corren por detras)
		//Una vez distinguido muestra el menú (cambiando el css de visibility) y lo muestra a una velocidad de 400
		
		if(navigator.product == 'Gecko'){ 
			$(this).find('ul:first').css({visibility: "visible",display: "none",top: "19px"}).show(400);
		} else {
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		}//Ahora indicamos que se oculte al salis de la región del submenu
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 //Indica que ejecute la función en cuanto se cargue el menú (JQUEY)
 
 $(document).ready(function(){					
	mainmenu();
});
 
 
 