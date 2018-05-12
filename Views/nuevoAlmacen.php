<?php
include "header4.html";
session_start();
$usuario = $_SESSION['administrador'];
?>
<div class="container">
	<div class="row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h1>Nuevo Almacen</h1>
			<div id="respuesta"></div>
			<form action="../Controllers/nuevoAlmacen.controller.php" method="POST" class="form-horizontal" role="form">

				<input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo $usuario;?>">

				<div class="form-group">
					<div class="col-sm-1">
					<label for="inputTienda">Almacen:</label>
					</div>
					<div class="col-sm-8">
					<input type="text" name="almacen" id="inputTienda" class="form-control" required="required" placeholder="Nombre Tienda">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-1">
					<label for="">Direccion:</label>
					</div>
					<div class="col-sm-8">
					<input type="text" name="direccion" id="inputDireccion" class="form-control" required="required" placeholder="Jr. Av. urb.">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-1">
					<label for="">Ubicacion:</label>
					</div>

					<div class="col-sm-8">
					<input type="text" name="descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Lugar, Ubicacion, Descripcion">
					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-1">
					<label for="">Telefono:</label>
					</div>

					<div class="col-sm-8">
					<input type="text" name="telefono" id="inputTelefono" class="form-control" required="required" placeholder="(051) - 9999999">
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="btnalmacen">Guardar</button>
			</form>
		</div>
	</div>

</div>

<?php include "footer4.html"; ?>
