<?php
session_start();
$usuario = $_SESSION['administrador'];

?>
	<script type="text/javascript" src="js/funcionalidad.js"></script>
      <div class="container-fluid">
        <h1>Nuevo almacen</h1> <div id="respuesta" class="alert alert-info"></div>
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">

			</div>
			<input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo $usuario;?>">
			<div class="form-group">
				<label for="inputTienda" class="col-sm-2 control-label" required="required">Tienda:</label>
				<div class="col-sm-8">
					<input type="text" name="tienda" id="inputTienda" class="form-control" required="required" placeholder="Nombre Tienda">
				</div>
			</div>

			<div class="form-group">
				<label for="inputDireccion" class="col-sm-2 control-label">Direccion:</label>
				<div class="col-sm-8">
					<input type="text" name="direccion" id="inputDireccion" class="form-control" required="required" placeholder="Jr. Av. urb.">
				</div>
			</div>

			<div class="form-group">
				<label for="inputDescripcion" class="col-sm-2 control-label">Ubicación:</label>
				<div class="col-sm-8">
					<input type="text" name="descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Lugar, Ubicacion, Descripcion">
				</div>
			</div>


			<div class="form-group">
				<label for="inputTelefono" class="col-sm-2 control-label">Telefono:</label>
				<div class="col-sm-8">
					<input type="text" name="telefono" id="inputTelefono" class="form-control" required="required" placeholder="(051) - 9999999">
				</div>
			</div>
			<button type="button" class="btn btn-primary" id="btnalmacen">Guardar</button>

		</form>

      </div>
