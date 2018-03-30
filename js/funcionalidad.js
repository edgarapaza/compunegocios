$(document).ready(function(){

	$("#btnNuevocliente").click(function(e){
		e.preventDefault();

		var nombres   = $("#inputNombres").val();
		var apellidos = $("#inputApellidos").val();
		var dni       = $("#inputDni").val();
		var direccion = $("#inputDireccion").val();
		var telefono  = $("#inputTelefono").val();
		var fecnac    = $("#inputFechaNac").val();
		var email     = $("#inputEmail").val();

		var parametros = {
			"nombres"	: nombres,
			"apellidos" : apellidos,
			"dni" 		: dni,
			"direccion" : direccion,
			"telefono" 	: telefono,
			"fecnac" : fecnac,
			"email" 	: email
		};
		$.ajax({
			data : parametros,
			type : "POST",
			url  : "../Controllers/cliente.controller.php",
			beforeSend: function(){
				$("#result").html("<img src='../img/load.gif'>");
			},
			success:  function(data){
				$("#result").html(data);
				$("#form-cliente")[0].reset();
			},
			error: function(response){
				$("#result").html("Error guardando" + response);
			}
		});

		return false;
	});

});