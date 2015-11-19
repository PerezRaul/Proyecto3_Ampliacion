<?php
	include 'conexion.php';
	include 'header_admin.php';

	$sql_recursos = "SELECT * FROM recurso WHERE id_recurso = $_REQUEST[id_recurso]";
	$consulta = mysqli_query($con, utf8_encode($sql_recursos));

	if(mysqli_num_rows($consulta)>0){
		$resultado = mysqli_fetch_array($consulta);
?>
		<div class="contendor6">
			<div class="textseccion6">
				<h1 style="margin-left:20px;">Modificar Recurso</h1>
				<form id="modificarRecursoForm" action="modificarRecurso.proc.php" method="post" style="margin-left:-50px">
					<input type="hidden" name="id_recurso" value="<?php echo $resultado['id_recurso']; ?>" />
					<div class="form-group">
				        <label class="col-xs-3 control-label">Nombre:</label>
				        <div class="col-xs-6">
				            <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($resultado['nombre']); ?>" />
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Descripción:</label>
				        <div class="col-xs-6">
				            <textarea class="form-control" rows="7" name="descr" style="width:520px !important;"><?php echo utf8_encode($resultado['descr'])?></textarea>
				        </div>
				    </div><br /><br /><br /><br /><br /><br /><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Categoría:</label>
				        <div class="col-xs-6">
				            <select class="btn btn-default" name="categoria">
<?php
								$sql_categorias = "SELECT * FROM categoria";
								$consulta2 = mysqli_query($con, utf8_encode($sql_categorias));

								while ($categoria=mysqli_fetch_array($consulta2)){
										echo "<option value='$categoria[id]'";

										if($categoria['id'] == $resultado['categoria']){
											echo " selected";
										}

										echo ">$categoria[nombre]</option>";
									}
?>
				            </select>
				        </div>
				    </div><br /><br /><br />
				    <div class="botonera6">
						<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
		
<?php
	} else {
		echo "Recurso con id=$_REQUEST[id_recurso] no encontrado!";
	}
	//cerramos la conexión con la base de datos
	mysqli_close($con);

	include 'footer.php';
?>