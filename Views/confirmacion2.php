<?php
include "header4.html"; 
$msg = $_REQUEST['msg'];
?>


<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h3>Datos actualizados</h3>
			<p><?php echo $msg; ?></p>
			<a href="./moveralmacen.php" class="btn btn-danger">Cerrar ventana</a>
		</div>
	</div>
</div>
			
<?php include "footer4.html"; ?>