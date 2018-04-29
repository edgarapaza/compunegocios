<?php 
include "header4.html";
$viejoalmacen = $_REQUEST['idalmacen'];
$idproducto = $_REQUEST['idproducto'];

echo "IdAlmacen enviado : " . $viejoalmacen;
echo "Idproducto enviado : " . $idproducto;


?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p>Almacen Anterior: <?php echo $viejoalmacen; ?>  ---> Mover a: </p>
				<h3>Cambiar a Nuevo almacen</h3>


				<form action="" method="POST" class="form-inline" role="form">
				
					<div class="form-group">
						
						
						
						<div class="col-sm-2">
								<div id="combo1"></div>
						</div>
						
					</div>
				
					<button type="button" class="btn btn-success" id="btnMoverProducto">Mover a Nuevo Almacen</button>
				
				</form>

				<button type="button" id="btnMostrarCombo"></button>
						
		</div>
	</div>

<?php include "footer4.html"; ?>