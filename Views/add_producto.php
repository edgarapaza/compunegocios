<?php include_once "header.php";
require_once "../Models/add_producto.class.php";
$producto = new Producto();
$familia = $producto->Familias();
$prov = $producto->Proveedor();
$marca = $producto->Marca();
$unidad = $producto->Unidades();

?>
<br>
	<div class="container">
  		<div class="row">
  			<div class="col-md-8 bg-info">

				<form action="" method="POST" class="form-horizontal" role="form">
						<div class="form-group">
							<legend>Registro de Productos</legend>
						</div>

						<div class="form-group">
							<label for="inputNumserie" class="col-sm-2 control-label">Numserie:</label>
							<div class="col-sm-6">
								<input type="text" name="numserie" id="inputNumserie" class="form-control" value="" required="required" pattern="" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputProvedor" class="col-sm-2 control-label">Provedor:</label>
							<div class="col-sm-6">
								<select name="provedor" id="inputProvedor" class="form-control" required="required">
									<?php while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) { ?>


									<option value="<?php echo $listaprov['idproveedor'];  ?>"><?php echo $listaprov['razonSocial'];  ?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default">Nuevo Proveedor</button>
						</div>


						<div class="form-group">
							<label for="inputFamilia" class="col-sm-2 control-label">Familia:</label>
							<div class="col-sm-6">
								<select name="familia" id="inputFamilia" class="form-control" required="required">

									<?php while ($listafamilia = $familia->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default">Nueva Familia</button>
						</div>

						<div class="form-group">
							<label for="inputSubfamilia" class="col-sm-2 control-label">Subfamilia:</label>
							<div class="col-sm-6">
								<select name="subfamilia" id="inputSubfamilia" class="form-control" required="required">

								</select>
							</div>
							<button type="button" class="btn btn-default">Nueva Sub Familia</button>
						</div>

						<div class="form-group">
							<label for="inputMarca" class="col-sm-2 control-label">Marca:</label>
							<div class="col-sm-4">
								<select name="marca" id="inputMarca" class="form-control" required="required">
									<option value="0">Seleccionar</option>
									<?php while ($listamarca = $marca->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listamarca['idmarca']; ?>"><?php echo $listamarca['marca']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="inputNumfactura" class="col-sm-2 control-label">Numfactura:</label>
							<div class="col-sm-6">
								<input type="number" name="numfactura" id="inputNumfactura" class="form-control" value="min="{6" min="{6"} max="" step="" required="required" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputFechaemision" class="col-sm-2 control-label">Fecha Emision:</label>
							<div class="col-sm-3">
								<input type="date" name="fechaEmision" id="inputFechaEmision" class="form-control" value="" required="required" title="Fecha">
							</div>
						</div>

						<div class="form-group">
							<label for="inputDescripcion" class="col-sm-2 control-label">Descripcion:</label>
							<div class="col-sm-10">
								<input type="text" name="Descripcion" id="inputDescripcion" class="form-control" value="" required="required" pattern="" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputTipoUnidad" class="col-sm-2 control-label">Tipo Unidad:</label>
							<div class="col-sm-3">
								<select name="tipoUnidad" id="inputTipoUnidad" class="form-control" required="required">
									<option value="0">[Selecciona]</option>
									<?php while ($listaunidad = $unidad->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listaunidad['idunidad']; ?>"><?php echo $listaunidad['unidadMedida']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="inputCantidad" class="col-sm-2 control-label">Cantidad:</label>
							<div class="col-sm-10">
								<input type="number" name="cantidad" id="inputCantidad" class="form-control" value="min="{6" min="{6"} max="" step="" required="required" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPrecioUnitario" class="col-sm-2 control-label">PrecioUnitario:</label>
							<div class="col-sm-3">
								<input type="number" name="precioUnitario" id="inputPrecioUnitario" class="form-control" value="min="{6" min="{6"} max="" step="" required="required" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputMargenGanancia" class="col-sm-2 control-label">MargenGanancia:</label>
							<div class="col-sm-3">
								<input type="text" name="margenGanancia" id="inputMargenGanancia" class="form-control" value="10%" max="" step="" required="required" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPrecioVenta" class="col-sm-2 control-label">PrecioVenta:</label>
							<div class="col-sm-3">
								<input type="number" name="precioVenta" id="inputPrecioVenta" class="form-control" value="min="{6" min="{6"} max="" step="" required="required" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputModelo" class="col-sm-2 control-label">Modelo:</label>
							<div class="col-sm-10">
								<input type="text" name="modelo" id="inputModelo" class="form-control" value="" required="required" pattern="" title="">
							</div>
						</div>

						<div class="form-group">
							<label for="inputTipoArticulo" class="col-sm-2 control-label">TipoArticulo:</label>
							<div class="col-sm-2">
								<select name="tipoArticulo" id="inputTipoArticulo" class="form-control" required="required">
									<option value="Simple">Simple</option>
									<option value="Compuesto">Compuesto</option>
									<option value="Servicio">Servicio</option>
								</select>
							</div>
						</div>



						<img src="#" class="img-responsive" alt="Image">








						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
				</form>

  			</div>

			<div class="col-md-4">Aside</div>

  		</div>
  	</div>


