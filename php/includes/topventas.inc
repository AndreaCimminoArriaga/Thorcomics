<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	
	<!--Modulo flotante de la izquierda para mostrar los 5 productos mas vendidos-->
	
	<div class="modulo">
		<table id="topventas">
			<tr><th colspan="2">Top ventas</th></tr>
			<?php 
				$lineas = encuentra5Masvendidos($conexion);
				if($lineas==false){
			?>	
			<tr>
				<td>&#35;<?php echo $n;?></td>
				<td><?php echo "No product";?></td>
			</tr>
			
			<?php	
				}else{
				$n=0;
				foreach($lineas as $l){
					$n= $n+1;
			?>
			<tr>
				<td>&#35;<?php echo $n;?></td>
				<td><?php echo $l["nombre"]?></td>
			</tr>
			<?php 
					if($n==5){
						break;
						}
					}
				}	
			?>
	
		</table>
	</div>