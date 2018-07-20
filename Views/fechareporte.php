<?php 
require "header4.php";
?>

<div class="container">
	
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<caption>Seleccione una fecha para ver el Reporte</caption><br>
			<input type="date" name="fechareporte" id="fechareporte">
			<button type="button" name="btnReporte" id="btnReporte" onclick="VerReporte();">Ver reporte</button>

		</div>

	</div>

</div>

<script type="text/javascript">
	function VerReporte(){
		var fecha = $("#fechareporte");
		if(fecha.val() == ""){
			alert("Debe escoger una fecha en el calendario.");
			fecha.css('background-color','yellow');
		}else{
			location.href="../reportes/reporte6.php?calendario="+fecha.val();
		}
		
	}
</script>