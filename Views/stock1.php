<?php 
include "header4.html"; 
$codprovedor = $_REQUEST['codigo'];
$idregistro = $_REQUEST['idregistro'];

include "../Models/Conexion.php";
include "../Models/compras.model.php";

		/* PARA LOS DATOS DEL PROVVEDOR */
				$link = new Conexion();
				$con = $link->Conectarse();

				$sql ="SELECT idproveedor as codigo, nomprove, razonsocial, email, website FROM proveedor WHERE idproveedor = " . $codprovedor ;
				$datos = $con->query($sql);

				$fila = $datos->fetch_array();
		/****************************************************/

$compra = new Compras();
$dataprov = $compra->ListadoComprasProveedor($codprovedor);
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<form>
				
				
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Codigo del Proveedor:</th>
							<td><?php echo $codprovedor; echo "IdRegistro: ".$idregistro; ?>
								<input type="hidden" name="codprovedor" value="<?php echo $codprovedor; ?>">
							</td>
							<th>Razon Social:</th>
							<td><?php echo $fila[2]; ?></td>
						</tr>
						<tr>
							<th>Nombre del Proveedor: </th>
							<td><?php echo $fila[1]; ?></td>
							<th>Email:</th>
							<td><?php echo $fila[3]; ?></td>
							<th>WebSite:</th>
							<td><?php echo $fila[4]; ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</form>
			
			<a href="nuevoProductoProveedor.php?idproveedor=<?php echo $codprovedor; ?>&idregistro=<?php echo $idregistro; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-file"> </span>Nuevo Producto</a>

			<button type="button" class="btn btn-primary btn-lg" onClick="window.location.reload()"><span class="glyphicon glyphicon-refresh"></span> Actualizar / Refresh Page</button>
			
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Producto</th>
						<th>Marca</th>
						<th>Precio Venta</th>
						<th>Num. Factura</th>
						<th>Fecha Compra</th>
						
						<th>Cantidad</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($row = $dataprov->fetch_array(MYSQLI_ASSOC)) {	//echo $row['idproveedor'];
					 ?>
					<tr>
						<td><?php  echo $row['idcompra'];?></td>
						<td>
							<?php 
								//echo $row['codigo']."-";
								$prod = $compra->DatosProducto($row['idproducto']);
								echo $prod[0];
								
						?></td>
						<td>
							<?php 
								$prod = $compra->DatosProducto($row['idproducto']);
								echo $prod[1];
								
						?></td>
						<td><?php printf("S/. %.2f", $row['pvp']); ?></td>
						<td><?php echo $row['numfactura']; ?></td>
						<td><?php echo $row['feccompra']; ?></td>
						
						<td><?php echo $row['cantidad']; ?></td>
						<td>
							<a href="updateStock.php?codprove=<?php echo $codprovedor; ?>&idcompra=<?php  echo $row['idcompra'];?>&codprod=<?php echo $row['idproducto']; ?>&codgen=<?php echo $row['codigo']; ?>" rel="pop-up" class="btn btn-info"> <span class="glyphicon glyphicon-plus"></span> Add Compras</a>
							
							<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready( function() {
		$("a[rel='pop-up']").click(function () {
	      	var caracteristicas = "height=500,width=900,scrollTo,resizable=1,scrollbars=1,location=0";
	      	nueva=window.open(this.href, 'Popup', caracteristicas);
	      	return false;
		});
	});
</script>

<?php include "footer4.html"; ?>