<?php
require_once "../public/Models/listadoAlmacen.model.php";
$listaAlmacen = new ListadoAlmacen();
$data = $listaAlmacen->Almacen();
?>

<div class='row'>
    <div class='col-sm-4 col-lg-12'>
    	<h2>Proveedor</h2>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <i class='fa fa-server'></i> Lista de Almacenes
            </div>

            <div>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
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
							<td></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
            </div>

        </div>
    </div>
</div>
