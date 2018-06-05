<?php
require_once "header4.php";
require_once("../Models/nuevaFamilia.model.php");
$nf = new Nuevafamilia();
$datos = $nf->ListaFamilias();
$datos2 = $nf->ListaFamilias();
?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("a").click(function(){
			var href = $(this).attr("href");
			console.log(href);

			$.ajax({
				data: {"codigo": href},
				url : '../Controllers/nuevaSubFamilia.controller.php',
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
				url  : '../Controllers/nuevaFamilia.controller.php',
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
				url  : '../Controllers/nuevaSubfamilia2.controller.php',
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
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">

			<caption>Nueva Familia</caption>
			<form action="" method="POST" class="form-inline" role="form" id="guarda">
				<div class="form-group">

						<div class="col-sm-3 col-sm-offset-2">
							<input type="text" size="2" name="cod" id="inputcodigo" class="form-control" required="required" placeholder="Codigo">
					 	</div>
					<div class="col-sm-6 col-sm-offset-2">
						<input type="text" name="familia" id="inputfamilia" class="form-control" required="required" placeholder="Familia">
					</div>
					<div class="col-sm-3 col-sm-offset-2">
						<button type="button" class="btn btn-primary" id="btnNuevaFamilia">Guardar</button>
					</div>
				</div>
			</form>
			<br>


		</div>

		<div class="col-md-6">
				<caption>Nueva Sub Familia</caption>
			<form action="" method="POST" class="form-inline" role="form" id="guardaSubfamilia">

					<div class="col-sm-2 col-sm-offset-2">
						<input type="text"  name="codSubfam" size="2" id="codSubfam" class="form-control" required="required" placeholder="Codigo">
					</div>

					<div class="col-sm-5 col-sm-offset-2">
						<select name="idfamilia" id="idfamilia" class="form-control" required="required">
							<option value="0">Seleccione</option>
							<?php while ($fila2 = $datos2->fetch_array()) { ?>
							<option value="<?php echo $fila2[0];?>"><?php echo $fila2[2];?></option>
							<?php } ?>
						</select>
					</div>

					<div class="col-sm-3 col-sm-offset-2">
						<input type="text" name="subFamilia" id="subFamilia" class="form-control" required="required" placeholder="Sub Familia">
					</div>
					<div class="col-sm-2 col-sm-offset-2">
						<button type="button" class="btn btn-primary" id="btnNuevaSubFamilia">Guardar</button>
					</div>
			</form>

		</div>
	</div>

	<div class="row">
	  <div class="col-md-6">
			<h3>Lista de familias</h3>
			<table class="table table-striped">
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
			<h3>Lista de Sub Familias</h3>
			<div id="result"></div>
		</div>
	</div>
</div>

<?php include "footer4.html"; ?>
