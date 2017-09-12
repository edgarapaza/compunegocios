<?php

if(!isset($_POST['serie'])) exit('No se recibio el valor a buscar');

require_once 'conexion.ajax.php';

function search()
{
	$mysqli = getConnection();

	$serie = $mysqli->real_escape_string($_POST['serie']);


	$sql = "SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia1,marGanancia2,marGanancia3,precioVenta1,precioVenta2,precioVenta3,cantidad,IDAlmacen,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,parte FROM productos WHERE numserie = '". $serie ."' LIMIT 1";
	$res = $mysqli->query($sql);
	$row = $res->fetch_array(MYSQLI_ASSOC);

	echo "
		<div class='row'>
			<div class='col-sm-4 col-lg-12'>
			<div class='panel panel-default'>
			<div class='panel-heading'>
			<i class='fa fa-server'></i> Datos del producto
			</div>

			<div class='panel-body'>
			<div class='row'>
			<div class='col-lg-6'>
				<p><strong>Codigo:</strong> $row[IDproducto]</p>
				<p><strong>Producto:</strong> $row[producto]</p>
				<p><strong>Num. Serie:</strong> $row[numserie]</p>
				<p><strong>Marca:</strong> $row[IDmarca]</p>
				<p><strong>Modelo:</strong> $row[modelo]</p>
				<p><strong>Descripcion:</strong> $row[descripcion]</p>
				<p><strong>Observaciones:</strong> $row[obs]</p>
			</div>
			<div class='col-lg-6'>
				<p><strong>Precio1:</strong> $row[precioVenta1]</p>
				<p><strong>Precio2:</strong> $row[precioVenta2]</p>
				<p><strong>Precio3:</strong> $row[precioVenta3]</p>
				<p><strong>Cantidad:</strong> $row[cantidad]</p>
				<p><strong>Color:</strong> $row[pro_color]</p>
				<p><strong>Incluye:</strong> $row[pro_incluye]</p>
				<p><strong>Estado:</strong> $row[estadoActivo]</p>
			</div>
			</div>
			</div>
			</div>
			</div>
		</div>

		<div class='row target'>
			<div class='col-sm-4 col-lg-12'>
			<div class='panel panel-default'>
			<div class='panel-heading'>
			<i class='fa fa-server'></i> Datos Adicionales
			</div>

			<div class='panel-body'>
			<div class='row'>
			<div class='col-lg-6'>
				<p><strong>Proveedor:</strong> $row[IDproveedor]</p>
				<p><strong>Num. Factura:</strong> $row[numFactura]</p>
				<p><strong>Fecha Emision:</strong> $row[fecEmision]</p>
				<p><strong>Familia:</strong> $row[IDFamilia]</p>
				<p><strong>Sub Familia:</strong> $row[IDSubFam]</p>
				<p><strong>Unidad:</strong> $row[tipoUnidad]</p>
				<p><strong>Articulo:</strong> $row[tipArticulo]</p>
			</div>
			<div class='col-lg-6'>
				<p><strong>Margen 1:</strong> $row[marGanancia1]</p>
				<p><strong>Margen 2:</strong> $row[marGanancia2]</p>
				<p><strong>Margen 3:</strong> $row[marGanancia3]</p>
				<p><strong>Almacen:</strong> $row[IDAlmacen]</p>
				<p><strong>Fecha Reg:</strong> $row[pro_fecRegistro]</p>
				<p><strong>Personal:</strong> $row[IDPersonal]</p>
				<p><strong>Num Parte:</strong> $row[parte]</p>
			</div>
			</div>
			</div>
			</div>
			</div>
		</div>
	";

}

search();