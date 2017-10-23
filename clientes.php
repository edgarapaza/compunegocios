
<script type="text/javascript" src="js/funcionalidad.js"></script>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div id="result"></div>

			<form action="" method="POST" class="form-horizontal" role="form" id="form-cliente">
					<div class="form-group">
						<legend>Nuevo Cliente</legend>
					</div>

					<div class="form-group">
						<label for="inputNombres" class="col-sm-2 control-label">Nombres:</label>
						<div class="col-xs-12 col-md-6">
							<input type="text" name="nombres" id="inputNombres" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputApellidos" class="col-sm-2 control-label">Apellidos:</label>
						<div class="col-xs-12 col-md-6">
							<input type="text" name="apellidos" id="inputApellidos" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputDni" class="col-sm-2 control-label">Dni:</label>
						<div class="col-xs-12 col-md-6">
							<input type="text" name="dni" id="inputDni" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputDireccion" class="col-sm-2 control-label">Direccion:</label>
						<div class="col-xs-12 col-md-6">
							<input type="text" name="direccion" id="inputDireccion" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputTelefono" class="col-sm-2 control-label">Telefono:</label>
						<div class="col-xs-12 col-md-6">
							<input type="text" name="telefono" id="inputTelefono" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputFecnacimiento" class="col-sm-2 control-label">Fecnacimiento:</label>
						<div class="col-xs-12 col-md-6">
							<input type="date" name="fecnacimiento" id="inputFechaNac" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
						<div class="col-xs-12 col-md-6">
							<input type="email" name="email" id="inputEmail" class="form-control" value="" required="required">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12 col-md-6 col-sm-offset-2">
							<button type="button" id="btnNuevocliente" class="btn btn-primary">Guardar</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>