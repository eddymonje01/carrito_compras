<?php 

	/* ESTE CARRITO DE COMPRAS ES ALMACENADO EN LA MEMORIA CACHE DEL NAVEGADOR */

	/* Sesion del carrito */
	session_start();

	/* Funciones del carrito */
	if(isset($_POST['agregar'])){

		/* Agregamos datos al carrito */
		if (isset($_SESSION['add_carro'])) {
			
			/* Mediante un array llamaremos los datos */
			$item_array_id_car = array_column($_SESSION['add_carro'], 'item_id');

			if (!in_array($_GET['id'], $item_array_id_car)) {				

				$count = count($_SESSION['add_carro']);

				/* id,hidden_nombre, hidden_precio y hidden_stock son los datos del formulario que son enviamos por el formulario de index.php */

				/* item_id, item_nombre, item_precio e item_stock se almacenan los datos para luego ser listados en carrito.php */
				$item_array = array(
					'item_id' => $_GET['id'],
					'item_nombre' => $_POST['hidden_nombre'],
					'item_precio' => $_POST['hidden_precio'],
					'item_stock' => $_POST['hidden_stock'],
				);

				/* Por la session add_carro aumentamos los productos */
				$_SESSION['add_carro'][$count] = $item_array;

			}else{
				/* Si el id es el mismo, se muestra el siguiente mensaje */
				echo "<script>alert('El productos ya existe en el carrito!');</script>";
			}

		}

		else{
			$item_array = array(
				'item_id' => $_GET['id'],
				'item_nombre' => $_POST['hidden_nombre'],
				'item_precio' => $_POST['hidden_precio'],
				'item_stock' => $_POST['hidden_stock'],
			);

				/* Si no hay datos llamados al carrito mostramos nada */
				$_SESSION['add_carro'][0] = $item_array;
		}

	}
	/* Funciones del carrito */

	/* Eliminar el producto del carrito */
	if (isset($_GET['action'])) {
		
		/* Condicion para eliminar el producto del carrito */
		if ($_GET['action'] == 'delete') {
			
			foreach ($_SESSION['add_carro'] as $key => $value) {
				
				if ($value['item_id'] == $_GET['id']) {

					unset($_SESSION['add_carro'][$key]);

					/* Mostramos un mensaje que el producto fue eliminado y cargamos la pagina nuevamente al carrito.php, o cuando eliminemos que nos cargue a index.php */
					echo "<script>alert('El producto fue eliminado');</script>";
					echo "<script>window.location='carrito.php';</script>";

				}

			}

		}


	}


?>