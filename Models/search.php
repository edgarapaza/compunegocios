<?php
require_once "Conexion.php";
require_once "listadoProductos.class.php";

if(!isset($_POST['serie'])) exit('No se recibio el valor a buscar');

function search()
{
	$conexion = new Conexion();
	$listado1 = new ListadoProductos();

	$link = $conexion->Conectarse();

	$serie = $_POST['serie'];

	$sql = "SELECT * FROM productos WHERE numserie = '". $serie ."' LIMIT 1";
	$res = $link->query($sql);
	$row = $res->fetch_array();

	$mar = $listado1->ConvierteMarca($row['IDmarca']);

	$alm = $listado1->ConvierteAlmace($row[IDAlmacen]);


	echo "
	<style type='text/css'>
	table{
		font-size: 1.5em;
		}
	</style>
	<div class='container'>
    	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
				<h3>Buscador</h3>
      		</div>
      	</div>

    	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
      			<table class='table table-striped'>
      				<thead>
      					<th>Item</th>
      					<th>Datos</th>
      				</thead>
      				<tbody>
      					<tr>
      						<td>Codigo:</td>
							<td>$row[IDproducto]</td>
      					</tr>
      					<tr>
							<td>Producto:</td>
							<td>$row[producto]</td>
      					</tr>
      					<tr>
							<td>Num. Serie:</td>
							<td>$row[numserie]</td>
      					</tr>
      					<tr>
      						<td>Marca:</td>
							<td>$mar[0]</td>
      					</tr>
      					<tr>
							<td>Modelo:</td>
							<td>$row[modelo]</td>
      					</tr>
      					<tr>
							<td>Descripcion:</td>
							<td>$row[descripcion]</td>
      					</tr>
      					<tr>
							<td>Observaciones:</td>
							<td>$row[obs]</td>
      					</tr>
      					<tr>
							<td>Precio1:</td>
							<td>$row[precioVenta1]</td>
      					</tr>
      					<tr>
							<td>Precio2:</td>
							<td>$row[precioVenta2]</td>
      					</tr>
      					<tr>
							<td>Precio3:</td>
							<td>$row[precioVenta3]</td>
      					</tr>
      					<tr>
							<td>Cantidad:</td>
							<td>$row[cantidad]</td>
      					</tr>
      					<tr>
      						<td>Color:</td>
							<td>$row[pro_color]</td>
      					</tr>
      					<tr>
      						<td>Incluye:</td>
							<td>$row[pro_incluye]</td>
      					</tr>
      					<tr>
      						<td>Estado:</td>
							<td>$row[estadoActivo]</td>
      					</tr>
      				</tbody>
      			</table>

			</div>
			<script type='text/javascript'>
				$(document).ready(function(){
					$('#target').hide();

					$('#mostrar').on('click', function() {
						$('#target').show();
					 });
					$('#ocultar').on('click', function() {
						$('#target').hide(); //oculto mediante id
					});
				});
			</script>
			<button type='button' class='btn btn-success' id='mostrar'>Mostrar Adicionales</button>
			<button type='button' class='btn btn-danger' id='ocultar'>Ocultar Adicionales</button>
			<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 ' id='target'>
				<table class='table table-striped'>
      				<thead>
      					<th>Item</th>
      					<th>Datos</th>
      				</thead>
      				<tbody>
      					<tr>
      						<td>Proveedor:</td>
							<td>$row[IDproveedor]</td>
      					</tr>
      					<tr>
							<td>Num. Factura:</td>
							<td>$row[numFactura]</td>
      					</tr>
      					<tr>
							<td>Fecha Emision:</td>
							<td>$row[fecEmision]</td>
      					</tr>
      					<tr>
      						<td>Familia:</td>
							<td>$row[IDFamilia]</td>
      					</tr>
      					<tr>
							<td>Sub Familia:</td>
							<td>$row[IDSubFam]</td>
      					</tr>
      					<tr>
							<td>Unidad:</td>
							<td>$row[tipoUnidad]</td>
      					</tr>
      					<tr>
							<td>Articulo:</td>
							<td>$row[tipArticulo]</td>
      					</tr>
      					<tr>
							<td>Margen 1:</td>
							<td>$row[marGanancia1]</td>
      					</tr>
      					<tr>
							<td>Margen 2:</td>
							<td>$row[marGanancia2]</td>
      					</tr>
      					<tr>
							<td>Margen 3:</td>
							<td>$row[marGanancia3]</td>
      					</tr>
      					<tr>
							<td>Almacen:</td>
							<td>$alm[0]</td>
      					</tr>
      					<tr>
      						<td>Fecha Reg:</td>
							<td>$row[pro_fecRegistro]</td>
      					</tr>
      					<tr>
      						<td>Personal:</td>
							<td>$row[IDPersonal]</td>
      					</tr>
      					<tr>
      						<td>Num Parte:</td>
							<td>$row[parte]</td>
      					</tr>
      				</tbody>
      			</table>

			</div>
		</div>
	</div>
	";

}

search();