<?php
	require_once "Models/nuevoProducto.class.php";
	$producto = new Producto();
	$fams  = $producto->Familias();

?>

<form action="Controllers/nuevaSubFamilia.controller.php" method="POST" class="form-horizontal" role="form" id="formFamilia">
	<div class="form-group">
		<legend>Agregar Sub Familia</legend>
	</div>

	<div class="form-group">
		<label for="inputFamilia" class="col-sm-2 control-label">Familia a la que pertence:</label>
		<div class="col-sm-6">
			<select name="familia" id="inputFamilia" class="form-control" required="required">

				<?php while ($listafamilia = $fams->fetch_array(MYSQLI_ASSOC)) { ?>
				<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
				<?php } ?>
			</select>
		</div>

	</div>

	<div class="form-group">
		<label for="inputCodigosub" class="col-sm-2 control-label">Codigo:</label>
		<div class="col-sm-6">
			<input type="text" name="codigosub" id="inputCodigosub" class="form-control" required="required" placeholder="Codigo 3 letras *">
		</div>
	</div>
	<div class="form-group">
		<label for="inputSubFamilia" class="col-sm-2 control-label">Nueva Sub Familia:</label>
		<div class="col-sm-6">
			<input type="text" name="subfamilia" id="inputSubFamilia" class="form-control" required="required" placeholder="Nombre Familia *">
		</div>
	</div>

	<button type="submit" class="btn btn-primary" id="btnGuardarSubFamilia">Guardar</button>
	<a href="#">Cancelar</a>
</form>