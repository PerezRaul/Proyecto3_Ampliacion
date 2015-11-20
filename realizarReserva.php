<?php
	include 'conexion.php';
	include 'header.php';

	$sql_recursos = "SELECT * FROM recurso WHERE id_recurso = $_REQUEST[id_recurso]";
	$consulta = mysqli_query($con, utf8_encode($sql_recursos));

	if(mysqli_num_rows($consulta)>0){
		$resultado = mysqli_fetch_array($consulta);
?>
		<div class="contendor9">
			<div class="textseccion9">
				<h1 style="margin-left:20px;">Realizar Reserva</h1>
				<form id="realizarReserva" action="realizarReserva.proc.php" method="post" >
					<input type="hidden" name="id_recurso" value="<?php echo $resultado['id_recurso']; ?>" />
					<div class="form-group">
				        <label class="col-xs-3 control-label">Día inicio:</label>
				        <div class="col-xs-6">
				            <input class="form-control" type='date' name='fechaInicio'>
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Hora inicio:</label>
				        <div class="col-xs-6">
				            <input class="form-control" type='time' name='horaInicio'>
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Día final:</label>
				        <div class="col-xs-6">
				            <input class="form-control" type='date' name='fechaFinal'>
				        </div>
				    </div><br /><br /><br />
				    <div class="form-group">
				        <label class="col-xs-3 control-label">Hora final:</label>
				        <div class="col-xs-6">
				            <input class="form-control" type='time' name='horaFinal'>
				        </div>
				    </div><br /><br /><br />
				    <div class="botonera9">
						<button type="submit" class="btn btn-success"><i class="fa fa-check-square-o fa-lg"></i> Realizar Reserva</button>
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