<?php
require_once "Models/listadoProductos.class.php";
$listado1 = new ListadoProductos();
$serie = $_REQUEST['serie'];

$data = $listado1->listaxSerie($serie);
include "headerLogin.php";
?>

	<style type="text/css">
		.form-group{
			border: 1px solid black;
			padding: 10px 10px;
		}
		.oculto{
			display: none;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){

				$("#mostrar").on( "click", function() {
					$('#target').show(); //muestro mediante id
					$('.target').show(); //muestro mediante clase
				 });
				$("#ocultar").on( "click", function() {
					$('#target').hide(); //oculto mediante id
					$('.target').hide(); //muestro mediante clase
				});

		});
	</script>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<form action="" method="POST" role="form">
					<legend>Buscar por Serie del Producto</legend>

					<div class="form-group">
						<label for="">Numero de la Serie</label>
						<input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
						<button type="submit" class="btn btn-primary">Buscar</button>
					</div>

				</form>
				<table class="table table-hover" border="1">
					<thead>
						<tr>
							<th>Cod Producto</th>
							<th>Producto</th>
							<th>Num. Serie</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Descripcion</th>
							<th>Precio1</th>
							<th>Precio2</th>
							<th>Precio3</th>
							<th>Cantidad</th>
							<th>Color</th>
							<th>Incluye</th>
							<th>Estado</th>
							<th>Obs.</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($fila = $data->fetch_array(MYSQLI_ASSOC)) {
						 ?>
							<tr>

								<td><?php echo $fila['IDproducto']; ?></td>
								<td><?php echo $fila['producto']; ?></td>
								<td><?php echo $fila['numserie']; ?></td>
								<td><?php echo $fila['IDmarca']; ?></td>
								<td><?php echo $fila['modelo']; ?></td>
								<td><?php echo $fila['descripcion']; ?></td>
								<td><?php echo $fila['precioVenta1']; ?></td>
								<td><?php echo $fila['precioVenta2']; ?></td>
								<td><?php echo $fila['precioVenta3']; ?></td>
								<td><?php echo $fila['cantidad']; ?></td>
								<td><?php echo $fila['pro_color']; ?></td>
								<td><?php echo $fila['pro_incluye']; ?></td>
								<td><?php echo $fila['estadoActivo']; ?></td>
								<td><?php echo $fila['obs']; ?></td>
							</tr>



					</tbody>

				</table>

				<hr>
				<button type="button" class="btn btn-danger" id="mostrar">Mostrar +</button>
				<button type="button" class="btn btn-default" id="ocultar">Ocultar +</button>

				<table class="table table-hover" border="1" id="target" style="display:none;">
					<thead>
						<tr>
							<th>Proveedor:</th>
							<th>Num. Factura:</th>
							<th>Fecha Emision:</th>
							<th>Familia:</th>
							<th>Sub Familia:</th>
							<th>Unidad:</th>
							<th>Articulo:</th>
							<th>Margen 1</th>
							<th>Margen 2</th>
							<th>Margen 3</th>
							<th>Almacen:/th>
							<th>Fecha Reg:</th>
							<th>Personal:</th>
							<th>Num Parte</th>
						</tr>
					</thead>
					<tbody>

							<tr id="otros">
								<td><?php echo $fila['IDproveedor']; ?></td>
								<td><?php echo $fila['numFactura']; ?></td>
								<td><?php echo $fila['fecEmision']; ?></td>
								<td><?php echo $fila['IDFamilia']; ?></td>
								<td><?php echo $fila['IDSubFam']; ?></td>
								<td><?php echo $fila['tipoUnidad']; ?></td>
								<td><?php echo $fila['tipArticulo']; ?></td>
								<td><?php echo $fila['marGanancia1']; ?></td>
								<td><?php echo $fila['marGanancia2']; ?></td>
								<td><?php echo $fila['marGanancia3']; ?></td>
								<td><?php echo $fila['IDAlmacen']; ?></td>
								<td><?php echo $fila['pro_fecRegistro']; ?></td>
								<td><?php echo $fila['IDPersonal']; ?></td>
								<td><?php echo $fila['parte']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>