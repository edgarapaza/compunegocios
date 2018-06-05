<?php 
require_once "header4.php"; 
require_once "../Models/listadoProductos.class.php";

$idprod = $_REQUEST['idprod'];

//echo "El codigo Recibido es: " . $idprod;

$listprod = new ListadoProductos();
$datos = $listprod->ProductoSolo($idprod);

?>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$("#btnuno").click(function(){
			alert("El producto ya se ha VENDIDO !!!");
	    	e.preventDefault();
			
	        $.ajax({
	            type: 'POST',
	            url : '../Controllers/confirmarVenta.controller.php',
	            data: $(this).serialize(),
	            success: function(data) {
	                $("#Mensajes").html(data);
	            },
	            error: function(res){
	            	$("#Mensajes").html(res);
	            }
	        });      
	        return false;
		});

	});
	   
</script>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="../Controllers/confirmarVenta.controller.php" method="POST" role="form">
				<legend>Confirmación de Venta</legend>
				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Stock</th>
							<th>Precio</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="hidden" name="codigo" id="codigo" value="<?php echo $datos['idproducto']; ?>">
								<input type="hidden" name="codprodgen" id="codprodgen" value="<?php echo $datos['codigo']; ?>">
								<?php echo $datos['idproducto']; ?>
							</td>
							<td><?php echo $datos['descripcion']; ?></td>
							<td>
								<?php echo $datos['stocktotal']; ?>
							</td>
							<td>
								S/. <input type="text" name="precio" id="precio" value="<?php echo $datos['precventa3']; ?>">
							</td>
							<td>
								<input type="number" name="cantidad" id="cantidad" value="1" min="1" max="99" step="1" required="required">
							</td>
							<td>
								<input type="submit" name="btnuno" id="btnuno" class="btn btn-success" value="Confirmar Venta">
								<a href="productos_listado.php" class="btn btn-warning">Cancelar</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

<?php include "footer4.html"; ?>