<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
             
    $user_id = $_SESSION['id_user'];
	  
	$consulta_usuarios = ("SELECT * FROM usuario");
	$resultado_usuarios = mysqli_query($con, $consulta_usuarios);

	echo "<h1 style='margin-left:22%'>Usuarios</h1>";
	echo "<button id='btnNuevo' class='btn btn-success' style='margin-left:40%;margin-top:-6%'><i class='fa fa-user-plus fa-lg'></i> Añadir Usuario</button>";

	while($usuario = mysqli_fetch_array($resultado_usuarios)){
		echo "<div class='contendor'>";
			echo "<div class='textseccion'>";
				echo "<b>Nombre de usuario: </b>";
				echo utf8_encode($usuario['nom']);
				echo "<br />";
				echo "<b>Contraseña del usuario: </b> ";
				echo utf8_encode($usuario['pass']);
				echo "<br />";
				echo "<b>Rol del usuario: </b> ";
					if ($usuario['rol']== 1) {
						echo "Administrador";
					} else {
						echo "Usuario";
					}
				echo "<br />";
				echo "<b>Estado del usuario: </b> ";
				echo utf8_encode($usuario['estado']);
				echo "<br />";
			echo "</div>";
			echo "<div class='botonera'>";
				echo '<div class="btn btn-success" id="btnModificar'.$usuario['id_user'].'">';
?>      	
    				<a>Modificar</a>
				</div>
<?php                 
				echo '<div class="btn btn-info" id="btnActivar'.$usuario['id_user'].'">';
?>      	
    				<a href="activarUsuario.php?id_user=<?php echo $usuario['id_user']; ?>">Activar</a>
				</div>
<?php
				echo '<div class="btn btn-danger" id="btnDesactivar'.$usuario['id_user'].'">';
?>      	
    				<a href="desactivarUsuario.php?id_user=<?php echo $usuario['id_user']; ?>">Desactivar</a>
				</div>
<?php
            echo "</div>";

			$fichero="img/$usuario[img]";
			if(file_exists($fichero)&&(($usuario['img']) != '')){
				echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
			}
			else{
				echo "<div class='contimg'><img src ='img/no_disponible.jpg' width='250' heigth='250'/></div>";
			}
			
			echo"</div><br />";
		echo"</div>";

		if ($usuario['estado'] == 0){
			echo 	"<script>
				        $(document).ready(function() {
							$(document.getElementById('btnActivar".$usuario['id_user']."')).attr('disabled', true);				
							$(document.getElementById('btnDesactivar".$usuario['id_user']."')).attr('disabled', false);
						});
				    </script>";
		}else {
			echo 	"<script>
				        $(document).ready(function() {
							$(document.getElementById('btnActivar".$usuario['id_user']."')).attr('disabled', false);
							$(document.getElementById('btnDesactivar".$usuario['id_user']."')).attr('disabled', true);
						});
				    </script>";
		}

		if ($usuario['rol'] == 2){
			echo 	"<script>
				        $(document).ready(function() {
							$(document.getElementById('btnActivar".$usuario['id_user']."')).attr('disabled', true);				
							$(document.getElementById('btnDesactivar".$usuario['id_user']."')).attr('disabled', true);
						});
				    </script>";
		}

?>

		<div id="modificarModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Modificar usuario</h4>
			      	</div>
			      	<div class="modal-body">
			        	<form id="modificar" class="form-horizontal" role="form" action=".php">
							<div class="form-group">
						        <label class="col-xs-2 control-label">Id_usuario</label>
						        <div class="col-xs-10">
						            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_user']; ?>" readonly />
						        </div>
						    </div>
						    <div class="form-group">
						        <label class="col-xs-2 control-label">Nombre</label>
						        <div class="col-xs-10">
						            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nom']; ?>" />
						        </div>
						    </div>
						    <div class="form-group">
						        <label class="col-xs-2 control-label">Contraseña</label>
						        <div class="col-xs-10">
						            <input type="password" class="form-control" id="passwd" name="passwd" value="<?php echo $usuario['pass']; ?>" />
						        </div>
						    </div>
						    <div class="form-group">
						        <label class="col-xs-2 control-label">Rol del usuario</label>
						        <div class="col-xs-10">
						            <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $usuario['rol']; ?>" />
						        </div>
						    </div>
						</form>
			      	</div>
			      	<div class="modal-footer">
			      		<button type="button" class="btn btn-success" id="btnModificar" data-dismiss="modal">Guardar cambios</button>
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
			    </div>
		  	</div>
		</div>

<?php
		echo "<script>
				$(document.getElementById('btnModificar".$usuario['id_user']."')).click(function(){
					$('#modificarModal').modal({
						show: true
					});
				});				
		    </script>";
	}

?>

	<div id="anadirModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Añadir usuario</h4>
		      	</div>
		      	<div class="modal-body">
		        	<form id="anadir" class="form-horizontal" role="form" action="crearUsuario.php">
					    <div class="form-group">
					        <label class="col-xs-2 control-label">Nombre:</label>
					        <div class="col-xs-10">
					            <input type="text" class="form-control" id="nombre2" name="nombre2" />
					        </div>
					    </div>
					    <div class="form-group">
					        <label class="col-xs-2 control-label">Contraseña:</label>
					        <div class="col-xs-10">
					            <input type="password" class="form-control" id="passwd2" name="passwd2" />
					        </div>
					    </div>
					    <div class="form-group">
					        <label class="col-xs-2 control-label">Rol</label>
					        <div class="col-xs-10">
					            <select class="btn btn-default" id="rol2" name="rol2">
					            	<option value="0">Usuario</option>
					            	<option value="1">Administrador</option>
					            	<option value="2">Root</option>
					            </select>
					        </div>
					    </div>
					    <div class="form-group">
					    	<label class="col-xs-2 control-label">Estado:</label>
					        <div class="col-xs-10">
					            <select class="btn btn-default" id="estado2" name="estado2">
					            	<option value="0">Activo</option>
					            	<option value="1">Inactivo</option>
					            </select>
					        </div>
					    </div>
					    <div class="form-group">
					    	<label class="col-xs-2 control-label">Seleccionar imágen:</label>
					        <div class="col-xs-10">
					            <input id="img" type="file" class="file" />
					        </div>
					    </div>

					    
					
					</form>
		      	</div>
		      	<div class="modal-footer">
		      		<button type="submit" class="btn btn-success" id="btnAnadir" data-dismiss="modal">Añadir Usuario</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		    </div>
	  	</div>
	</div>

	<script>
		$('#btnNuevo').click(function(){
			$('#anadirModal').modal({
				show: true
			});
		})
	</script>

<?php

	include 'footer.php';

	
?>