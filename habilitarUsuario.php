<?php
	include 'conexion.php';

	$sql_update="update usuario set estado = 0 where id_user = $_REQUEST[id_user]";

	mysqli_query($con,$sql_update)
	  or die("Problemas en el update".mysqli_error($con));

	mysqli_close($con);

	header("Location: mostrarUsuarios.php");
?>
 