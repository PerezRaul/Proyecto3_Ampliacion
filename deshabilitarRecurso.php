<?php
	include 'conexion.php';

	$sql_update= "UPDATE recurso SET activo = 1 where id_recurso = $_REQUEST[id_recurso]";

	echo $sql_update;

	mysqli_query($con,$sql_update) or die("Problemas en el update".mysqli_error($con));

	mysqli_close($con);

	header("Location: admin.php");
?>