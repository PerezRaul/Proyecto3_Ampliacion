<?php
	include 'conexion.php';
	include 'header_admin.php';

	$sql_usuarios = "SELECT * FROM usuario WHERE id_user = $_REQUEST[id_user]";
	$consulta = mysqli_query($con, $sql_usuarios);

	if(mysqli_num_rows($consulta)>0){
		$resultado = mysqli_fetch_array($consulta);
?>
		<div class="contendor4">
			<div class="textseccion4">
				<h1>Modificar Usuario</h1>
				<form id="modificarUsuarioForm" action="modificarUsuario.proc.php" method="post">
					<input type="hidden" name="id" value="<?php echo $usuario['id_user']; ?>">
					<div class="form-group">
				        <label class="col-xs-4 control-label">Nombre:</label>
				        <div class="col-xs-8">
				            <input type="text" class="form-control" name="nom" maxlength="25" value="<?php echo $usuario['nom']; ?>">
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Contraseña:</label>
				        <div class="col-xs-8">
				            <input type="text" class="form-control" name="pass" maxlength="25" value="<?php echo $usuario['pass']; ?>">
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Rol:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="rol">
<?php
								$sql_usuarios2 = "SELECT * FROM tipo_usuario ORDER BY tipo";
								$consulta2 = mysqli_query($con, $sql_usuarios2);

								while ($tipo=mysqli_fetch_array($consulta2)){
										echo "<option value='$tipo[id_tipo_usuario]'";

										if($tipo['id_tipo_usuario'] == $usuario['rol']){
											echo " selected";
										}

										echo ">$tipo[tipo]</option>";
									}
?>
				            	<!--<option value="0">Usuario</option>
				            	<option value="1">Administrador</option>
				            	<option value="2">Root</option>-->
				            </select>
				        </div>
				    </div><br /><br /><br />
					<button type="submit" class="btn btn-success">Guardar cambios</button>
				</form>
			</div>
		</div>
		
<?php
	} else {
		echo "Usuario con id=$_REQUEST[id_user] no encontrado!";
	}
	//cerramos la conexión con la base de datos
	mysqli_close($con);

	include 'footer.php';
?>

