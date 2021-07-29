<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carrito</title>

	<!-- Links de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!-- Llamamos al codigo del carrito -->
	<?php include('car.php'); ?>

</head>
<body>
	<div class="container">
		<h2>PRODUCTOS</h2>
		<br>
		<table class="table table-bordered">
			<thead>				
			<tr>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>PRECIO</th>
				<th>ESTADO</th>
				<th>ACCIONES</th>
			</tr>
			</thead>
			<tbody>
				<?php 
				/* Llamamos a la conexion */
				include('conexion.php');

				/* Declaramos una variable para almacenar nuestros datos */
				$resultado = $mysqli -> query ('SELECT * FROM productos');

				/* Listamos los datos */
				while ($row=$resultado->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['precio']; ?></td>
					<td><?php echo $row['estado']; ?></td>
					<td>

						<!-- action - enviamos principalmente el ID del produto mediante el metodo POST -->
						<form action="carrito.php?action=add&id=<?php echo $row['id']; ?>" method="POST">

							<!-- name = hidden_nombre, hidden_precio y hidden_stock, son utilizados para almacenar los datos de value y luego enviado a car.php para cargar los datos del producto en el carrito.php -->
							<input type="hidden" name="hidden_nombre" value="<?php echo $row['nombre']; ?>">
							<input type="hidden" name="hidden_precio" value="<?php echo $row['precio']; ?>">
							<input type="hidden" name="hidden_stock" value="<?php echo $row['estado']; ?>">
							<button class="btn btn-primary" name="agregar" type="submit">Agregar</button>
						</form>
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>