<?php
	include 'conexion.php';

	//creamos la sesion
	session_start();
	$user_id = $_SESSION['id_user'];

	$sql_insert = "INSERT INTO reserva (id_user, id_recurso, fecha_inicial, hora_inicial, fecha_final, hora_final) VALUES 
		                       ('$user_id','$_REQUEST[id_recurso]', '$_REQUEST[fechaInicio]', '$_REQUEST[horaInicio]', '$_REQUEST[fechaFinal]', '$_REQUEST[horaFinal]')";
	
	mysqli_query($con,$sql_insert) or die("Problemas en el insert".mysqli_error($con));

	mysqli_close($con);


	header("Location: user.php");
?>