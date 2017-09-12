$(document).ready(function(){

	$('#serie').focus();

	$('#serie').on('keyup', function(){
		var serie = $('#serie').val();
		console.log(serie);
		$.ajax({
			type: 'POST',
			url: '../Models/search.php',
			data: {'serie': serie},
			beforeSend: function(){
				$('#result').html('img src="../img/loading-2.gif">');
			},
			success: function(resultado) {
				$('#result').html(resultado);
			},
			error: function(){
				console.log('Articulo no encontrado');
			}
		});


	});

})