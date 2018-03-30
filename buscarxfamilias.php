
	<script type="text/javascript" src="js/buscador.js"></script>


<button id="cargarLista">Cargar Lista</button>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<form action="../Models/search" method="POST">
					<legend>Buscar por Familias</legend>

					<div class="form-group">
						<div class="form-group">
							<label for="inputFamilias" class="col-sm-2 control-label">Familias:</label>
							<div class="col-sm-2">
								<select name="familias" id="inputFamilias" class="form-control" required="required">
									<option value="0">Seleccione Familia</option>

								</select>
							</div>
						</div>
					</div>

				</form>

				<select id="listado1"></select>
				<div id="result"></div>

			</div>
		</div>
	</div>