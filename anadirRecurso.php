<?php
	
	include 'conexion.php';
	include 'header_admin.php';

?>
		<div class="contendor7">
			<div class="textseccion7">
				<h1 style="margin-left:20px">Añadir Recurso</h1>
				<form id="anadirRecursoForm" action="anadirRecurso.proc.php" method="post" enctype="multipart/form-data" style="margin-left:-40px;">
					<div class="form-group">
				        <label class="col-xs-3 control-label">Nombre:</label>
				        <div class="col-xs-6">
				            <input type="text" class="form-control" name="nombre" />
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-4 control-label">Descripción:</label>
				        <div class="col-xs-6">
				            <textarea class="form-control" rows="7" name="descr" style="width:520px !important;"></textarea>
				        </div>
				    </div><br /><br /><br /><br /><br /><br /><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Categoria:</label>
				        <div class="col-xs-8">
				            <select class="btn btn-default" name="categoria">
				            	<option value="1">Aula</option>
				            	<option value="2">Sala</option>
				            	<option value="3">Hardware y recursos</option>
				            	<option value="4">Otros</option>
				            </select>
				        </div>
				    </div><br /><br />
				   <div class="form-group">
				        <label class="col-xs-3 control-label">Activo:</label>
				        <div class="col-xs-6">
				            <select class="btn btn-default" name="activo">
				            	<option value="0">Sí</option>
				            	<option value="1">No</option>
				            </select>
				        </div>
				    </div><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Foto:</label>
				        <div class="col-xs-6">
				            <input type="file" name="foto" id="foto" value="foto" />
				        </div>
				    </div><br /><br />
				    <div class="botonera7">
						<button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Crear Recurso</button>
					</div>
				</form>
			</div>
		</div>
		
<?php

	//cerramos la conexión con la base de datos
	mysqli_close($con);

	include 'footer.php';
?>