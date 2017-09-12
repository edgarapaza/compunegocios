
	<style type="text/css">
		.form-group{
			border: 1px solid black;
			padding: 10px 10px;
		}
		.oculto{
			display: none;
		}
	</style>

	<script type="text/javascript">
		$(function(){

				$("#mostrar").on( "click", function() {
					$('.target').show(); //muestro mediante clase
				 });
				$("#ocultar").on( "click", function() {
					$('.target').hide(); //muestro mediante clase
				});

		});
	</script>

	<script type="text/javascript" src="js/buscador.js"></script>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<form action="" method="POST">
					<legend>Buscar por Serie del Producto</legend>

					<div class="form-group">
						<label for="">Numero de la Serie</label>
						<input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
					</div>

				</form>


				<div id="result"></div>

				<button type="button" class="btn btn-danger" id="mostrar">Mostrar +</button>
				<button type="button" class="btn btn-default" id="ocultar">Ocultar +</button>

			</div>
		</div>
	</div>