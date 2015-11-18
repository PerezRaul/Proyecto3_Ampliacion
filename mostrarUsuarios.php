<?php
	include 'conexion.php';
	include 'header_admin.php';
             
    $user_id = $_SESSION['id_user'];
	  
	$consulta_usuarios = ("SELECT * FROM usuario");
	$resultado_usuarios = mysqli_query($con, $consulta_usuarios);

	echo "<h1 style='margin-left:22%'>Usuarios</h1>";
	echo "<a href='anadirUsuario.php' class='btn btn-success' style='margin-left:40%;margin-top:-6%'><i class='fa fa-user-plus fa-lg'></i> Añadir Usuario</a>";

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
					if ($usuario['rol'] == 1) {
						echo "Usuario";
					} else if ($usuario['rol'] == 2){
						echo "Administrador";
					} else {
						echo "Root";
					}
				echo "<br />";
				echo "<b>Estado del usuario: </b> ";
					if ($usuario['estado'] == 0){
						echo "Activo";
					} else {
						echo "Inactivo";
					}
				echo "<br />";
			echo "</div>";
			echo "<div class='botonera' style='margin-top:160px'>";
				echo '<div class="btn btn-success" id="btnModificar'.$usuario['id_user'].'">';
?>      	
    				<a href="modificarUsuario.php?id_user=<?php echo $usuario['id_user']; ?>"><i class="fa fa-pencil-square-o fa-lg"></i> Modificar</a>
				</div>
<?php                 
				echo '<div class="btn btn-info" id="btnActivar'.$usuario['id_user'].'">';
?>      	
    				<a href="habilitarUsuario.php?id_user=<?php echo $usuario['id_user']; ?>"><i class="fa fa-eye fa-lg"></i> Habilitar</a>
				</div>
<?php
				echo '<div class="btn btn-danger" id="btnDesactivar'.$usuario['id_user'].'">';
?>      	
    				<a href="deshabilitarUsuario.php?id_user=<?php echo $usuario['id_user']; ?>"><i class="fa fa-eye-slash fa-lg"></i> Deshabilitar</a>
				</div>
<?php
            echo "</div>";

			$fichero="img/$usuario[img]";
			if(file_exists($fichero)&&(($usuario['img']) != '')){
				echo "<div class='contimg' style='margin-top:0px'><img src='$fichero' width='200' heigth='200' ></div>";
			}
			else{
				echo "<div class='contimg' style='margin-top:0px'><img src ='img/no_disponible.jpg' width='200' heigth='200'/></div>";
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

		if ($_SESSION['rol'] != 3){
			if ($usuario['rol'] == 3){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnActivar".$usuario['id_user']."')).attr('disabled', true);				
								$(document.getElementById('btnDesactivar".$usuario['id_user']."')).attr('disabled', true);
								$(document.getElementById('btnModificar".$usuario['id_user']."')).attr('disabled', true);
							});
					    </script>";
			}
		}
		

	}


	include 'footer.php';

	
?>