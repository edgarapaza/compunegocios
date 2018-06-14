<?php 
session_start();
if(empty($_SESSION["nuevo_codigo"]))
		{
			echo "Debe crear un nuevo codigo para la Venta por Paquete (Grupo).<br>";
			
			echo "<button type='button' class='btn btn-success' id='btnNuevoPaquete'>Nuevo paquete/Grupo de Elementos</button>";
			echo "
				<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext'>
					<link rel='stylesheet' type='text/css' href='assets/css/dashboard.css'>

					<script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>

					<script type='text/javascript' src='js/nuevoPaquete.js'></script>
				";
		}else{

				
		
				$micodigosession = $_SESSION["nuevo_codigo"];

				require_once "../Models/paquete.model.php";


				$paq = new Paquete();
				$datos = $paq->Venta_temporal();

				$total = $paq->SumaPaquete($micodigosession);

?>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
		<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">

		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		
		<script type="text/javascript">
			function mandar(codigomuerto){
				alert(codigomuerto);
				window.location = "muerto.php?codigomuerto=" + codigomuerto;
			}
		</script>	



		<form id="Form" action="../Controllers/paqueteGuardarCerrar.controller.php" class="form-inline">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<input type="hidden" name="next_paquete" value="<?php echo $micodigosession; ?>">
				<?php echo "Esta trabajando con el Grupo (Paquete): " . $_SESSION["nuevo_codigo"]; ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			 | Si por alguna razón, el numero de paquete no funciona presione: <a href="javascript:mandar(<?php echo $micodigosession; ?>)">Cerrar Codigo</a>
				
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Num</th>
						<th>Producto</th>
						<th>Modelo</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Sub Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=1;
						
					while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
					 ?>
					<tr>
						<td>
							<div class="checkbox">
							<label>
								<input type="checkbox" name="<?php echo "elemento".$i; ?>" value="<?php echo $i; ?>" >
							</label>
						</div></td>
						<td><?php echo $i; ?></td>
						<td><?php echo $fila['producto']; ?></td>
						<td><?php echo $fila['modelo']; ?></td>
						<td>
							<input type="text" name="precio" class="txt_precio" value="<?php echo $fila['precio']; ?>" min="1" max="9999">
						</td>
						<td><input type="number" name="cantidad" id="<?php echo $i; ?>" value="<?php echo $fila['cantidad']; ?>" min="1" max="9999"></td>
						<td>
							
								<?php echo $fila['subtotal']; ?>
							</td>
							<td>
								<a href="#?cod=<?php echo $fila['idproducto']; ?>">Actualizar</a>
								<a href="#?cod=<?php echo $fila['idproducto']; ?>">Quitar</a>
							</td>
					</tr>
					<?php 
							$i++;
						} ?>
					<tr>
						
						<td colspan="2"><button type="submit" class="btn btn-info">Guardar/Cerrar</button></td>

						<td colspan="2" align="right">Total</td>
						<td><?php printf("S/. %.2f", $total['total']); ?>
							<input type="hidden" name="total1" value="<?php echo $total['total']; ?>">
						</td>
					</tr>	
				</tbody>
			</table>
		</form>
<?php 
	}
?>