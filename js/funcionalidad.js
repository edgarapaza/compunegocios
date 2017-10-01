$(document).ready(function(){

	$("#btnalmacen").click(function(){
		var personal = $("#idpersonal").val();
		var tienda = $("#inputTienda").val();
		var direccion = $("#inputDireccion").val();
		var ubicacion = $("#inputDescripcion").val();
		var telefono = $("#inputTelefono").val();
		if(personal == ""){
			personal = '1001';
		}

		var lista = {
			"personal" : personal,
			"tienda"   : tienda,
			"direccion": direccion,
			"ubicacion": ubicacion,
			"telefono" : telefono
		};

		$.ajax({
			data: lista,
			url: '../Controllers/nuevoAlmacen.controller.php',
			type: 'POST',
			beforeSend: function(){
				$("#respuesta").html = "Procesando datos ... Espere";
			},
			success: function(response){
				$("#respuesta").html(response);
			},
			error: function(response){
				$("#respuesta").html("Error" + response);
			}
		});

	});


});