<?php
include "header4.html";
$idprov = $_REQUEST['codigo'];

require_once "../Models/registroprovprod.model.php";

$reg = new RegistroProveedorProducto();
$result = $reg->ListadoRegistroProvProd($idprov);

$nom = $reg->NombreProveedor($idprov);

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="../Controllers/facturas.controller.php?codigo=<?php echo $idprov;?>" class="btn btn-primary"><span class="glyphicon glyphicon-file"></span> Crear Nuevo Registro de Compras</a>
				
				<table class="table table-hover">
					<thead>
						<tr class="thead-dark">
							<th>Codigo</th>
							<th><input type="hidden" name="idproveedor" id="idproveedor" value="<?php echo $idprov;?>"></th>
							<th>Fecha</th>
							<th>Add producto</th>
							
						</tr>
					</thead>
					<tbody>
					<?php while ($fila = $result->fetch_array()) { ?>
						<tr>
							<td><?php echo $fila[0]; ?></td>
							<td><?php echo $nom['nomprove']; ?></td>
							<td><?php echo $fila[2]; ?></td>
							<td>
								<a href="stock1.php?codigo=<?php echo $idprov;?>&idregistro=<?php echo $fila[0]; ?>" class="btn btn-success">Ver Detalles</a>
								
							</td>
							
						</tr>
						<?php } ?>
					</tbody>
				</table>



		</div>
	</div>
</div>
<?php include "footer4.html"; ?>