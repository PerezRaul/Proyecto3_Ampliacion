<?php
	include 'conexion.php';


	$sql_delete = "DELETE FROM reserva WHERE id_reserva = $_REQUEST['id_reserva']";

	// mysqli_query($con, $sql_insert) or die("Problemas en el delete".mysqli_error($con));

	// header("Location: admin.php");

	mysqli_close($con);

	
?>