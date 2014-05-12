<?php
 /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de pedidos. 								
     * #==========================================================#
     */
     
//Función que añade un pedido a la BD

function añadePedido($conexion, $id_usuario, $id_producto, $fecha, $cantidad, $precio, $id_estado){
	    try {
      $SQL="INSERT INTO pedidos (id_usuario, id_producto, fecha_pedido, cantidad, precio, id_estado) VALUES ('$id_usuario', '$id_producto', '$fecha', '$cantidad', '$precio', '$id_estado');";
      $filas=$conexion->exec($SQL);
    } catch(PDOException $e) {
        return 0;
    }
      return 1;
}

//Función que dado un usuario devuelve sus pedidos

function pedidos($conexion, $user){
	try{
   		$stmt = $conexion->prepare("SELECT * FROM pedidos WHERE id_usuario=:user ");
 	 	$stmt->bindParam(':user', $user);
  	 	$stmt->execute(); 
	}catch(PDOException $e){
   		return false;
   	}
	return $stmt;

}
   

     
?>