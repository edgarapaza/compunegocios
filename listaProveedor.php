<?php
require_once "Models/listadoProveedor.model.php";
$listaProveedor = new ListadoProveedor();
$data = $listaProveedor->Proveedor();

?>
<div class="container">
	<div class='row'>
	    <div class='col-sm-12 col-md-11'>
	    	<h2>Proveedor</h2>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr class="success">
						<th>Cod. Per.</th>
						<th>Nombre</th>
						<th>DNI</th>
						<th>Direccion</th>
						<th>Telefono1</th>
						<th>Telefono2</th>
						<th>Obs</th>
						<th>Creacion</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($fila = $data->fetch_array()) { ?>
					<tr>
						<td><?php echo $fila[0]; ?></td>
						<td><?php echo $fila[1]; ?></td>
						<td><?php echo $fila[2]; ?></td>
						<td><?php echo $fila[3]; ?></td>
						<td><?php echo $fila[4]; ?></td>
						<td><?php echo $fila[5]; ?></td>
						<td><?php echo $fila[6]; ?></td>
						<td><?php echo $fila[7]; ?></td>
						<td><?php echo $fila[8]; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

	    </div>
	</div>
</div>