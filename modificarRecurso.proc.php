<?php
	include 'conexion.php';

	$sql_insert = "UPDATE recurso SET nombre = '$_REQUEST[nombre]', descr = '$_REQUEST[descr]', categoria = $_REQUEST[categoria] WHERE id_recurso = $_REQUEST[id_recurso]";

	echo $sql_insert;
	mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el update".mysqli_error($con));

	mysqli_close($con);

	header("Location: admin.php");
?>