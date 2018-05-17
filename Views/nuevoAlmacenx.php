<?php 
include "header4.php";

$idproducto        = $_REQUEST['idproducto'];
$idalmacenanterior = $_REQUEST['idalmacen'];
$nom_almacen       = $_REQUEST['almacen'];


?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen.js"></script>

<div class="container">
	<div class="row">
		<button type="button" id="btnMostrarCombo"></button>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<h3>Cambiar a Nuevo almacen</h3>

			<form action="../Controllers/nuevoalmacen.controller.php" method="POST" class="form-inline" role="form">
				<input type="text" name="idalmacenanterior" value="<?php echo $idalmacenanterior; ?>">
				<input type="text" name="idproducto" value="<?php echo $idproducto; ?>">
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
							<td><button type="submit" class="btn btn-success" id="btnMoverProducto">Mover a Nuevo Almacen</button></td>
						</tr>
					</tbody>
				</table>
			</form>
						
		</div>
	</div>

<?php include "footer4.html"; ?>