<?php
	include 'conexion.php';


	//Coger la imágen insertada
	$foto = $_FILES['foto']['name']; 
	$ruta = $_FILES['foto']['tmp_name']; 
	$destino = 'img/'.$foto;
	copy($ruta, $destino);

	$sql_consulta = "SELECT * FROM usuario WHERE nom = '$_REQUEST[nombre]' LIMIT 1";

	$consulta = mysqli_query($con, utf8_decode($sql_consulta)) or die("Problemas en el select".mysqli_error($con));

	if (mysqli_num_rows($consulta) == 0){
		$sql_insert = "INSERT INTO usuario (nom, pass, rol, estado, img) 
					VALUES ('$_REQUEST[nombre]','$_REQUEST[pass]', $_REQUEST[rol], $_REQUEST[estado], '$foto')";

		mysqli_query($con, utf8_decode($sql_insert)) or die("Problemas en el insert".mysqli_error($con));

		header("Location: mostrarUsuarios.php");
	} else {
		header("Location: anadirUsuario.php?error=¡El nombre de usuario ya existe!");
	}

	

	mysqli_close($con);

	
?>