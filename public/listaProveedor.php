<?php
require_once "../public/Models/listadoProveedor.model.php";
$listaProveedor = new ListadoProveedor();
$data = $listaProveedor->Proveedor();

?>

<div class='row'>
    <div class='col-sm-4 col-lg-12'>
    	<h2>Proveedor</h2>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <i class='fa fa-server'></i> Lista de Proveedores
            </div>

            <div>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
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
</div>
