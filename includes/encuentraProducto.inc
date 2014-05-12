<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

	<!-- La funcionalidad de este trozo de código es extraer de la base de datos los productos y si es necesario filtrarlos según
			el criterio indicado en el menu de busqueda	-->
	
	<?php
		
		//Busca los productos en la BD por la categoria indicada en el fichero html correspondiente
		
		$lineas =  encuentraPorCategoria($conexion,$categoria);
		
		//Rescata del formulario de filtrado la opcion de la busqueda
		
		$opcionBusqueda = $_REQUEST["opcionBusqueda"];
		$filtro = $_REQUEST["valorBusqueda"];
		$index=0;
		$productos=array();
		
		//En caso de que no haya datos en la base de datos, imprimimos lo siguiente
		
		if($lineas == false){			
	?>
		<div class="modulo">
			<h2>Lo sentimos, no hay ningun producto relacionado.</h2>
			<p>Puedes probar buscandolo por otro criterio como titulo, autor, editorial, etc.</p>
		</div>	
				
	<?php
		}else{
		
		//En caso de que si haya datos recorremos las filas
		
			foreach($lineas as $f){	
				array_push($productos,$f);
				
				//Miramos si el usuario esta filtrando, en caso de que $opcionBusqueda==1
				
				if($opcionBusqueda==1){
				
				//Comprobamos si la palabra que busca coincide con elgun valor
				
				if(in_array($filtro, $f)){	//Si coincide algo se imprime filtrando el resultado
					$index=1;
	?>				
		<div class="modulo">
			<img src="./media/portadas_productos/<?php echo $f["imagen"];?>" class="comic" alt="nopic">
			<h2> <?php echo $f["nombre"]; ?></h2>
			<p>
	<?php 
					echo "Autor: ".$f["autor"].".<br>"; 
					echo "Precio: ".$f["precio"]." &dollar;.<br><br>";
					echo "Descripcion: ".$f["descripcion"].".";
	?>
			</p>
			<form id="formularioProductoSeleccionar"  action="cgi-bin/añadeProducto.php" method="post">
				<div>
					<label for="cantidad1">Cantidad:</label>
					<input name="cantidad" id="cantidad1" type="number" min="1" max=" <?php echo $f["stock"];?>" value="1">
					<input class="valorP" name="precio" type="text" value="<?php echo $f["precio"];?>">
					<input class="valorP" name="nombre" type="text" value="<?php echo $f["nombre"];?>">
					<input class="valorP" name="id" type="text" value="<?php echo $f["id_producto"];?>">
					<input class="valorP" name="localizacion" type="text" value="<?php echo $posicion;?>">
					<button type="submit" >Añadir Producto</button>
					<br>
				</div>		
			</form>
			<br>
		</div>
	<?php	
					}
				//En caso de que el user no este filtrando la busqueda
				}else{
					$index=1;	
	?>				
		<div class="modulo">
			<img src="./media/portadas_productos/<?php echo $f["imagen"] ;?>" class="comic" alt="nopic">
			<h2> <?php echo $f["nombre"]; ?></h2>
			<p>
	<?php 
				echo "Autor: ".$f["autor"].".<br>"; 
				echo "Precio: ".$f["precio"]." &dollar;.<br><br>";
				echo "Descripcion: ".$f["descripcion"].".";
	?>
			</p>
			<form id="formularioProductoSeleccionar"  action="cgi-bin/añadeProducto.php" method="post">
				<div>
					<label for="cantidad1">Cantidad:</label>
					<input name="cantidad" id="cantidad2" type="number" min="1" max="<?php echo $f["stock"]?>" value="1">
					<input class="valorP" name="precio" type="text" value="<?php echo $f["precio"];?>">
					<input class="valorP" name="nombre" type="text" value="<?php echo $f["nombre"];?>">
					<input class="valorP" name="id" type="text" value="<?php echo $f["id_producto"];?>">
					<input class="valorP" name="localizacion" type="text" value="<?php echo $posicion;?>">
					<button type="submit" >Añadir Producto</button>
					<br>
				</div>
			</form>
			<br>
		</div>
	<?php
					}
				}
				//Si hasta ahora $index no se ha hecho 1, es decir ni el user esta filtrando, ni hay productos en la BD
				//imprimimos lo siguiente
			if($index==0){
						
	?>
					<div class="modulo">
					<h2>Lo sentimos, no hay ningun producto relacionado.</h2>
					<p>Puedes probar buscandolo por otro criterio como titulo, autor, editorial, etc.</p>
					</div>	
				
		<?php				
					}
		
			}
		$_SESSION["productos"]=$productos;
	?>	
