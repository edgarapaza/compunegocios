<?php 
include "header.php"; 

?>
<script type="text/javascript" src="../js/"></script>
<script type="text/javascript" src="../js/comboalmacen.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<button type="button" class="btn btn-success" id="btnMostrarCombo">-</button>
			<div class="form-group">
				<label for="inputAlmacen" class="col-sm-1 control-label">Almacen:</label>
				<div class="col-sm-2">
					<div id="combo1"></div>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-success" id="btnConsulta">Ver producto</button>
				</div>
			</div>
			<br>
						
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="tablaDatos"></div>
			
		</div>
	</div>

</div>

