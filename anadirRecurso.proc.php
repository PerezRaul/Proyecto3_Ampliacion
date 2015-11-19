<?php
	include 'conexion.php';


	//Coger la imágen insertada
	$foto = $_FILES['foto']['name']; 
	$ruta = $_FILES['foto']['tmp_name']; 
	$destino = 'img/'.$foto;
	copy($ruta, $destino);


	$sql_insert = "INSERT INTO recurso (nombre, descr, categoria, activo, img) 
				VALUES ('$_REQUEST[nombre]','$_REQUEST[descr]', $_REQUEST[categoria], $_REQUEST[activo], '$foto')";

	mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el insert".mysqli_error($con));

	header("Location: admin.php");

	mysqli_close($con);

	
?>