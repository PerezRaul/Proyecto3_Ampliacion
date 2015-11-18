<?php
	
	include 'conexion.php';
	include 'header_admin.php';

?>
		<div class="contendor4">
			<div class="textseccion4">
				<h1 style="margin-left:20px">Añadir Usuario</h1>
				<form id="anadirUsuarioForm" action="anadirUsuario.proc.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
				        <label class="col-xs-4 control-label">Nombre:</label>
				        <div class="col-xs-8">
				            <input type="text" class="form-control" name="nombre" maxlength="25" />
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Contraseña:</label>
				        <div class="col-xs-8">
				            <input type="password" class="form-control" name="pass" maxlength="25" />
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Rol:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="rol">
				            	<option value="1">Usuario</option>
				            	<option value="2">Administrador</option>
<?php
								if($_SESSION['rol'] == 3){
									echo "<option value='3'>Root</option>";
								} else {

								}
?>
				            </select>
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Estado:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="estado">
				            	<option value="0">Activo</option>
				            	<option value="1">Inactivo</option>
				            </select>
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Foto:</label>
				        <div class="col-xs-8">
				            <input type="file" name="foto" id="foto" value="foto" />
				        </div>
				    </div><br /><br /><br />

				    <div class="botonera4">
						<button type="submit" class="btn btn-success">Crear usuario</button>
					</div>
				</form>
			</div>
		</div>
		
<?php

	//cerramos la conexión con la base de datos
	mysqli_close($con);

	include 'footer.php';
?>

