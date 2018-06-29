<?php
require_once "header4.php";

require_once "../Models/movalmNombres.model.php";

$change = new ReemplazarNombres();


$data = $change->AllRegistros();

?>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});
</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3>Registro de Movimiento de almacenes</h3>
			<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				<p>Exportar a Excel  <img src="img/export_to_excel.gif" class="botonExcel" /></p>
				<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
			</form>

				<table class="table table-hover" width="50%" border="1" cellpadding="10" cellspacing="0" bordercolor="#666666" id="Exportar_a_Excel" style="border-collapse:collapse;">
					<thead>
						<tr class="thead-dark">
							<th>Producto</th>
							<th>Almacen Anterior</th>
							<th>Almacen Actual</th>
							<th>Fecha de Cambio</th>
							<th>Cantidad</th>
							<th>Num. Serie</th>
							<th>Realizado por:</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($fila = $data->fetch_array()) { ?>
						<tr>
							<td><?php
							$produc = $change->Producto($fila[0]);
							echo $produc[0];
							?></td>
							<td><?php
							$almacen1 = $change->Almacen($fila[1]);
							echo $almacen1[0];
							?></td>
							<td><?php
							$almacen2 = $change->Almacen($fila[2]);
							echo $almacen2[0];
							?></td>
							<td><?php echo $fila[3]; ?></td>
							<td><?php echo $fila[5]; ?></td>
						  <td><?php echo $fila[6]; ?></td>
							<td><?php
							$pe = $change->Persona($fila[4]);
							echo $pe[0];
							?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>


		</div>
	</div>
</div>



<?php include "footer4.html"; ?>
