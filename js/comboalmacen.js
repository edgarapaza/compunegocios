$(document).ready(function(){

	window.addEventListener('load',carga, false);

		function carga(){

			$("#btnMostrarCombo").trigger('click');

		}


	$("#btnMostrarCombo").click(function(){
		//Mostrar el combo solamente
		$.ajax({
			url: '../Controllers/almacenes.controller.php',
			type: 'POST',
			
			success: function(res){
						document.getElementById('combo1').innerHTML = res;
					},
			error: function(){
						$("#combo1").html("Error Cargando Listado de Marcas");
					}
		})
		
	});

	$("#btnConsulta").click(function(){
		
		var dato = $("#inputAlmacen").val();
			

		if(dato == "all")
		{
					
			$.ajax({
			url: '../Controllers/almacenLista1.controller.php',
			type: 'POST',
			
			success: function(res){
						document.getElementById('tablaDatos').innerHTML = res;
					},
			error: function(){
						$("#tablaDatos").html("Error Cargando Listado de Marcas");
					}
			})
		}

		if(dato > 0)
		{
			$.ajax({
			url: '../Controllers/almacenLista2.controller.php',
			type: 'POST',
			data: {cod: dato},
			success: function(res){
						document.getElementById('tablaDatos').innerHTML = res;
					},
			error: function(){
						$("#tablaDatos").html("Error Cargando Listado de Marcas");
					}
			})
		}


	});


});
