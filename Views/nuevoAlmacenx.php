<?php 
require_once "header4.php";
require_once "../Models/articulos.model.php";

$idproducto        = $_REQUEST['idproducto'];
$idalmacenanterior = $_REQUEST['idalmacen'];
$nom_almacen       = $_REQUEST['almacen'];

$articulo = new ArticulosAlmacen();
$dat = $articulo->ListaArticulosIdProducto($idproducto);

$fila = $dat->fetch_array(MYSQLI_ASSOC);
  #echo $fila[0]."<br>";
  
?>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen3.js"></script>

	<script type="text/javascript">

				$(document).ready(function(){
					$("#btnMoverProducto").click(function(event)
					{
													
						var cboalmacen = $("#inputAlmacen").val();
						
						if(cboalmacen == null){
							alert("Debe elegir el almacen al que debe mover el producto \n Persione al boton amarillo Mostrar Lista de Almacenes. Gracias");
							
						}else{
							if(cboalmacen == 0){
								alert("Debe Seleccionar por lo menos una una nueva ubicación de almacen");
								
							}
							else{
								
								var cantAlmacen  = $("#stock").val();
								var cant_a_Mover = $("#stockMover").val();


								if(parseInt(cant_a_Mover) < 0){

									alert("No se permiten numero Negativos");

								}else{

									if(parseInt(cant_a_Mover) <= parseInt(cantAlmacen)){

												$.ajax({
									            type: 'POST',
									            url : '../Controllers/movernuevoalmacen.controller.php',
									            data: $("#formulario").serialize(),

									            success: function(data) {
									            	alert("Producto Cambiado");
									            	location.href="moveralmacen.php";
									            	//$("#res").html(data);
									          	},
									          	error: function(data){
									          		console.log(data);
									          		$("#res").html("<p class='alert alert-danger'>Error moviendo el producto al nuevo almacen</p>" + data);
									          	}
								        		});
								        		return false;

									}else{
										alert("La cantidad excede a la cantidad en Almacen para mover.  Corriga");
											
									}

								}
									
							}
							
						}

						return false;
					});
				});
			</script>


<div class="container">
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<h3>Cambiar a Nuevo almacen</h3>

			

			<div id="res"></div>

			<form method="POST" class="form-inline" role="form" id="formulario">
				<input type="hidden" name="idalmacenanterior" id="idalmacenanterior" value="<?php echo $idalmacenanterior; ?>">
				<input type="hidden" name="idproducto" id="idproducto" value="<?php echo $idproducto; ?>">
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Almacen Actual</th>
							<th>Producto</th>
							<th>Cantidad Stock</th>
							<th>Mover a <button type="button" id="btnMostrarCombo" class="btn-warning">Mostrar Lista de Almacenes</button></th>
							<th>Cantidad Mover</th>
							<th>Confirmar</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $fila['actual']; ?></td>
							<td><?php echo $fila['descripcion']." | " . $fila['marca']; ?></td>
							<td>
								<?php echo $fila['stocktotal']; ?>
								<input type="hidden" name="stock" id="stock" value="<?php echo $fila['stocktotal']; ?>" required="required">
							</td>
							<td>
								<div id="combo1"></div>
							</td>

							<td><input type="number" name="stockMover" id="stockMover" size="2" min="1" max="999" value="1"></td>
							<td><button type="submit" class="btn btn-success" id="btnMoverProducto">Mover a Nuevo Almacen</button></td>
						</tr>
					</tbody>
				</table>
			</form>
						
		</div>
	</div>


<?php include "footer4.html"; ?>

