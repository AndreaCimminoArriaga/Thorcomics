<?php
 /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de productos. 								
     * #==========================================================#
     */
     
//Función que devuelve todo el contenido de la tabla productos 
 
function encuentraTodo($conexion){
	
	try{
    	$consulta = "SELECT * FROM productos";
    	$stmt = $conexion->query($consulta);
    }catch(PDOException $e){
    	return false;
    }
    
   	return $stmt;
    
}

//Función que devuelve todo el contenido de la tabla productos filtrado por id_producto

function encuentraPorId($conexion,$id){
	try{
    $stmt = $conexion->prepare("SELECT * FROM productos P WHERE P.id_producto=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}

//Función que devuelve todo el contenido de la tabla productos filtrado por el nombre del producto

function encuentraPorNombre($conexion,$nombre){
	try{

    $stmt = $conexion->prepare("SELECT * FROM productos P WHERE P.nombre=:nombre");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute(); 
		
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}

//Función que devuelve todo el contenido de la tabla productos filtrado por el autor del producto

function encuentraPorAutor($conexion,$autor){
	try{

    $stmt = $conexion->prepare("SELECT * FROM productos P WHERE P.autor=:aut");
    $stmt->bindParam(':aut', $autor);
    $stmt->execute(); 
		
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}

//Función que devuelve todo el contenido de la tabla productos filtrado por la editorial del producto

function encuentraPorEditorial($conexion,$editorial){
	try{

    $stmt = $conexion->prepare("SELECT * FROM productos P WHERE P.editorial=:edit");
    $stmt->bindParam(':edit', $editorial);
    $stmt->execute(); 
		
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}

//Función que devuelve todo el contenido de la tabla productos filtrado por categoría

function encuentraPorCategoria($conexion,$categoria){
	try{

    $stmt = $conexion->prepare("SELECT * FROM productos P, categorias C WHERE P.id_categoria=C.id_categoria AND C.categoria=:cat");
    $stmt->bindParam(':cat', $categoria);
    $stmt->execute(); 
		
	}catch(PDOException $e){
    	return false;
    }
	return $stmt;
}

//Función que devuelve todo el contenido de la tabla productos filtrado según un parametro de entrada

function encuentraPor($conexion, $categoria, $valorBusqueda){
	switch ($categoria) {
    case 0:
        return encuentraPorNombre($conexion,$valorBusqueda);
        break;
    case 1:
         return encuentraPorAutor($conexion,$valorBusqueda);
        break;
    case 2:
        return encuentraPorEditorial($conexion,$valorBusqueda);
        break;
    case 3:
        return encuentraPorCategoria($conexion,$valorBusqueda);
        break;
    case 5:
        return encuentraTodo($conexion);
        break;
	}
}

//Función que devuelve los 5 productos más vendidos

function encuentra5MasVendidos($conexion){
	try{   	
    	$consulta = "SELECT DISTINCT pr.nombre FROM pedidos Pe INNER JOIN productos Pr ON Pr.id_producto = Pe.id_producto GROUP BY Pe.id_producto ORDER BY cantidad DESC LIMIT 0, 5 ";
    	$stmt = $conexion->query($consulta);
    }catch(PDOException $e){
    	return false;
    }
   	return $stmt;
}



?>