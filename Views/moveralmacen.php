<?php  require_once "header4.php";  ?>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/comboalmacen.js"></script>


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<caption>Almacen:</caption>
			<button type="button" id="btnMostrarCombo"></button>

			<form action="" method="POST" class="form-inline" role="form">

					<div class="col-sm-2 col-sm-offset-2">

						<div id="combo1"></div>
						
					</div>
					<div class="col-sm-2 col-sm-offset-2">
						<button type="button" class="btn btn-success" id="btnConsulta">Ver producto</button>
					</div>
				
			</form>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div id="tablaDatos"></div>

		</div>
	</div>

</div>

<?php include "footer4.html"; ?>