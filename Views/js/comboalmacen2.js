$(document).ready(function(){

	window.addEventListener('load',carga, false);

		function carga(){

			$("#btnMostrarCombo").trigger('click');

		}


	$("#btnMostrarCombo").click(function(){
		//Mostrar el combo solamente

		$.ajax({
			url: './../Controllers/almacenes.controller.php',
			type: 'POST',

			success: function(res){
						document.getElementById('combo1').innerHTML = res;
					},
			error: function(){
						$("#combo1").html("Error 1");
					}
		})

	});

	$("#btnConsulta").click(function(){

		var dato = $("#inputAlmacen").val();


		if(dato == "all")
		{

			$.ajax({
			url: './../Controllers/almacenLista1.controller.php',
			type: 'POST',

			success: function(res){
						document.getElementById('tablaDatos').innerHTML = res;
					},
			error: function(){
						$("#tablaDatos").html("Error consultando");
					}
			})
		}

		if(dato > 0)
		{
			$.ajax({
			url:'./../Controllers/almacenLista2.controller.php',
			type: 'POST',
			data: {cod: dato},
			success: function(res){
						document.getElementById('tablaDatos').innerHTML = res;
					},
			error: function(){
						$("#tablaDatos").html("Error mostrando datos");
					}
			})
		}


	});

	$("#btnmostrar").click(function(){

				$.ajax({
					type : 'POST',
					url  : './../Controllers/listafamilia.controller.php',
					beforeSend: function(){
						$('#fam-lista').html("<img src='img/load.gif'>");
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
						url: './../Controllers/buscarxnombreMover.controller.php',
						type: 'POST',
						data: lista3,
						success: function(res){
							$("#tablaDatos").html(res);
						},
						error: function(res) {
							$("#tablaDatos").html(res);
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
						url: './../Controllers/buscarxnombreMover2.controller.php',
						type: 'POST',
						data: lista2,
						success: function(res){
							$("#tablaDatos").html(res);
						},
						error: function(res) {
							$("#tablaDatos").html(res);
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
					url: './../Controllers/buscarxnombreMover2.controller.php',
					type: 'POST',
					data: lista,
					success: function(res){
						$("#tablaDatos").html(res);
					},
					error: function(res) {
						$("#tablaDatos").html(res);
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
