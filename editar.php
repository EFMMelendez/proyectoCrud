<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id_venta = $_POST['id_venta'];
	$id_cliente = $_POST['id_cliente'];
	$id_cajero = $_POST['id_cajero'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$cantidad = $_POST['cantidad'];
	$total = $_POST['total'];

	// Verificar campos vacíos
	if ( empty($id_venta) || empty($id_cliente) || empty($id_cajero) || empty($fecha) || empty($hora) || empty($producto) || empty($precio) || empty($cantidad) || empty($total)) {
		if (empty($id_venta)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}
		if (empty($id_cliente)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($id_cajero)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($fecha)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($hora)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($producto)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($precio)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($cantidad)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}
		if (empty($total)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE ventas SET id_cliente='$id_cliente', id_cajero='$id_cajero', fecha='$fecha', hora='$hora', producto='$producto', precio='$precio', cantidad='$cantidad', total='$total'  WHERE id_venta='$id_venta'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id_venta = $_GET['id_venta'];

if ($id_venta != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id_venta=$id_venta");

	while ($res = mysqli_fetch_array($resultado)) {
		$id_venta = $res['id_venta'];
		$id_cliente = $res['id_cliente'];
		$id_cajero = $res['id_cajero'];
		$fecha = $res['fecha'];
		$hora = $res['hora'];
		$producto = $res['producto'];
		$precio = $res['precio'];
		$cantidad = $res['cantidad'];
		$total = $res['total'];
	}
} else {
	echo "ID de id_venta no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver fechas</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Id Venta</td>
				<td><input type="text" name="id_venta" value="<?php echo $id_venta; ?>"></td>
			</tr>
			<tr>
				<td>ID Cliente</td>
				<td><input type="text" name="id_cliente" value="<?php echo $id_cliente; ?>"></td>
			</tr>
			<tr>
				<td>Id Cajero</td>
				<td><input type="text" name="id_cajero" value="<?php echo $id_cajero; ?>"></td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" value="<?php echo $fecha; ?>"></td>
			</tr>
			<tr>
				<td>hora</td>
				<td><input type="time" name="hora" value="<?php echo $hora; ?>"></td>
			</tr>
			<tr>
				<td>Producto</td>
				<td><input type="text" name="producto" value="<?php echo $producto; ?>"></td>
			</tr>
			<tr>
				<td>precio</td>
				<td><input type="number" name="precio" value="<?php echo $precio; ?>"></td>
			</tr>
			<tr>
				<td>cantidad</td>
				<td><input type="text" name="cantidad" value="<?php echo $cantidad; ?>"></td>
			</tr>
			<tr>
				<td>total</td>
				<td><input type="text" name="total" value="<?php echo $total; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_venta" value=<?php echo $_GET['id_venta']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>