<?php
require_once "Models/listadoProductos.class.php";
$listado1 = new ListadoProductos();
$data = $listado1->Productos();
?>

<div class="container">
	<div class='row'>
	    <div class="col-md-11">
	    	<h2>Productos</h2>
        	<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr class="success">
							<th>Cod.</th>
							<th>Producto</th>
							<th>Serie</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Precio Venta</th>
							<th>Cantidad</th>
							<th>Almacen</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($fila = $data->fetch_array()) { ?>
						<tr>
							<td><?php echo $fila['IDproducto'];?></td>
							<td><?php echo $fila['producto'];?></td>
							<td><?php echo $fila['numserie'];?></td>
							<td><?php echo $fila['marca'];?></td>
							<td><?php echo $fila['modelo'];?></td>
							<td>S/. <?php echo $fila['precioVenta1'];?></td>
							<td><?php echo $fila['cantidad'];?></td>
							<td><?php echo $fila['tienda'];?></td>
							<td>
								<button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
								<button class="btn btn-info"><span class="glyphicon glyphicon-floppy-open"></span></button>
							</td>
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

