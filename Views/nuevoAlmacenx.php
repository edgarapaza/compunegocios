<?php 
include "header4.html";
$idproducto = $_REQUEST['idproducto'];
$idalmacenanterior = $_REQUEST['idalmacen'];
$nom_almacen = $_REQUEST['almacen'];

?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen.js"></script>

<div class="container">
	<div class="row">
		<button type="button" id="btnMostrarCombo"></button>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<h3>Cambiar a Nuevo almacen</h3>

			<form action="" method="POST" class="form-inline" role="form">
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Almacen Actual</th>
							<th>Mover a</th>
							<th>Confirmar</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $nom_almacen; ?></td>
							<td><div id="combo1"></div></td>
							<td><button type="button" class="btn btn-success" id="btnMoverProducto">Mover a Nuevo Almacen</button></td>
						</tr>
					</tbody>
				</table>
			</form>
						
		</div>
	</div>

<?php include "footer4.html"; ?>