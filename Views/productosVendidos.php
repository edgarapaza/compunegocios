<?php require_once "header4.php"; ?>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/productosVendidos.js"></script>

<div class="container">
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<h3>Listado de Productos Vendidos</h3>

			<form action="" method="POST" class="form-inline" role="form" id="miformulario">
			
				<div class="form-group">
					
					<input type="text" class="form-control" id="numserie" name="numserie" placeholder="Numero de Serie">
					<button type="button" class="btn btn-primary" id="btnBuscarSerie"> <span class="glyphicon glyphicon-search"></span> Buscar por Serie</button>
				</div>
			
				<div class="form-group">
					<span> -- | -- </span>
					<input type="date" class="form-control" id="fecha" name="fecha">
					<button type="button" class="btn btn-success" id="btnBuscarFecha"> <span class="glyphicon glyphicon-search"></span> Buscar Fecha</button>
				</div>

				<div class="form-group">
					<span> << | >> </span>
					<select name="mes">
						<option>-- Seleciona uno --</option>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
						<option value="3">Marzo</option>
						<option value="4">Abril</option>
						<option value="5">Mayo</option>
						<option value="6">Junio</option>
						<option value="7">Julio</option>
						<option value="8">Agosto</option>
						<option value="9">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
						
					</select>
					
					<input type="text" name="anio" value="2018" min="1" max="4" size="4">
					<button type="button" class="btn btn-warning" id="btnBuscarMes"> <span class="glyphicon glyphicon-search"></span> Buscar x Mes</button>
				</div>
			</form>
			
		</div>

	</div>

			<div id='result'></div>
</div>

<?php require_once "footer4.html"; ?>

