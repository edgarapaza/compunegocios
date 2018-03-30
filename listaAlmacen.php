<?php
require_once "Models/listadoAlmacen.model.php";
$listaAlmacen = new ListadoAlmacen();
$data = $listaAlmacen->Almacen();
?>
<div class="container">
	<div class='row'>
	    <div class='col-xs-12 col-sm-12 col-md-11'>
	    	<h2>Lista Almacen</h2>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr class="success">
						<th>Cod.</th>
						<th>Nombre Almacen</th>
						<th>Direccion</th>
						<th>Telefono</th>
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
						<td>
							<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	    </div>
	</div>
</div>