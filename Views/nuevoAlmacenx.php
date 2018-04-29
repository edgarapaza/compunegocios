<?php 

$viejoalmacen = $_REQUEST['idalmacen'];
$idproducto = $_REQUEST['idproducto'];

echo "IdAlmacen enviado : " . $viejoalmacen;
echo " ----- Idproducto enviado : " . $idproducto;


?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/comboalmacen.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3>Cambiar a Nuevo almacen</h3>
					<button type="button" class="btn btn-success" id="btnMostrarCombo">M</button>
			<div class="form-group">
				<label for="inputAlmacen" class="col-sm-1 control-label">Almacen:</label>
				<div class="col-sm-2">
					<p>Almacen Anterior: <?php echo $viejoalmacen; ?>  ---> Mover a: </p>
				</div>
				<div class="col-sm-2">
					<div id="combo1"></div>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-success" id="btnMoverProducto">Mover a Nuevo Almacen</button>
				</div>
			</div>
			<br>
						
		</div>
	</div>