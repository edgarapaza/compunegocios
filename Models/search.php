<?php

require_once("../Models/listadoProductos.class.php");

if(!isset($_POST['serie'])) exit('No se recibio el valor a buscar');

function search()
{
      

      $serie = $_POST['serie'];
      $listado1 = new ListadoProductos();
      $dat = $listado1->listaxSerie($serie);

	$row = $dat->fetch_array(MYSQLI_ASSOC);

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
							<td>$row[idproducto]</td>
      					</tr>
      					<tr>
							<td>Producto:</td>
							<td>$row[descripcion]</td>
      					</tr>
      					<tr>
							<td>Num. Serie:</td>
							<td>$row[numserie]</td>
      					</tr>
      					<tr>
      						<td>Marca:</td>
							<td>$row[marca]</td>
      					</tr>
      					<tr>
							<td>Modelo:</td>
							<td>$row[modelo]</td>
      					</tr>
      					
      					<tr>
							<td>Precio1:</td>
							<td>S/. $row[precventa1]</td>
      					</tr>
      					<tr>
							<td>Precio2:</td>
							<td>S/. $row[precventa2]</td>
      					</tr>
      					<tr>
							<td>Precio3:</td>
							<td>S/. $row[precventa3]</td>
      					</tr>
      					<tr>
							<td>Cantidad:</td>
							<td>$row[stocktotal]</td>
      					</tr>
      					<tr>
      						<td>Color:</td>
							<td>$row[color]</td>
      					</tr>
      					<tr>
      						<td>Incluye:</td>
							<td>$row[incluye]</td>
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
							<td>$row[razonSocial]</td>
      					</tr>
      					
      					<tr>
      						<td>Familia:</td>
							<td>$row[idfamilia]</td>
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
							<td>$row[marGanancia1] %</td>
      					</tr>
      					<tr>
							<td>Margen 2:</td>
							<td>$row[marGanancia2] %</td>
      					</tr>
      					<tr>
							<td>Margen 3:</td>
							<td>$row[marGanancia3] %</td>
      					</tr>
      					<tr>
							<td>Almacen:</td>
							<td>$row[idalmacen]</td>
      					</tr>
      					<tr>
      						<td>Fecha Reg:</td>
							<td>$row[fecAlta]</td>
      					</tr>
      					<tr>
      						<td>Personal:</td>
							<td>$row[idpersonal]</td>
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