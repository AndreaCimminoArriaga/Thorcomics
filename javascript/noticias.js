//Función para el menú de noticias

//ejecuta la función en cuanto se cargue el documento 

$(document).ready(function() {
 
    // Establecemos la velocidad de rotación.
    var velocidad = 5000;
    var ejecutar = setInterval('rotar()', velocidad);  
     
    // Definimos la posicion de la esquina izquierda, necesaria para hacer los "saltos"
    var longitud = $('#noticias li').outerWidth();
    var izquierda = longitud * (-1);
         
    // Colocamos al principio el último elemento, por si rotamos al reves, manteniendo el inicial.
    $('#noticias li:first').before($('#noticias li:last'));
    $('#noticias ul').css({'left' : izquierda});
 
    // Definimos una función para retroceder en las imagenes
    $('#anterior').click(function() {
 
        var incremento = parseInt($('#noticias ul').css('left')) + longitud;
        $('#noticias ul').animate({'left' : incremento}, 200,function(){   
 
            // Recolocar los items, manteniendo el orden.              
            $('#noticias li:first').before($('#noticias li:last'));          
            $('#noticias ul').css({'left' : izquierda});
         
        });

        // Evitamos que el link nos devuelva al comienzo de la pagina  
        return false;
             
    });
 
 
    // Definimos una función para avanzar en las imagenes
    $('#siguiente').click(function() {
         
        var incremento = parseInt($('#noticias ul').css('left')) - longitud;         
        $('#noticias ul').animate({'left' : incremento}, 200, function () {
             
            // Recolocamos los items y el orden.
            $('#noticias li:last').after($('#noticias li:first'));                 
            $('#noticias ul').css({'left' : izquierda});
         
        });
                  
        // Evitamos que el link nos devuelva al comienzo de la pagina
        return false;
         
    });       
     
    // Si colocamos el raton sobre el menu, se para, para que se pueda ver con tranquilidad.
    $('#noticias').hover(
         
        function() {
            clearInterval(ejecutar);
        },
        function() {
            ejecutar = setInterval('rotar()', velocidad);  
        }
    ); 
}); 
 
// Funcion que simula el click al boton de avanzar, para que el timer lo haga automatico. 
function rotar() {
    $('#siguiente').click();
}
