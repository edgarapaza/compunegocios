<?php  require_once "header4.php";  ?>

<script type="text/javascript" src="js/comboalmacen2.js"></script>


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<form action="" method="POST" class="form-inline" role="form" name="search_datos">
				

				<table class="table table-hover table-bordered">
					<caption>Mover almacenes</caption>
					<thead>
						<tr>
							<th>Busqueda por almacen <button type="button" id="btnMostrarCombo">Mostrar almacenes</button></th>
							<th>Busqueda por Familia <button type="button" name="btnmostrar" id="btnmostrar">Mostrar Familias</button></th>	
							<th>Busqueda por Nombre y Serie</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="form-inline">
								<div id="combo1"></div>
								<button type="button" class="btn btn-success" id="btnConsulta">Por Almacen</button>
							</td>
							<td>
								<div class="form-inline">
										<div>
											<div id="fam-lista"></div>
										</div>
										<div>
											<button type="button" class="btn btn-danger" name="btnBusFamilia" id="btnBusFamilia">Buscar x Familia</button>
										</div>
								</div>
							</td>
							<td>
								<div>
										<input type="text" class="form-control" name="xnombre" id="xnombre" placeholder="Busca x Nombre"><br>
										<input type="text" class="form-control" name="xserie" id="xserie" placeholder="Buscar x Serie"><br>

										<button type="button" class="btn btn-success" name="btnBuscar" id="btnBuscar">Buscar</button>
										<button type="button" class="btn btn-primary" name="btnLimpiar" id="btnLimpiar">Limpiar</button>

								</div>
							</td>
						</tr>
					</tbody>
				</table>

			</form>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div id="tablaDatos"></div>
		</div>
	</div>

</div>

<?php include "footer4.html"; ?>