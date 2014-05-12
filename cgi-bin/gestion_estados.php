<?php
 /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de estados del pedido. 								
     * #==========================================================#
     */
 
//Función que recibe un id de estado y devuelve el estado asociado de la tabla estados_pedido  
 
function estadoPorId($conexion,$id){
	try{
    $stmt = $conexion->prepare("SELECT * FROM estados_pedido E WHERE E.id_estado=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}
 
 
 
 
 
?>