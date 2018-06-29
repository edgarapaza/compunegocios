<?php require_once "header4.php";

require_once "../Models/detallesPaquete.model.php";

$idps = $_REQUEST['idps'];


$det = new DetallesPaqueteClass();
$datos = $det->DetallesPaquete($idps);
//q.idpaquete, q.fecReg, q.idproducto, q.producto, q.modelo, q.cantidad, q.precio, q.subtotal, q.fecCierre,p.numserie

 ?>

<div class="container">
	
	<div class="row">
		<caption>Visualizando los productos vendidos del paquete: <span class="alert alert-info"><?php echo $idps; ?></span></caption>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Num</th>
					<th>Fec. Registro</th>
					<th>Producto</th>
					<th>Modelo</th>
					<th>Num. Serie</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
					<th>Fec. Cierre</th>
				</tr>
			</thead>
			<tbody>
				<?php $i =1;
				while ($fila = $datos->fetch_array(MYSQL_ASSOC)) { ?>
					<tr>
						<td><?php  echo $i; ?></td>
						<td><?php  echo $fila['fecReg']; ?></td>
						<td><?php  echo $fila['producto']; ?></td>
						<td><?php  echo $fila['modelo']; ?></td>
						<td><?php  echo $fila['numserie']; ?></td>
						<td><?php  echo $fila['cantidad']; ?></td>
						<td><?php  echo $fila['precio']; ?></td>
						<td><?php  echo $fila['subtotal']; ?></td>
						<td><?php  echo $fila['fecCierre']; ?></td>
					</tr>
				<?php $i++;} ?>
			</tbody>
		</table>

	</div>
</div>

<?php require_once "footer4.html"; ?>