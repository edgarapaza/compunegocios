
	<style type="text/css">
		.form-group{
			border: 1px solid black;
			padding: 10px 10px;
		}
		.oculto{
			display: none;
		}
	</style>
	<script type="text/javascript" src="vendor/jquery/jquery.js"></script>
	<script type="text/javascript" src="js/buscador.js"></script>

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<form action="" method="POST">
					<legend>Buscar por Serie del Producto</legend>

					<div class="form-group">
						<label for="">Numero de la Serie</label>
						<input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
					</div>

				</form>


				<div id="result" class="alert alert-info"></div>

			</div>
		</div>
	</div>