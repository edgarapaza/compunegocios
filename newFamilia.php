<?php
require_once("Models/nuevaFamilia.model.php");
$nf = new Nuevafamilia();
$datos = $nf->ListaFamilias();
$datos2 = $nf->ListaFamilias();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("a").click(function(){
			var href = $(this).attr("href");
			console.log(href);

			$.ajax({
				data: {"codigo": href},
				url : 'Controllers/nuevaSubFamilia.controller.php',
				type: 'POST',
				beforeSend: function(){
					$('#result').html("<img src='img/load.gif'>");
				},
				success: function(response) {
					$('#result').html(response);
				},
				error: function(){
					$('#result').html("No tiene sub Familias Creadas ");
				}
			});
		});

		$("#btnNuevaFamilia").click(function(){
			var codigo = $("#inputcodigo").val();
			var familia = $("#inputfamilia").val();

			var parametros = {
				"codigo":codigo,
				"familia": familia
			};
			$.ajax({
				data : parametros,
				type : 'POST',
				url  : 'Controllers/nuevaFamilia.controller.php',
				beforeSend: function(){
					$("#result").html("<img src='img/load.gif'>");
				},
				success: function(response){
					$("#result").html(response);
				},
				error: function(){
					$("#result").html("Hubo un problema al guardar");
				}
			});

		});
		///////////
		//////////
		$("#btnNuevaSubFamilia").click(function(){
			var codigosf   = $("#codSubfam").val();
			var idfamilia  = $("#idfamilia").val();
			var subfamilia = $("#subFamilia").val();

			if(idfamilia == 0){
				alert("Debe Seleccionar una Familia Obligatoriamente");
			}

			$.ajax({
				data : {"codigo":codigosf, "idfamilia": idfamilia, "subfamilia":subfamilia},
				url  : 'Controllers/nuevaSubfamilia2.controller.php',
				type : 'POST',
				beforeSend: function(){
					$("#result").html("<img src='img/load.gif'>");
				},
				success: function(response){
					$("#result").html(response);
				},
				error: function(){
					$("#result").html("Error al agregar. Informe al administrador del sistema");
				}
			});
		});

	});
</script>
<style type="text/css">
	form{
		border: 1px solid black;
		border-radius: 5px;
		padding-bottom: 50px;
	}
</style>
<script type="text/javascript" src="vendor/jquery/jquery.js"></script>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" class="form-horizontal" role="form" id="guarda">
				<h3>Nueva Familia</h3>
				<div class="col-sm-3">
					<input type="text" name="cod" id="inputcodigo" class="form-control" required="required" placeholder="Codigo">
				</div>
				<div class="col-sm-6">
					<input type="text" name="familia" id="inputfamilia" class="form-control" required="required" placeholder="Familia">
				</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-primary" id="btnNuevaFamilia">Guardar</button>
				</div>
			</form>
			<br>

			<h3>Lista de familias</h3>
			<table class="table table-striped table-responsive bg-danger">
				<thead>
					<tr>
						<th>ID</th>
						<th>Codigo</th>
						<th>Familia</th>
						<th>Ver</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($fila = $datos->fetch_array()) { ?>
					<tr>
						<td><?php echo $fila[0];?></td>
						<td><?php echo $fila[1];?></td>
						<td><?php echo $fila[2];?></td>
						<td>
							<a href="#<?php echo $fila[0];?>" class="btn btn-success"> Sub.Fam.</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
			<form action="" method="POST" class="form-horizontal" role="form" id="guardaSubfamilia">
				<h3>Nueva Sub Familia</h3>
				<div class="col-sm-2">
					<input type="text" name="codSubfam" id="codSubfam" class="form-control" required="required" placeholder="Codigo">
				</div>

					<div class="col-sm-4">
						<select name="idfamilia" id="idfamilia" class="form-control" required="required">
							<option value="0">Seleccione</option>
							<?php while ($fila2 = $datos2->fetch_array()) { ?>
							<option value="<?php echo $fila2[0];?>"><?php echo $fila2[2];?></option>
							<?php } ?>
						</select>
					</div>

				<div class="col-sm-4">
					<input type="text" name="subFamilia" id="subFamilia" class="form-control" required="required" placeholder="Familia">
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-primary" id="btnNuevaSubFamilia">Guardar</button>
				</div>
			</form>
			<h3>Lista de Sub Familias</h3>
			<div id="result"></div>
		</div>
	</div>
</div>