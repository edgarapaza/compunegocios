<?php
session_start();

require_once "../Models/articulos.model.php";

$idpersonal = $_SESSION['administrador'];
$idproveedor = $_REQUEST['codigo'];
$idregistro = $_REQUEST['idregistro'];



$articulo = new ArticulosAlmacen();

$dat = $articulo->ListaArticulosNombresforCompra($nombre);

?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">

	function Confirmar(id)
	{
		
		var mensaje;
    var opcion = confirm("¿Desea agregar este articulo?\nClick en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK" + id;
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;

	}
	
</script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<div class="container">
	<div class="row">

		<div id="ejemplo"></div>

		<form action="" method="POST" class="form-inline" role="form">

			<div class="form-group">
				Buscar por nombre del producto: 
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar">
			</div>

			<button type="button" class="btn btn-primary">Buscar</button>
		</form>
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Codigo</th>
						<th>Serie</th>
						<th>Fam.</th>
						<th>Descripcion</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Stock Total</th>

					</tr>
				</thead>
				<?php 
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				 ?>
				
				<tbody>
					<tr>
						<td><?php echo $fila['idproducto']; ?></td>
						<td><?php echo $fila['numserie']; ?></td>
						<td><?php echo $fila['codigo']; ?></td>
						<td><?php echo $fila['descripcion']; ?></td>
						<td><?php echo $fila['marca']; ?></td>
						<td><?php echo $fila['modelo']; ?></td>
						<td align='center'><?php echo $fila['stocktotal']; ?></td>
						<td>

						</td>

						<td>
							<a href='../Controllers/listadoforCompras.controller.php?idproducto=<?php echo $fila['idproducto']; ?>&codigo=<?php echo $fila['codigo']; ?>&idproveedor=<?php echo $idproveedor;?>&idregistro=<?php echo $idregistro;?>' class='btn btn-success' id="btnAgregar" onclick="Confirmar(this);">Agregar al listado</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
				
		</table>
	</div>
</div>

<?php include "footer4.html"; ?>