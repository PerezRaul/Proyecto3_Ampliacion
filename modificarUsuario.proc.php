<?php
	include 'conexion.php';

	$sql_consulta = "SELECT * FROM usuario WHERE usuario.nom = '$_REQUEST[nombre]' LIMIT 1";
	echo $sql_consulta;
	$id_usuario = $_REQUEST['id'];
	$consulta = mysqli_query($con, utf8_decode($sql_consulta)) or die("Problemas en el select".mysqli_error($con));


	if (mysqli_num_rows($consulta) == 0){

		$sql_insert = "UPDATE usuario SET nom = '$_REQUEST[nombre]', pass = '$_REQUEST[pass]', rol = $_REQUEST[rol] WHERE id_user = '$id_usuario'";

		mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el update".mysqli_error($con));

		header("Location: mostrarUsuarios.php");

	} else {
		header("Location: modificarUsuario.php?id_user=$id_usuario&error=¡El nombre de usuario ya existe!");
	}

	mysqli_close($con);

	
?>