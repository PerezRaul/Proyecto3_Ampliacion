<?php
	
	include 'conexion.php';
	include 'header_admin.php';

	if (isset($_REQUEST['error'])){
		$msg = $_REQUEST['error'];
	}

?>
		<div class="contendor4">
			<div class="textseccion4">
				<h1 style="margin-left:20px">Añadir Usuario</h1>
				<form id="anadirUsuarioForm" action="anadirUsuario.proc.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
				        <label class="col-xs-4 control-label">Nombre:</label>
				        <div class="col-xs-8">
				            <input type="text" class="form-control" name="nombre" maxlength="30" />
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Contraseña:</label>
				        <div class="col-xs-8">
				            <input type="password" class="form-control" name="pass" maxlength="30" />
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Rol:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="rol">
				            	<option value="">Escoger rol</option>
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
				            	<option value="">Escoger estado</option>
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
				    </div><br /><br />
				    <div id="error" style="color:red;margin-left:185px;">
				    	<?php 
				    		if(!empty($msg)){
				    			echo $msg;
				    		}
				    	?>
				    </div><br /><br /><br />
				    

				    <div class="botonera4">
						<button type="submit" class="btn btn-success"><i class="fa fa-user-plus fa-lg"></i> Crear Usuario</button>
					</div>
				</form>
			</div>
		</div>

		<script>
			$(function () {
				/* VALIDACION DE LOS CAMPOS DEL FORMULARIO, SI ESTAN RELLENOS O NO */
				$('#anadirUsuarioForm')	.bootstrapValidator({
			        framework: 'bootstrap',
			        icon: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        err: {
			            container: 'tooltip'
			        },
			        fields: {
			            nombre: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Introduce el nombre del usuario"
			                    }
			                }
			            },
			            pass: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Introduce una contraseña"
			                    }
			                }
			            },
			            rol: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Selecciona un rol"
			                    }
			                }
			            },
			            estado: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Selecciona un estado"
			                    }
			                }
			            },
			        },	 
			    });
			});
		</script>
		
<?php

	//cerramos la conexión con la base de datos
	mysqli_close($con);

	include 'footer.php';
?>

