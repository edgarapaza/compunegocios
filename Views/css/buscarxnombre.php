<?php
include	 "header.php";

require_once "../Models/listadoProductos.class.php";

$listado = new ListadoProductos();
$list = $listado->BuscarxNombre('a');


$nombre = $_POST['nombre']; ?>;
echo $nombre;
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	
    	<h2>Nueva lista</h2>
    	<form action="" method="POST" class="form-inline" role="form">
    	
    		<div class="form-group">
    			<label class="sr-only" for="">Buscar por nombre</label>
    			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre producto">
    		</div>   		
    		<button type="submit" class="btn btn-primary">Submit</button>
    	</form>
			
		</div>
	</div>  	

	<div class="row">
		<style type='text/css'>
	table{
		font-size: 1.5em;
		}
	</style>
	<div class='container'>
    	<div class='row'>

      	<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
					<a href='Views/venta2.php?idprod=<?php echo $fil[idproducto]; ?>' class='btn btn-success' style='float:right;'>Vender producto</a>
      	</div>
      </div>
			<?php 
				while ($fil = $list->fetch_array()) {
			 ?>
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
							<td><?php echo $fil[idproducto]; ?></td>
      					</tr>
      					<tr>
							<td>Producto:</td>
							<td><?php echo $fil[descripcion]; ?></td>
      					</tr>
      					<tr>
							<td>Num. Serie:</td>
							<td><?php echo $fil[numserie]; ?></td>
      					</tr>
      					<tr>
      						<td>Marca:</td>
							<td><?php echo $fil[marca]; ?></td>
      					</tr>
      					<tr>
							<td>Modelo:</td>
							<td><?php echo $fil[modelo]; ?></td>
      					</tr>
      					
      					<tr>
							<td>Precio1:</td>
							<td>S/. <?php echo $fil[precventa1]; ?></td>
      					</tr>
      					<tr>
							<td>Precio2:</td>
							<td>S/. <?php echo $fil[precventa2]; ?></td>
      					</tr>
      					<tr>
							<td>Precio3:</td>
							<td>S/. <?php echo $fil[precventa3]; ?></td>
      					</tr>
      					<tr>
							<td>Cantidad:</td>
							<td><?php echo $fil[stocktotal]; ?></td>
      					</tr>
      					<tr>
      						<td>Color:</td>
							<td><?php echo $fil[color]; ?></td>
      					</tr>
      					<tr>
      						<td>Incluye:</td>
							<td><?php echo $fil[incluye]; ?></td>
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

						<button type='button' class='btn btn-info' id='mostrar'>Mostrar Adicionales</button>
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
									<td></td>
		      					</tr>
		      					
		      					<tr>
		      						<td>Familia:</td>
									<td><?php echo $fil[idfamilia]; ?></td>
		      					</tr>
		      					
		      					<tr>
									<td>Unidad:</td>
									<td><?php echo $fil[tipoUnidad]; ?></td>
		      					</tr>
		      					<tr>
									<td>Articulo:</td>
									<td><?php echo $fil[tipArticulo]; ?></td>
		      					</tr>
		      					<tr>
									<td>Margen 1:</td>
									<td><?php echo $fil[marGanancia1]; ?> %</td>
		      					</tr>
		      					<tr>
									<td>Margen 2:</td>
									<td><?php echo $fil[marGanancia2]; ?> %</td>
		      					</tr>
		      					<tr>
									<td>Margen 3:</td>
									<td><?php echo $fil[marGanancia3]; ?> %</td>
		      					</tr>
		      					<tr>
									<td>Almacen:</td>
									<td><?php echo $fil[idalmacen]; ?></td>
		      					</tr>
		      					<tr>
		      						<td>Fecha Reg:</td>
									<td><?php echo $fil[fecAlta]; ?></td>
		      					</tr>
		      					<tr>
		      						<td>Personal:</td>
									<td><?php echo $fil[idpersonal]; ?></td>
		      					</tr>
		      					<tr>
		      						<td>Num Parte:</td>
									<td><?php echo $fil[parte]; ?></td>
		      					</tr>
		      				</tbody>
		      	</table>
					</div>
			</div>
			<?php } ?>
	</div>
	</div>
</div>