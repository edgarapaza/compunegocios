<?php
require_once "header4.php";

require_once "../Models/movalmNombres.model.php";

$change = new ReemplazarNombres();


$data = $change->AllRegistros();

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3>Registro de Movimiento de almacenes</h3>
			<table class="table table-hover">
				<thead>
					<tr class="thead-dark">
						<th>Producto</th>
						<th>Almacen Anterior</th>
						<th>Almacen Actual</th>
						<th>Fecha de Cambio</th>
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