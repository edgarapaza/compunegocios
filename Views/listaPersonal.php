<?php
include "header4.php";
require_once "../Models/listadoPersonal.model.php";
$listaPersonal = new ListadoPersonal();
$data = $listaPersonal->Personal();

?>
<div class="container">
	<div class='row'>
	    <div class='col-sm-12 col-md-11'>
	    	<h2>Personal</h2>
			<table class="table table-hover table-striped">
				<thead>
					<tr class="success">
						<th>Cod. Per.</th>
						<th>Nombre</th>
						<th>DNI</th>
						<th>Direccion</th>
						<th>Telefono1</th>
						<th>Telefono2</th>
						<th>Cargp</th>
						<th>Foto</th>
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
						<td><img src="<?php echo $fila[7]; ?>" alt="Foto">
							</td>
						<td>
							<button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	    </div>
	</div>
</div>

<?php include "footer4.html"; ?>