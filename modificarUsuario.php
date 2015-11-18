<?php
	include 'conexion.php';
	include 'header_admin.php';

	$sql_usuarios = "SELECT * FROM usuario WHERE id_user = $_REQUEST[id_user]";
	$consulta = mysqli_query($con, $sql_usuarios);

	if(mysqli_num_rows($consulta)>0){
		$resultado = mysqli_fetch_array($consulta);
?>
		<div class="contendor5">
			<div class="textseccion5">
				<h1 style="margin-left:20px;">Modificar Usuario</h1>
				<form id="modificarUsuarioForm" action="modificarUsuario.proc.php" method="post">
					<input type="hidden" name="id" value="<?php echo $resultado['id_user']; ?>">
					<div class="form-group">
				        <label class="col-xs-4 control-label">Nombre:</label>
				        <div class="col-xs-8">
				            <input type="text" class="form-control" name="nombre" maxlength="25" value="<?php echo $resultado['nom']; ?>">
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Contraseña:</label>
				        <div class="col-xs-8">
				            <input type="password" class="form-control" name="pass" maxlength="25" value="<?php echo $resultado['pass']; ?>">
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Rol:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="rol">
<?php
								$sql_usuarios2 = "SELECT * FROM tipo_usuario";
								if ($_SESSION['rol'] != 3){
									$sql_usuarios2.= " WHERE id_tipo_usuario != 3";
								}
								$consulta2 = mysqli_query($con, $sql_usuarios2);

								while ($tipo=mysqli_fetch_array($consulta2)){
										echo "<option value='$tipo[id_tipo_usuario]'";

										if($tipo['id_tipo_usuario'] == $resultado['rol']){
											echo " selected";
										}

										echo ">$tipo[tipo]</option>";
									}
?>
				            </select>
				        </div>
				    </div><br /><br /><br />
				    <div class="botonera5">
						<button type="submit" class="btn btn-success">Guardar cambios</button>
					</div>
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

