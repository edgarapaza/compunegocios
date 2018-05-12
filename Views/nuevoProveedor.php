<?php include "header4.html"; ?>

<div class="container">
	<div class="row">
		<div class="col-xs-10 col-sm-12 col-md-10 col-lg-10">

			<form action="../Controllers/nuevoProveedor.controller.php" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>Nuevo Proveedor</legend>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Nomb. Proveedor:</label>
						</div>
						<div class="col-sm-6">

							<input type="text" name="nombreProveedor" id="inputNombre" class="form-control" required="required" placeholder="Nombre del Proveedor">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Razon Social:</label>
						</div>

						<div class="col-sm-6">

							<input type="text" name="razonSocial" id="inputRazonSocial" class="form-control" value="" required="required" placeholder="Razon Social">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>RUC (11 Digitos):</label>
						</div>

						<div class="col-sm-6">

							<input type="number" name="numRuc" id="inputNumRuc" class="form-control" required="required" placeholder="Numero de RUC">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Direccion:</label>
						</div>

						<div class="col-sm-6">

							<input type="text" name="direccion" id="inputDireccion" class="form-control" placeholder="Direccion">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Celular:</label>
						</div>

						<div class="col-sm-6">

							<input type="tel" name="celular" id="inputCelular" class="form-control" value="" placeholder="Num. Celular">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Telefono Fijo:</label>
						</div>

						<div class="col-sm-6">

							<input type="tel" name="telfijo" id="inputTelfijo" class="form-control" value="" placeholder="Telf. Fijo">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Email:</label>
						</div>

						<div class="col-sm-6">

							<input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-Mail">

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2">
							<label>Pagina Web:</label>
						</div>

						<div class="col-sm-6">

							<input type="text" name="website" id="inputWebsite" class="form-control" value="" placeholder="WebSite">

						</div>
					</div>

					<button type="submit" id="btnnewproveedor" class="btn btn-primary">Guardar</button>
					<a href="#">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "footer4.html"; ?>
