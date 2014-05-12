<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

	<!-- Modulo de filtrado de productos -->

	<div class="modulo">
		<h2>Busqueda de Productos</h2>
		<form id="formularioBusqueda" name="formularioBusqueda" method="post" action="none">
			<div class="centro">
				<label for="opcionBusqueda">Encuentra por: </label>
				<select id="opcionBusqueda" name="opcionBusqueda">
					<option value="2">Todo</option>
					<option value="1">Titulo</option>
					<option value="1">Autor</option>
					<option value="1">Editorial</option>
				</select>
				<input type="text" name="valorBusqueda">
				<input type="submit" id="botonBusqueda" value="Buscar">
			</div>
		</form>
	</div>
