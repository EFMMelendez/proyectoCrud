<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_venta = $_POST['id_venta'];
	$id_cliente = $_POST['id_cliente'];
	$id_cajero = $_POST['id_cajero'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$cantidad = $_POST['cantidad'];
	$total = $_POST['total'];
	$id = $_SESSION['id'];

	if(empty($id_venta) || empty($id_cliente) || empty($id_cajero) || empty($fecha) || empty($hora) || empty($producto) || empty($precio) || empty($cantidad)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO ventas (id_venta, id_cliente, id_cajero, fecha, hora, producto, precio, cantidad, total, id) VALUES ('$id_venta', '$id_cliente', '$id_cajero', '$fecha', '$hora', '$producto', '$precio', '$cantidad', '$total', '$id')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
