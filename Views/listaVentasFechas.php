<?php 
include "../Models/ventas_listado.model.php";
include "header.php"; 

$fecha = $_REQUEST['fecha'];
//echo "La fecha escogida es: " . $fecha;

$listvent = new ListadoVentas();
$datos = $listvent->ListaVentasxFecha($fecha);

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


			<form action="" method="POST" class="form-inline" role="form">
					
				<caption>Busque fecha para Reporte: </caption>
				<div class="form-group">
						
					
					<input type="date" name="fecha" id="inputFecha" class="form-control" required="required">
				
					<button type="submit" class="btn btn-primary">Consultar</button>
						
				</div>
			</form>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Mont. Total</th>
						<th>Trabajador</th>
						<th>Fecha Venta</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					while ($fila = $datos->fetch_array()) {
					
					 ?>
					<tr>
						<td><?php echo $fila[0]; ?></td>
						<td><?php echo $fila[1]; ?></td>
						<td><?php printf("S/. %.2f", $fila[2]); ?></td>
						<td><?php echo $fila[3]; ?></td>
						<td><?php printf("S/. %.2f", $fila[4]); ?></td>
						<td><?php echo $fila[5]; ?></td>
						<td><?php echo $fila[6]; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>