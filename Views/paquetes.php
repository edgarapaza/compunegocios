<?php require_once "header4.php"; ?>
	<style type="text/css">
		#caja_busqueda11 /*estilos para la caja principal de busqueda*/
		{
		width:400px;
		height:25px;
		border:solid 2px #979DAE;
		font-size:16px;
		}
		#display /*estilos para la caja principal en donde se puestran los resultados de la busqueda en forma de lista*/
		{
		width:400px;
		display:none;
		overflow:hidden;
		z-index:10;
		border: solid 1px #666;
		}
		.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
		{
		padding:2px;
		padding-left:6px; 
		font-size:18px;
		height:63px;
		text-decoration:none;
		color:#3b5999; 
		}

		.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
		{
		background: #7f93bc;
		color: #FFF;
		}
		.desc
		{
		color:#666;
		font-size:16;
		}
		.desc:hover
		{
		color:#FFF;
		}

	/* Easy Tooltip */
	</style>

	<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
	

	<script type="text/javascript">
		$(document).ready(function(){

			//$('#oculto').css('display', 'block');

			$(".busca").keyup(function() //se crea la funcioin keyup
			{
				var texto = $(this).val();
				var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a searchProductos.php
				if(texto=='')
				{
				}
				else
				{
					$.ajax({
						type : "POST",
						url  : "searchProductos.php",
						data : dataString,
						cache: false,
						success: function(html)//funcion que se activa al recibir un dato
						{
							$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
						}
					});
				}
				
			});

			$("#btnAgregarProd").click(function(){
			   alert("press");
			  //var idprod   = $("#inputNombres").val();
			  var idprod   = 6545;
			  var parametros = {
					"id"	: idprod
				};
				$.ajax({
					data: parametros,
					url : '../Controllers/paquete.controller.php',
					type: 'POST',
					success: function(res){
						$("#display2").html(res);
					},
					
					error: function(response){
						$("#display2").html("Error " + response);
					}
				})

			});


			return false;
		});

	</script>


<div class="container">
	
	<div class="row">

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	
			<form action="usuario_completo.php" method="GET" class="form-inline" role="form">
				<div class="form-group" style="width:350px; padding-left:3px;">
					Buscardor: 
					<input type="text" class="busca form-control" id="caja_busqueda" name="clave" placeholder="Buscador" /> <br>

					<div id="display"></div>
					
				</div>
			</form>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div id="display2"></div>
		</div>

	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<iframe src="paquetesAgregados.php" width="100%" height="400px"></iframe>
		</div>
	</div>
</div>





<?php require_once "footer4.html"; ?>