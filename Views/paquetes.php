<?php 
require_once "header4.php";
require_once "../Models/paquetesListadoCerrados.model.php";

$paqlista = new PaquetesListado();
$data = $paqlista->ListadoPaquetesCerrados();
?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	
	

	<script type="text/javascript">

		$(document).ready(function(){	


			$("#btnNuevoPaquete").click(function() {
				$.ajax({
					type : "POST",
					url  : "../Controllers/paqueteNuevo.controller.php",
								
					success:  function(data){
						
						location = "../Views/paquetesAgregados.php";
									
					},
					error: function(response){
						alert("Hubo un error");
					}
				});
				
				return false;
			});

		});
	</script>
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<h2>Listado de Ventas por paquete</h2>
				<div class="form-inline">
					
					<p class="alert alert-info col-6" >Debe crear un nuevo codigo para la Venta por Paquete (Grupo)</p>
					<form action="">
						<button type='submit' class='btn btn-success btn-lg' id='btnNuevoPaquete'>Nuevo paquete/Grupo de Elementos</button>
					</form>
				</div>

				<!-- tabla de listado de datos -->
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Numero de Paquete</th>
							<th>Cliente/Razon Social</th>
							<th>RUC / DNI</th>
							<th>Direccion</th>
							<th>Total</th>
							<th>Fecha</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($fila = $data->fetch_array(MYSQL_ASSOC)) { ?>
						<tr>
							<td><?php echo $fila['idps_temp']; ?></td>
							<td><?php echo $fila['razonsocial']; ?></td>
							<td><?php echo $fila['ruc']; ?></td>
							<td><?php echo $fila['direccion']; ?></td>
							<td><?php printf('S/. %.2f',$fila['total']); ?></td>
							<td><?php echo $fila['fecha']; ?></td>
							<td><a href="detallesPaquete.php?idps=<?php echo $fila['idps_temp']; ?>" class="btn btn-danger">Ver Detalles</a></td>
						</tr>
						<?php 	} ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>

<?php require_once "footer4.html"; ?>