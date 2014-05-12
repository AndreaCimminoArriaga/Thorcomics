<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

	<div id="moduloCarrito" class="modulo">

		<?php 
			if(!isset($_SESSION["pedido"])){
				$pedido["cantidad"] = 0;
				$pedido["precio"] = 0;
				$_SESSION["pedido"]=$pedido;
			}else{
				$pedido = $_SESSION["pedido"];
			}
		?>

		<h1>Pedido</h1>
		<p>Productos: <?php echo $pedido["cantidad"];?></p>
		<hr>
		<p>Precio: <?php echo $pedido["precio"];?> &dollar;</p>		
		
		<form name="formularioCompra" action="cgi-bin/realizarCompra.php">
			<button type="submit" >Realizar Compra</button>							
		</form>
		
	</div>