<?php
require_once "Models/listadoProductos.class.php";
$listado1 = new ListadoProductos();
$data = $listado1->Productos();

?>

<div class='row'>
    <div class='col-sm-4 col-lg-12'>
    	<h2>Productos</h2>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <i class='fa fa-server'></i> Lista de todos los Productos
            </div>

            <div class='panel-body'>
                <div class='row'>
                    <div class='col-lg-12'>
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Cod Producto</th>
									<th>Producto</th>
									<th>Serie</th>
									<th>Familia</th>
									<th>Sub Familia</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Descripcion</th>
									<th>Precio Venta</th>
									<th>Cantidad</th>
									<th>Obs</th>
									<th>Imagen</th>
									<th>Almacen</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($fila = $data->fetch_array()) { ?>
								<tr>
									<td><?php echo $fila[0];?></td>
									<td><?php echo $fila[1];?></td>
									<td><?php echo $fila[2];?></td>
									<td><?php echo $fila[3];?></td>
									<td><?php echo $fila[4];?></td>
									<td><?php echo $fila[5];?></td>
									<td><?php echo $fila[6];?></td>
									<td><?php echo $fila[7];?></td>
									<td><?php echo $fila[8];?></td>
									<td><?php echo $fila[9];?></td>
									<td><?php echo $fila[10];?></td>
									<td><?php echo $fila[11];?></td>
									<td><?php echo $fila[12];?></td>
									<td><button type="button" class="btn btn-sm btn-success">Detalles</button></td>
								</tr>
								<?php
									}
									?>
							</tbody>
						</table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

