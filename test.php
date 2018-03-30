<?php include "header.php"; ?>

<script type="text/javascript">
		var lista = new Array();
	
	function agregar(){
		var dato = document.getElementById('inputValor').value;
		alert(dato);
		lista.push(dato);
	}

	function imprimir(){
		for (var i = 0; i < lista.length; i++) {
			alert(lista[i]);
		}
	}

	function NuevoItem(){

	}
</script>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form action="" method="POST" role="form">
						<legend>Form title</legend>

						<div class="form-group">
							<label for="inputValor" class="col-sm-2 control-label">Valor:</label>
							<div class="col-sm-10">
								<input type="text" name="valor" id="inputValor" class="form-control"value="" required="required">
							</div>
						</div>
					
						
						<button type="button" name="btnagregar" id="btnagregar" class="btn btn-primary"  onclick="agregar();">Submit</button>

						<button type="button" class="btn btn-default" name="btnver" id="btnver" onclick="imprimir();">button</button>
					</form>	
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<div id="nuevo"></div>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

<?php include "footer.php"; ?>