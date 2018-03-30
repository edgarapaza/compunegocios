<?php include_once "header.php"; ?>

<div class="container-fluid">
	<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">

				<form action="Controllers/login.controller.php" method="POST" class="form-horizontal" role="form">

				<legend>Ingreso al sistema</legend>

					<div class="form-group">
						<label for="inputUsuario" class="col-sm-2 control-label">Usuario:</label>
						<div class="col-sm-10">
							<input type="text" name="user" id="inputUsuario" class="form-control" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputClave" class="col-sm-2 control-label">Clave:</label>
						<div class="col-sm-10">
							<input type="password" name="clave" id="inputClave" class="form-control" required="required">
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2 ">
							<button type="submit" class="btn btn-primary" id="btnIngreso">Ingresar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</div>
<br><br><br><br><br><br><br><br>

<?php include_once "footer.php"; ?>