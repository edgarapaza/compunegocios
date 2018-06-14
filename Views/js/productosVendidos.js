$(document).ready(function(){

	//Boton Buscar por serie

	$("#btnBuscarSerie").click(function(){

		var num_serie   = $("#numserie").val();
		var parametros = {"minumserie"	: num_serie};

			$.ajax({
				data : parametros,
				type : "POST",
				url  : "../Controllers/productosVendidos.controller.php",

				beforeSend: function(){
					$("#result").html("Cargando...");
				},
				success:  function(data){
					$("#result").html(data);
					$("#miformulario")[0].reset();
				},
				error: function(res){
					$("#result").html("Ningun Resultado o el Numero de Serie no existe en la Base de Datos. " + res);
				}
			});
		
	});



	$("#btnBuscarFecha").click(function(){

		var fechaElegida   = $("#fecha").val();
		var parametros = {"fechabusqueda"	: fechaElegida};

			$.ajax({
				data : parametros,
				type : "POST",
				url  : "../Controllers/productosVendidosF.controller.php",

				beforeSend: function(){
					$("#result").html("Cargando...");
				},
				success:  function(data){
					$("#result").html(data);
					$("#miformulario")[0].reset();
				},
				error: function(res){
					$("#result").html("Ningun Resultado o el Numero de Serie no existe en la Base de Datos. " + res);
				}
			});

	});

});
