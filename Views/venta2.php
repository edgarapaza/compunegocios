<?php 
require_once "header4.php"; 
require_once "../Models/listadoProductos.class.php";

$idprod = $_REQUEST['idprod'];

//echo "El codigo Recibido es: " . $idprod;

$listprod = new ListadoProductos();
$datos = $listprod->ProductoSolo($idprod);

?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$("#btnConfirmar").click(function(){
						
			var vender = $("#txtcantidad").val();
			var stockactual = $("#txtstock").val();

			if(vender <=0)
			{
				alert("Ha ingresado 0 o un numero negativo en la cantidad a vender. Corrija Por favor");
			}else{

				if(stockactual>=vender){
						    				
			        $.ajax({
			            type: 'POST',
			            url : '../Controllers/confirmarVenta.controller.php',
			            data: $("#formulario").serialize(),
			            success: function(){
			            	alert("Producto Vendido...");
			            	location.href="../Views/productos_listado.php";
			            },
			            error: function(){
			            	alert("Error");
			            }
			            
			        });
			        return false;
				}
			}
			
		});

	});
	   
</script>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div id="Mensajes"></div>

			<!-- ../Controllers/confirmarVenta.controller.php -->
			<form action="" method="POST" role="form" id="formulario">
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
								<input type="hidden" name="txtstock" id="txtstock" value="<?php echo $datos['stocktotal']; ?>">
							</td>
							<td>
								S/. <input type="text" name="precio" id="precio" value="<?php echo $datos['precventa3']; ?>">
							</td>
							<td>
								<input type="number" name="txtcantidad" id="txtcantidad" value="1" min="1" max="99" step="1" required="required">
							</td>
							<td>
								<input type="submit" name="btnConfirmar" id="btnConfirmar" class="btn btn-success" value="Confirmar Venta">
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