<?php
	include 'conexion.php';


	//Coger la imágen insertada
	$foto = $_FILES['foto']['name']; 
	$ruta = $_FILES['foto']['tmp_name']; 
	$destino = 'img/'.$foto;
	copy($ruta, $destino);

	$sql_insert = "INSERT INTO usuario(nom, pass, rol, estado, img) 
					VALUES ('$_REQUEST[nombre]','$_REQUEST[pass]', $_REQUEST[rol],$_REQUEST[estado], '$foto')";


	mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el select".mysqli_error($con));

	mysqli_close($con);

	//header("Location: mostrarUsuarios.php");
?>