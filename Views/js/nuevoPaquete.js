$(document).ready(function()
{	
	$("#btnNuevoPaquete").click(function() {

		$.ajax({
			type : "POST",
			url  : "../Controllers/paqueteNuevo.controller.php",
						
			success:  function(data){
				alert("Todo bien");
							
			},
			error: function(response){
				alert("Hubo un error");
			}
		});
		
		return false;
	});

});