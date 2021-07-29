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

				/* Condicion para mostrar los datos del carrito */
				if(!empty($_SESSION['add_carro'])){

				/* Variable para sumar los precios */
				$total = 0;

				foreach($_SESSION['add_carro'] as $keys => $values){

				/* Sumatoria de todos los precios del carrito */
				$total = ($total + $values['item_precio']);
				?>
				<tr>
					<td><?php echo $values['item_id']; ?></td>
					<td><?php echo $values['item_nombre']; ?></td>
					<td><?php echo $values['item_precio']; ?></td>
					<td><?php echo $values['item_stock']; ?></td>
					<td>

						<!-- Boton para eliminar el producto del carrito -->
						<a class="btn btn-danger" type="submit" href="carrito.php?action=delete&id=<?php echo $values['item_id']; ?>">Eliminar del carrito</a>
					</td>
				</tr>
				<?php 
				}
			?>

			<tr>
				<!-- Mostramos los precios sumados de todos los productos -->
				<td>TOTAL: <?php echo $total; ?></td>
			</tr>

				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>