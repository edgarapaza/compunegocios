<?php
include "header.php";
?>

<script type="text/javascript">

	$(document).ready(function(){

		window.addEventListener('load',carga, false);

		function carga(){

			$("#btnmostrar").trigger('click');

		}

		$("#btnmostrar").click(function(){
				
				$.ajax({
					type : 'POST',
					url  : '../Controllers/listafamilia.controller.php',
					beforeSend: function(){
						$('#fam-lista').html("<img src='../img/load.gif'>");
					},
					success: function(res){
						document.getElementById('fam-lista').innerHTML = res;
					},
					error: function(){
						$("#fam-lista").html("Error Cargando Listado de Familias");
					}
				});				
		});

		$("#btnBusFamilia").click(function(){

			if($("#cbofamilias").change){
			var combo = $("#cbofamilias").val();
				//alert(combo);
				var lista3 = {
					"codigo" : 3,
					"idfamilia"  : combo
					};
					$.ajax({
						url: '../Controllers/buscarxnombre.controller.php',
						type: 'POST',
						data: lista3,
						success: function(res){
							$("#respuesta").html(res);
						},
						error: function(res) {
							$("#respuesta").html(res);
						}
					});

					Limpiar();
					return false;
			}

		});

		$("#btnBuscar").click(function(){

			var text1 = $("#xnombre").val();
			var text2 = $("#xserie").val();

			if(text1 == ""){

				if(text2 == ""){

					alert("Ingresar un nombre o Numero de serie");
					$("#xnombre").css("background-color", "yellow");
					$("#xnombre").focus();
				}else{

					$("#xnombre").val("");
					$("#xnombre").css("background-color","white");

					var lista2 = {
					"codigo" : 2,
					"serie"  : text2
					};
					$.ajax({
						url: '../Controllers/buscarxnombre.controller.php',
						type: 'POST',
						data: lista2,
						success: function(res){
							$("#respuesta").html(res);
						},
						error: function(res) {
							$("#respuesta").html(res);
						}
					});

					Limpiar();
					return false;

				}

			}else{

				$("#xnombre").css("background-color","white");


				$("#xserie").val("");

				var lista = {
					"codigo" : 1,
					"nombre" : text1
				};
				$.ajax({
					url: '../Controllers/buscarxnombre.controller.php',
					type: 'POST',
					data: lista,
					success: function(res){
						$("#respuesta").html(res);
					},
					error: function(res) {
						$("#respuesta").html(res);
					}
				});

				Limpiar();
				return false;

			}

		});

		$("#btnLimpiar").click(function(){
			Limpiar();
		});


	});

	function Limpiar() {
		var text1 = $("#xnombre").val("");
		var text2 = $("#xserie").val("");
		$("#xnombre").focus();
	}
</script>

<div class="container">

	<!-- Fila para encabezados de busqueda -->
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<form action="" method="POST" class="form-inline" role="form" name="search_datos">

				<div class="form-inline">

						<label for="inputFamilias" class="col-sm-1 control-label">Familias:</label>

						<div id="fam-lista"></div>
						<button type="button" class="" name="btnmostrar" id="btnmostrar"></button>
						<button type="button" class="btn btn-danger" name="btnBusFamilia" id="btnBusFamilia">Buscar x Familia</button>
				</div>
	
				<div class="form-inline">
						<input type="text" class="form-control" name="xnombre" id="xnombre" placeholder="Busca x Nombre">
						<input type="text" class="form-control" name="xserie" id="xserie" placeholder="Buscar x Serie">

						<button type="button" class="btn btn-success" name="btnBuscar" id="btnBuscar">Buscar</button>
						<button type="button" class="btn btn-primary" name="btnLimpiar" id="btnLimpiar">Limpiar</button>

				</div>

			</form>
		</div>
	</div>

	<br>


	<!-- Fila para Tabla de Resultados -->
	<div class="row">

		<div id="respuesta">Esperando Datos para la busqueda. <img src="../img/loading.gif" alt="">	</div>

	</div>
</div>
