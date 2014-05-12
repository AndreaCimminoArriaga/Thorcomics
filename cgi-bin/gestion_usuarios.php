<?php
 /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de usuarios. 								
     * #==========================================================#
 */

//Función que devuelve dado un usuario y su contraseña, si existe, toda su informacion almacenada en la BD.

function existeUsuario($conexion,$user,$pass){
	try{
   		$stmt = $conexion->prepare("SELECT * FROM usuarios U WHERE U.correo=:user ");
 	 	$stmt->bindParam(':user', $user);
  	 	$stmt->execute(); 
		foreach ($stmt as $row) {
			$stmt=$row;
			$contrasena=$row['contrasena'];
		}
		if(!($contrasena==$pass))
			return false;
		
	}catch(PDOException $e){
   		return false;
   	}
	return $stmt;
	
}

//Función que devuelve, dado un usuario, 0 si no existe en la BD.

function existe($conexion,$user){
	try{
   		$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo=:user ");
 	 	$stmt->bindParam(':user', $user);
  	 	$stmt->execute(); 
  	 	$n=0;
		foreach($stmt as $row){
			$n=$n+1;	
		}
	}catch(PDOException $e){
   		return false;
   	}
	return $n;
}

//Función que devuelve todos los usuarios de la BD.

function todosUsuarios($conexion){
	try{
    	$consulta = "SELECT * FROM usuarios";
    	$stmt = $conexion->query($consulta);
    }catch(PDOException $e){
    	return false;
    }
   	return $stmt;
}

//Función que inserta un usuario, si lanza la excepción devuevle 0.

function insertaUsuario($conexion,$correo,$contrasena,$nombre,$apellidos,$dni,$direccion,$telefono, $cp){
    try {
      $SQL="INSERT INTO usuarios (correo, contrasena, nombre, apellidos, dni, direccion, telefono, cp) VALUES('$correo','$contrasena','$nombre','$apellidos','$dni','$direccion','$telefono', '$cp');";
      $filas=$conexion->exec($SQL);
    } catch(PDOException $e) {
        return 0;
    }
      return 1;
  }
  
//Función que dado un id de usuario y correo electrónico lo borra de la BD,si lanza la excepción devuevle 0.  
  
function borrarUsuario($conexion,$id_usuario){
	try{
		$SQL="DELETE FROM usuarios WHERE id_usuario='$id_usuario'";
		$borrado=$conexion->exec($SQL);
	}catch(PDOException $e){
		return 0;
	}
	return 1;

}


//Función que dada la información de un usuario actualiza la que se encontrara anteriormente en la BD, si lanza la excepción devuevle 0.

function actualizaUsuario($conexion,$id_usuario,$correo,$contrasena,$nombre,$apellidos,$dni,$direccion,$telefono,$cp){
  try{
		$SQL="UPDATE usuarios SET correo='$correo', contrasena='$contrasena', nombre='$nombre', apellidos='$apellidos', dni='$dni', direccion='$direccion', telefono='$telefono', cp='$cp' WHERE id_usuario='$id_usuario';";
		$actualizacion=$conexion->exec($SQL);
	}catch(PDOException $e){
		return 0;
	}
	return 1;
  
  
}


?>