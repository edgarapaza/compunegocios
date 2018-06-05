$(document).ready(function()
{	
	$("#btnNuevoPaquete").click(function() {
		alert("Por favor - presionar la tecla F5, despues de presionar el Boton.  Nuevo codigo de Grupo Creado");

		$.ajax({
			type : "POST",
			url  : "../Controllers/paqueteNuevo.controller.php",
						
			success:  function(data){
				$("#result").html(data);
							
			},
			error: function(response){
				$("#result").html("Error guardando" + response);
			}
		});
		
		return false;
	});

});