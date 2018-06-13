<?php 
require_once "header4.php";

$idproducto        = $_REQUEST['idproducto'];
$idalmacenanterior = $_REQUEST['idalmacen'];
$nom_almacen       = $_REQUEST['almacen'];


?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen2.js"></script>

<div class="container">
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<h3>Cambiar a Nuevo almacen</h3>

			


			<form action="../Controllers/nuevoalmacen.controller.php" method="POST" class="form-inline" role="form">
				<input type="hidden" name="idalmacenanterior" value="<?php echo $idalmacenanterior; ?>">
				<input type="hidden" name="idproducto" value="<?php echo $idproducto; ?>">
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Almacen Actual</th>
							<th>Mover a <button type="button" id="btnMostrarCombo" class="btn-warning">Mostrar Lista de Almacenes</button></th>
							<th>Confirmar</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $nom_almacen; ?></td>
							<td><div id="combo1"></div></td>
							<td><button type="submit" class="btn btn-success" id="btnMoverProducto" onclick="Verificar();">Mover a Nuevo Almacen</button></td>
						</tr>
					</tbody>
				</table>
			</form>
						
		</div>
	</div>

	<script type="text/javascript">
		function Verificar(){
			
			var combo = document.getElementById('inputAlmacen');
			alert(combo.val());
		}
	</script>

<?php include "footer4.html"; ?>