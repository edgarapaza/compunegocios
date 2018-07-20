<?php 
require_once "header4.php";

$codprove   = $_REQUEST['codprove'];
$codprod    = $_REQUEST['codprod'];
$idcompra   = $_REQUEST['idcompra'];
$codprodgen = $_REQUEST['codgen'];
$idregistro = $_REQUEST['idregistro'];
 ?>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$("#btnCalcular").click(function(){
				var precio = $("#precioventa").val();

				var margen1 = $("#inputMargenGanancia1").val();
				var margen2 = $("#inputMargenGanancia2").val();
				var margen3 = $("#inputMargenGanancia3").val();

				var cal1 = (margen1 / 100) + 1;
				var cal2 = (margen2 / 100) + 1;
				var cal3 = (margen3 / 100) + 1;

				var pv1 = precio * cal1;
				var pv2 = precio * cal2;
				var pv3 = precio * cal3;

				$("#inputPrecioVenta1").val(pv1.toFixed(2));
				$("#inputPrecioVenta2").val(pv2.toFixed(2));
				$("#inputPrecioVenta3").val(pv3.toFixed(2));
			});
	});
</script>


<div class="container">
	<div class="row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="form-group">
				<legend>Agregar / Actualizar productos</legend>
			</div>


			<form action="../Controllers/compras.controller.php" method="post">
				<table class="table table-hover">
					<tr>
						<th width="200">Codigo Proveedor:</th>
						<td width="500"><?php echo $codprove; ?>
							<input type="hidden" name="idproveedor" id="idproveedor" value="<?php echo $codprove; ?>">
							<input type="hidden" name="idcompra" id="idcompra" value="<?php echo $idcompra; ?>">
							<input type="hidden" name="idregistro" id="idregistro" value="<?php echo $idregistro; ?>">
						</td>
					</tr>
					<tr>
						<th>Codigo Producto:</th>
						<td><?php echo $codprod; ?>
							<input type="hidden" name="idproducto" id="idproducto" value="<?php echo $codprod; ?>">
							<input type="hidden" name="codigogenerado" id="codigogenerado" value="<?php echo $codprodgen; ?>">
						</td>
					</tr>
					<tr>
						<th>Cantidad:</th>
						<td>
						<input type="number" name="stocktotal" id="inputStocktotal" value="1" min="1" max="99" step="1" required="required">
						</td>
					</tr>
					<tr>
						<th>Precio Venta:</th>
						<td>
							<input type="text" name="precioventa" id="precioventa" required="required" placeholder="S/. 0.00">
						</td>
					</tr>
					<tr>
						<th>Margen Ganancia:</th>
						<td>
							<div class="col-sm-2">
								<input type="text" name="margenGanancia1" id="inputMargenGanancia1" class="form-control" value="8" required="required">
							</div>
							<div class="col-sm-2">
								<input type="text" name="margenGanancia2" id="inputMargenGanancia2" class="form-control" value="10" required="required">
							</div>
							<div class="col-sm-2">
								<input type="text" name="margenGanancia3" id="inputMargenGanancia3" class="form-control" value="12" required="required">
							</div> %
							<button type="button" id="btnCalcular" class="btn btn-sm btn-success">Calcular</button>
						</td>
					</tr>
					<tr>
						<th>Precio Venta:</th>
						<td>
							<div class="col-sm-3">
								<input type="text" name="precioVenta1" id="inputPrecioVenta1" placeholder="0.00">
							</div>
							<div class="col-sm-3">
								<input type="text" name="precioVenta2" id="inputPrecioVenta2" placeholder="0.00">
							</div>
							<div class="col-sm-3">
								<input type="text" name="precioVenta3" id="inputPrecioVenta3" placeholder="0.00">
							</div>
						</td>
					</tr>

					</tr>
					<tr>
						<th>Numero Factura:</th>
						<td><input type="text" name="numfactura" id="numfactura" placeholder="000"></td>
					</tr>
					<tr>
						<td><button type="reset" class="btn btn-danger">Cancelar</button></td>
						<td><button type="submit" class="btn btn-success">Guardar Compra</button></td>
					</tr>
				</table>
			</form>


		</div>
	</div>
</div>



<?php include "footer4.html"; ?>