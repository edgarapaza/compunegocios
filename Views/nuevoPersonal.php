<?php
session_start();
if(isset($_SESSION['administrador']))
{
	$idpersonal = $_SESSION['administrador'];
	include "header4.php";
?>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<form action="../Controllers/nuevoPersonal.controller.php" method="POST" class="form-horizontal" role="form">
					<input type="text" name="idpersonal" id="idpersonal" value="<?php echo $idpersonal;?>">
					<div class="form-group">
						<legend>Nuevo Personal</legend>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" name="nombres" id="inputNombres" class="form-control" required="required" placeholder="Nombre">
						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-6">
							<input type="text" name="paterno" id="inputPaterno" class="form-control" required="required" placeholder="Apellido paterno">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="materno" id="inputMaterno" class="form-control" required="required" placeholder="Apellido materno">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="dni" id="inputDni" class="form-control" required="required" placeholder="Numero DNI">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="direccion" id="inputDireccion" class="form-control" required="required" placeholder="Direccion">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="telefono1" id="inputTelefono1" class="form-control" required="required" placeholder="Telefono 1">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="telefono2" id="inputTelefono2" class="form-control" placeholder="Telefono 2">
						</div>
					</div>
					<hr>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="text" name="inputUsuario" id="inputUsuario" class="form-control" required="required" placeholder="Nombre de usuario">
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-sm-6">
							<input type="password" name="inputPassword" id="inputPassword" class="form-control" required="required" placeholder="Contraseña">
						</div>
					</div>

					<div class="form-group">
						<label for="inputNivel" class="col-sm-2 control-label">Nivel:</label>
						<div class="col-sm-6">
							<select name="nivel" id="inputNivel" class="form-control">
								<option value="">-- Seleccione Uno --</option>
								<option value="1">Administrador</option>
								<option value="2">Trabajador</option>
								<option value="3">Solo Visualizar</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEstado" class="col-sm-2 control-label">Estado:</label>
						<div class="col-sm-6">
							<select name="estado" id="inputEstado" class="form-control">
								<option value="1">Activo</option>
								<option value="2" disabled="disabled">Temporal</option>
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-lg btn-primary">Guardar</button>

				</form>

			</div>
		</div>
	</div>

	

<?php 
	include "footer4.html";
}
else{
  echo "Error: 404.  Consulte al administrador del sistema";
  header("Location: ../index.html");
} 
 ?>