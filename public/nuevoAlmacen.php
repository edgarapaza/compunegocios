<?php
session_start();
$usuario = $_SESSION['administrador'];

?>


      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Registro</a>
          </li>
          <li class="breadcrumb-item active">Almacen</li>
        </ol>

        <h1>Nuevo almacen</h1>
		<form action="Controllers/nuevoAlmacen.controller.php" method="POST" class="form-horizontal" role="form">
			<div class="form-group">

			</div>
			<input type="text" name="idpersonal" id="idpersonal" value="<?php echo $usuario;?>">
			<div class="form-group">
				<label for="inputTienda" class="col-sm-2 control-label">Tienda:</label>
				<div class="col-sm-8">
					<input type="text" name="tienda" id="inputTienda" class="form-control" required="required">
				</div>
			</div>

			<div class="form-group">
				<label for="inputDireccion" class="col-sm-2 control-label">Direccion:</label>
				<div class="col-sm-8">
					<input type="text" name="direccion" id="inputDireccion" class="form-control" required="required">
				</div>
			</div>

			<div class="form-group">
				<label for="inputDescripcion" class="col-sm-2 control-label">Descripcion:</label>
				<div class="col-sm-8">
					<input type="text" name="descripcion" id="inputDescripcion" class="form-control" required="required">
				</div>
			</div>


			<div class="form-group">
				<label for="inputTelefono" class="col-sm-2 control-label">Telefono:</label>
				<div class="col-sm-8">
					<input type="text" name="telefono" id="inputTelefono" class="form-control" required="required">
				</div>
			</div>
			<button type="submit" class="btn btn-primary" id="btnalmacen">Guardar</button>

		</form>

      </div>
