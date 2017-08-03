<?php
session_start();
if(isset($_SESSION['administrador']))
{
require_once "headerLogin.php";

require_once "Models/nuevoProducto.class.php";
$producto = new Producto();
$familia  = $producto->Familias();
$prov     = $producto->Proveedor();
$marca    = $producto->Marca();
$unidad   = $producto->Unidades();
$almacen  = $producto->Almacen();
$subfam   = $producto->SubFamilias();

?>
	<script type="text/javascript" src="js/acciones.js"></script>
	<script type="text/javascript" src="js/operaciones.js"></script>

	<div class="container">
  		<div class="row">
  			<div class="col-md-8">

				<form action="Controllers/nuevoProducto.php" method="POST" class="form-horizontal" role="form" id="formulario">
						<div class="form-group">
							<legend>Registro de Productos</legend>


							<div class="alert alert-success respuesta"  style="display: none;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Guardado</strong> correctamente ...
							</div>
						</div>

						<input type="text" name="idpersonal" value="<?php echo $_SESSION['administrador'];?>">

						<div class="form-group">
							<label for="inputProvedor" class="col-sm-3 control-label">Provedor:</label>
							<div class="col-sm-6">
								<select name="codproveedor" id="inputProvedor" class="form-control" required="required">
									<?php while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) { ?>

									<option value="<?php echo $listaprov['idproveedor'];  ?>"><?php echo $listaprov['razonSocial'];  ?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default" id="btnNewProveedor">Nuevo Proveedor</button>
						</div>

						<input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo $_SESSION['administrador'];?>">

						<div class="form-group">
							<label for="inputNumFactura" class="col-sm-3 control-label">Num. Factura:</label>
							<div class="col-sm-6">
								<input type="text" name="numFactura" id="inputnumFactura" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label for="inputFechaemision" class="col-sm-3 control-label">Fecha Emision:</label>
							<div class="col-sm-4">
								<input type="date" name="fechaEmision" id="inputFechaEmision" class="form-control">
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label for="inputProducto" class="col-sm-3 control-label">Producto:</label>
							<div class="col-sm-9">
								<input type="text" name="producto" id="inputproducto" class="form-control" required="required" placeholder="Laptop, Memoria USB, Monitor, etc.">
							</div>
						</div>

						<div class="form-group">
							<label for="inputNumserie" class="col-sm-3 control-label">Numero de Serie:</label>
							<div class="col-sm-9">
								<input type="text" name="numserie" id="inputNumserie" class="form-control" required="required" placeholder="Use Lector de Codigo de Barras">
							</div>
						</div>

						<div class="form-group">
							<label for="inputFamilia" class="col-sm-3 control-label">Familia:</label>
							<div class="col-sm-6">
								<select name="familia" id="inputFamilia" class="form-control" required="required">

									<?php while ($listafamilia = $familia->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default" id="btnnewfamilia">Nueva Familia</button>
						</div>

						<div class="form-group">
							<label for="inputSubfamilia" class="col-sm-3 control-label">Subfamilia:</label>
							<div class="col-sm-6">
								<select name="subfamilia" id="inputSubfamilia" class="form-control" required="required">
									<?php while ($listaSubFam = $subfam->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php  echo $listaSubFam['idsubfamilias'];?>"><?php  echo $listaSubFam['subfamilia'];?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default">Nueva Sub Familia</button>
						</div>

						<div class="form-group">
							<label for="inputMarca" class="col-sm-3 control-label">Marca:</label>
							<div class="col-sm-6">
								<select name="marca" id="inputMarca" class="form-control" required="required">
									<option value="0">Seleccionar</option>
									<?php while ($listamarca = $marca->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listamarca['idmarca']; ?>"><?php echo $listamarca['marca']; ?></option>
									<?php } ?>
								</select>
							</div>
							<button type="button" class="btn btn-default" id="btnNuevaMarca" >Nueva Marca</button>
						</div>

						<div class="form-group">
							<label for="inputDescripcion" class="col-sm-3 control-label">Descripcion:</label>
							<div class="col-sm-9">
								<input type="text" name="Descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Breve descripcion del producto">
							</div>
						</div>

						<div class="form-group">
							<label for="inputModelo" class="col-sm-3 control-label">Modelo:</label>
							<div class="col-sm-9">
								<input type="text" name="modelo" id="inputModelo" class="form-control" value="" required="required" placeholder="Indique el Modelo">
							</div>
						</div>

						<div class="form-group">
							<label for="inputTipoUnidad" class="col-sm-3 control-label">Tipo Unidad:</label>
							<div class="col-sm-3">
								<select name="tipoUnidad" id="inputTipoUnidad" class="form-control" required="required">
									<option value="28">Unidad</option>
									<?php while ($listaunidad = $unidad->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listaunidad['idunidad']; ?>"><?php echo $listaunidad['unidadMedida']; ?></option><?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="inputTipoArticulo" class="col-sm-3 control-label">TipoArticulo:</label>
							<div class="col-sm-3">
								<select name="tipoArticulo" id="inputTipoArticulo" class="form-control" required="required">
									<option value="Simple">Simple</option>
									<option value="Compuesto">Compuesto</option>
									<option value="Servicio">Servicio</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="inputPrecioUnitario" class="col-sm-3 control-label">PrecioUnitario:</label>
							<div class="col-sm-3">
								<input type="number" name="precioUnitario" id="inputPrecioUnitario" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
							</div>
						</div>

						<div class="form-group">
							<label for="inputMargenGanancia" class="col-sm-3 control-label">MargenGanancia:</label>
							<div class="col-sm-2">
								<input type="text" name="margenGanancia" id="inputMargenGanancia" class="form-control" value="10" required="required">
							</div>%

						</div>

						<div class="form-group">
							<label for="inputPrecioVenta" class="col-sm-3 control-label">PrecioVenta:</label>
							<div class="col-sm-3">
								<input type="text" name="precioVenta" id="inputPrecioVenta" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
							</div>
						</div>

						<div class="form-group">
							<label for="inputCantidad" class="col-sm-3 control-label">Cantidad:</label>
							<div class="col-sm-2">
								<input type="number" name="cantidad" id="inputCantidad" class="form-control" required="required" placeholder="Num">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAlmacen" class="col-sm-3 control-label">Almacen:</label>
							<div class="col-sm-6">
								<select name="idalmacen" id="inputAlmacen" class="form-control" required="required">
									<option>[Seleccionar]</option>
									<?php while ($listaalmacen = $almacen->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $listaalmacen['idtienda']; ?>"><?php  echo $listaalmacen['descripcion'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label for="inputPeso" class="col-sm-3 control-label">Peso:</label>
							<div class="col-sm-2">
								<input type="text" name="peso" id="inputPeso" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputSize" class="col-sm-3 control-label">Tamaño:</label>
							<div class="col-sm-2">
								<input type="text" name="tamano" id="inputSize" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAlto" class="col-sm-3 control-label">Alto:</label>
							<div class="col-sm-2">
								<input type="text" name="alto" id="inputAlto" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputLargo" class="col-sm-3 control-label">Largo:</label>
							<div class="col-sm-2">
								<input type="text" name="largo" id="inputLargo" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAncho" class="col-sm-3 control-label">Ancho:</label>
							<div class="col-sm-2">
								<input type="text" name="ancho" id="inputAncho" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputColor" class="col-sm-3 control-label">Color:</label>
							<div class="col-sm-2">
								<input type="text" name="color" id="inputColor" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputIncluye" class="col-sm-3 control-label">Incluye:</label>
							<div class="col-sm-9">
								<input type="text" name="incluye" id="inputIncluye" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="inputObservaciones" class="col-sm-3 control-label">Observaciones:</label>
							<div class="col-sm-9">
								<input type="text" name="observaciones" id="inputObservaciones" class="form-control">
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" id="btnregistrar" class="btn btn-primary">Guardar</button>
								<a href="#">Cancelar</a>
							</div>
						</div>
				</form>

  			</div>

			<div id="eventos" class="col-md-4 bg-success"><legend>Adicionales</legend></div>

  		</div>
  	</div>

<?php include "footer.php";
}else{
	header("Location: index.php");
}
?>