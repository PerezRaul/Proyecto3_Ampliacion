<?php
	include 'conexion.php';

	$sql_insert = "UPDATE usuario SET nom = '$_REQUEST[nombre]', pass = '$_REQUEST[pass]', rol = $_REQUEST[rol] WHERE id_user = $_REQUEST[id]";

	mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el update".mysqli_error($con));

	header("Location: mostrarUsuarios.php");

	mysqli_close($con);

	
?>