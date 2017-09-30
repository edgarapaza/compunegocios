<?php
include "../public/Models/listadoFamilias.model.php";
$fami = new ListadoFamilias();
$lista = $fami->Familias();


?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#ver1").on(click, function(){
			var
			alert("aqui");
		});
	});
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3>Lista de familias</h3>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Num</th>
						<th>Familia</th>
						<th>Mostrar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					while ($fila = $lista->fetch_array()) { ?>

					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $fila[1]; ?></td>
						<td></td>
					</tr>
					<?php i++;} ?>
				</tbody>
			</table>


			<button type="button" class="btn btn-success">Nueva Familia</button>
		</div>
		<div class="col-md-6">
			<h3>Lista de Sub Familias</h3>
		</div>
	</div>
</div>