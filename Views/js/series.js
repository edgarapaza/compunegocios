$(document).ready(function() {

	$("#inputSerieCantidad").change(function(event) {
		
		var opt = $("#inputSerieCantidad").val();
		
		if(opt == "Multiples")
		{
			$("#btnCargar").show();
			$('#unicaSerie').empty();
		}

		if(opt == "Unico")
		{
			$("#btnCargar").hide();
			var newelem = '<input type="text" name="serie" id="serie" class="form-control" required="required" placeholder="Numero de Serie">';

			$('#unicaSerie').append(newelem);
		}
		
	});
		
})
