<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url : 'Controllers/listadoCliente.controller.php',
			beforeSend: function(){
				$("#result").html("Buscando");
			},
			success: function(response){
				$("#result").html(response);
			}
		});
	});

</script>

<div class="container">
	<div class='row'>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    	<h3>Listado de clientes</h3>
			<div class="table-responsive">
				<table class="table table-hover">
					<tbody>
						<div id="result"></div>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>