<?php include "header.php";
require "../Models/productosregistrados.model.php";

$prod = new Productos();
$dat = $prod->ProductoRegistrados();
$codprove = $_REQUEST['codprove'];
echo "Codigo Recibido hoy". $codprove;
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form>
				<input type="text" name="codprovedor" value="<?php echo $$codprove; ?>">
			</form>
			<table class="table table-hover">
				<thead>
					/*codigo, descripcion(producto), almacen, cantidad, costo, dsct, IGV, total*/
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Almacen</th>
						<th>Cantidad</th>
						<th>Costo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					while ($row = $dat->fetch_array()) {
					?>
					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td align="right"><?php printf("S/. %.2f", $row[4]); ?></td>
						
						<td>
							<a href="stock1.php?codpro=<?php echo $row[0]; ?>&codigo=<?php echo $codprovedor; ?>" class="btn btn-sm btn-info">Agregar</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
