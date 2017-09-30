$(document).ready(function(){

	$('#serie').focus();

	$('#serie').on('keyup', function(){
		var serie = $('#serie').val();

		$.ajax({
			type: 'POST',
			url: "../Models/search.php",
			data: {'serie': serie},
			beforeSend: function(){
				$('#result').html('<img src="img/loading-2.gif">');
			},
			success: function(resultado) {
				$('#result').html(resultado);
			},
			error: function(){
				console.log("Articulo no Encontrado");
			}
		});

	});

	$("#mostrar").on( "click", function() {
		$('.target').show(); //muestro mediante clase
	 });
	$("#ocultar").on( "click", function() {
		$('.target').hide(); //muestro mediante clase
	});


	$('#cargarLista').click(function(){

	  $.ajax({
	    type: "POST",
	    url: '../Models/listadoFamilias.model.php',
	    dataType: "json",
	    success: function(data){
	      $.each(data,function(key, registro) {
	        $("#listado1").append('<option value='+registro.IDfamilia+'>'+registro.familia+'</option>');
	      });
	    },
	    error: function(data) {
	      alert('error');
	    }
	  });

	});

});
