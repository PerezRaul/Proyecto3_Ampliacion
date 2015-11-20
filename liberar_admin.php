<?php
	include 'conexion.php';


	$sql_update="update recurso set estado = 0 where id_recurso = $_REQUEST[id_recurso]";

	mysqli_query($con,$sql_update)
	  or die("Problemas en el update".mysqli_error($con));

	mysqli_close($con);


	header("Location: admin.php");
?>
 