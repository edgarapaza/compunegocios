<?php
session_start();
$usuario = $_SESSION['administrador'];
?>
<form action="Controllers/nuevoPersonal.php" method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<legend>Nuevo Personal</legend>
	</div>

	<div class="form-group">
		<label for="inputNombres" class="col-sm-2 control-label">Nombres:</label>
		<div class="col-sm-8">
			<input type="text" name="nombres" id="inputNombres" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputPaterno" class="col-sm-2 control-label">Paterno:</label>
		<div class="col-sm-8">
			<input type="text" name="paterno" id="inputPaterno" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputMaterno" class="col-sm-2 control-label">Materno:</label>
		<div class="col-sm-8">
			<input type="text" name="materno" id="inputMaterno" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputDni" class="col-sm-2 control-label">Dni:</label>
		<div class="col-sm-8">
			<input type="text" name="dni" id="inputDni" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputDireccion" class="col-sm-2 control-label">Direccion:</label>
		<div class="col-sm-8">
			<input type="text" name="direccion" id="inputDireccion" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputTelefono1" class="col-sm-2 control-label">Telefono1:</label>
		<div class="col-sm-8">
			<input type="text" name="telefono1" id="inputTelefono1" class="form-control" required="required">
		</div>
	</div>

	<div class="form-group">
		<label for="inputTelefono2" class="col-sm-2 control-label">Telefono2:</label>
		<div class="col-sm-8">
			<input type="text" name="telefono2" id="inputTelefono2" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="inputObs" class="col-sm-2 control-label">Obs:</label>
		<div class="col-sm-8">
			<input type="text" name="obs" id="inputObs" class="form-control">
		</div>
	</div>
	<input type="text" name="idpersonal" id="idpersonal" value="<?php echo $usuario;?>">

	<button type="submit" class="btn btn-lg btn-primary">Guardar</button>

</form>