<?php
session_start();
$personal = $_SESSION['administrador'];

	require_once "Models/nuevoProducto.class.php";
	$producto = new Producto();
	$familia  = $producto->Familias();
	$prov     = $producto->Proveedor();
	$marca    = $producto->Marca();
	$unidad   = $producto->Unidades();
	$almacen  = $producto->Almacen();
	$subfam   = $producto->SubFamilias();

	$ultimo = $producto->UltimoCodigo();

	$porciones = explode("-", $ultimo[0]);
	#echo "porcion 1: ".$porciones[0]."<br>";
	#echo "porcion 2: ".$porciones[1]."<br>";
	$next = $porciones[1] + 1;

	$codigo = "CN-". $next;

?>

	<script type="text/javascript">

		$(document).ready(function(){

			$("#btnCalcular").click(function(){
				var precio = $("#inputPrecioUnitario").val();
				var margen1 = $("#inputMargenGanancia1").val();
				var margen2 = $("#inputMargenGanancia2").val();
				var margen3 = $("#inputMargenGanancia3").val();

				var cal1 = (margen1 / 100) + 1;
				var cal2 = (margen2 / 100) + 1;
				var cal3 = (margen3 / 100) + 1;

				var pv1 = precio * cal1;
				var pv2 = precio * cal2;
				var pv3 = precio * cal3;

				document.getElementById("inputPrecioVenta1").value = pv1.toFixed(2);
				document.getElementById("inputPrecioVenta2").value = pv2.toFixed(2);
				document.getElementById("inputPrecioVenta3").value = pv3.toFixed(2);
			});


			var cantid;

			$("#btnCargar").click(function(event) {
				cantid = document.getElementById('inputCantidad').value;

				for (var i = 1; i <= cantid; i++) {
					var newelem = '<input type="text" name="serie" id="serie" class="form-control" required="required">';

					$('#eventos').append(i + newelem);
				}
			});

			/***************************************************************************************************
			**   OBTENER LOS VALORES DE TABLA   ****************
			***************************************************************************************************/


			$("#btnRegistrar").click(function(){
				var provedor   = $("#inputProvedor").val();
				var idfamilia  = $("#inputFamilia").val();
				var subfamilia = $("#inputSubfamilia").val();
				var mimarca  = $("#inputMimarca").val();
				var tipuni   = $("#inputTipoUnidad").val();
				var tipart   = $("#inputTipoArticulo").val();
				var almacen  = $("#inputAlmacen").val();
				var numfact  = $("#inputnumFactura").val();
				var fechaemi = $("#inputFechaEmision").val();
				var producto = $("#inputproducto").val();
				var partee  = $("#inputNumparte").val();
				var descr   = $("#inputDescripcion").val();
				var model   = $("#inputModelo").val();
				var preuni  = $("#inputPrecioUnitario").val();
				var marge1  = $("#inputMargenGanancia1").val();
				var marge2  = $("#inputMargenGanancia2").val();
				var marge3  = $("#inputMargenGanancia3").val();
				var preven1 = $("#inputPrecioVenta1").val();
				var preven2 = $("#inputPrecioVenta2").val();
				var preven3 = $("#inputPrecioVenta3").val();
				var cantida = $("#inputCantidad").val();
				var color   = $("#inputColor").val();
				var inclu   = $("#inputIncluye").val();
				var obser   = $("#inputObservaciones").val();
				var idpers  = $("#idpersonal").val();
				var cod     = $("#idcodigo").val();

				for (var i = 0; i <= cantida -1 ; i++) {

					var textserie = document.getElementsByName("serie")[i].value;

					var parametros = {
						"provedor": provedor,
						"factura" : numfact,
						"fecha"   : fechaemi,
						"producto": producto,
						"partee"  : partee,
						"descr"   : descr,
						"model"   : model,
						"preuni"  : preuni,
						"marge1"  : marge1,
						"marge2"  : marge2,
						"marge3"  : marge3,
						"preven1" : preven1,
						"preven2" : preven2,
						"preven3" : preven3,
						"cantida" : cantida,
						"color"   : color,
						"inclu"   : inclu,
						"obser"   : obser,
						"idpers"  : idpers,
						"famil"   : idfamilia,
						"subfam"  : subfamilia,
						"mimarca" : mimarca,
						"tipuni"  : tipuni,
						"tipart"  : tipart,
						"preuni"  : preuni,
						"almacen" : almacen,
						"cod"     : cod,
						"varserie": textserie

			        };

					$.ajax({
		                data : parametros,
		                url  : 'Controllers/nuevoProducto.controller.php',
		                type : 'POST',
		                beforeSend: function () {
		                    //alert(varserie.value);
		                    $("#resultado").html("Procesando, espere por favor...");
		                },
		                success:  function (data) {

		                    $("#resultado").html(data);
		                }
			        });
				}

			});

		});
	</script>

<div class="container-fluid">
	<div id="row">
		<div class="col-md-8">
			<form action="" method="POST" class="form-horizontal" role="form" id="formulario">

				<div class="form-group row">
					<div class="col-sm-10">
						<button type="button" id="btnRegistrar" class="btn btn-lg btn-primary">Guardar</button>
						<a href="inicio.html">Cancelar</a>
						<div id="resultado"></div>
					</div>
				</div>

					<div class="form-group row">
						<legend>Registro de Productos</legend>
					</div>

				<input type="hidden" name="idpersonal" id="idpersonal" value="1001">
				<input type="text" readonly="readonly" name="codigo" id="idcodigo" value="<?php echo $codigo; ?>" >

				<div class="form-group row">
					<label for="inputProvedor" class="col-sm-3 col-form-label">*Provedor:</label>
					<div class="col-sm-8">
						<select name="codproveedor" id="inputProvedor" class="form-control" required="required">
							<?php while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) { ?>

							<option value="<?php echo $listaprov['idproveedor'];  ?>"><?php echo $listaprov['razonSocial'];  ?></option>
							<?php } ?>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputNumFactura" class="col-sm-3 col-form-label">Num. Factura:</label>
					<div class="col-sm-8">
						<input type="text" name="numFactura" id="inputnumFactura" class="form-control" required="required">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputFechaemision" class="col-sm-3 col-form-label">Fecha Emision:</label>
					<div class="col-sm-8">
						<input type="date" name="fechaEmision" id="inputFechaEmision" class="form-control">
					</div>
				</div>

				<hr>

				<div class="form-group row">
					<label for="inputProducto" class="col-sm-3 col-form-label">*Producto:</label>
					<div class="col-sm-8">
						<input type="text" name="producto" id="inputproducto" class="form-control" required="required" placeholder="Laptop, Memoria USB, Monitor, etc.">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputNumparte" class="col-sm-3 col-form-label">Numero de Parte:</label>
					<div class="col-sm-8">
						<input type="text" name="numparte" id="inputNumparte" class="form-control" required="required" placeholder="Parte">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputFamilia" class="col-sm-3 col-form-label">*Familia:</label>
					<div class="col-sm-8">
						<select name="familia" id="inputFamilia" class="form-control" required="required">

							<?php while ($listafamilia = $familia->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
							<?php } ?>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputSubfamilia" class="col-sm-3 col-form-label">Subfamilia:</label>
					<div class="col-sm-8">
						<select name="subfamilia" id="inputSubfamilia" class="form-control" required="required">
							<?php while ($listaSubFam = $subfam->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value="<?php  echo $listaSubFam['idsubfamilias'];?>"><?php  echo $listaSubFam['subfamilia'];?></option>
							<?php } ?>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputMimarca" class="col-sm-3 col-form-label">Marca:</label>
					<div class="col-sm-8">
						<select name="mimarca" id="inputMimarca" class="form-control" required="required">
							<?php while ($listamarca = $marca->fetch_array()) { ?>
							<option value="<?php echo $listamarca[0];?>"><?php echo $listamarca[1]; ?></option>
							<?php } ?>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputDescripcion" class="col-sm-3 col-form-label">Descripcion:</label>
					<div class="col-sm-9">
						<input type="text" name="Descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Breve descripcion del producto">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputModelo" class="col-sm-3 col-form-label">Modelo:</label>
					<div class="col-sm-9">
						<input type="text" name="modelo" id="inputModelo" class="form-control" required="required" placeholder="Indique el Modelo">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputTipoUnidad" class="col-sm-3 col-form-label">Tipo Unidad:</label>
					<div class="col-sm-8">
						<select name="tipoUnidad" id="inputTipoUnidad" class="form-control" required="required">
							<option value="28">Unidad</option>
							<?php while ($listaunidad = $unidad->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value="<?php echo $listaunidad['idunidad']; ?>"><?php echo $listaunidad['unidadMedida']; ?></option><?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputTipoArticulo" class="col-sm-3 col-form-label">TipoArticulo:</label>
					<div class="col-sm-8">
						<select name="tipoArticulo" id="inputTipoArticulo" class="form-control" required="required">
							<option value="Simple" selected>Simple</option>
							<option value="Compuesto">Compuesto</option>
							<option value="Servicio">Servicio</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputPrecioUnitario" class="col-sm-3 col-form-label">PrecioUnitario:</label>
					<div class="col-sm-5">
						<input type="number" name="precioUnitario" id="inputPrecioUnitario" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputMargenGanancia" class="col-sm-3 col-form-label">MargenGanancia:</label>
					<div class="col-sm-2">
						<input type="text" name="margenGanancia1" id="inputMargenGanancia1" class="form-control" value="8" required="required">
					</div>
					<div class="col-sm-2">
						<input type="text" name="margenGanancia2" id="inputMargenGanancia2" class="form-control" value="10" required="required">
					</div>
					<div class="col-sm-2">
						<input type="text" name="margenGanancia3" id="inputMargenGanancia3" class="form-control" value="12" required="required">
					</div> %
					<button type="button" id="btnCalcular" class="btn btn-sm btn-success">Calcular</button>
				</div>

				<div class="form-group row">
					<label for="inputPrecioVenta" class="col-sm-3 col-form-label">PrecioVenta:</label>
					<div class="col-sm-3">
						<input type="text" name="precioVenta1" id="inputPrecioVenta1" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
					</div>
					<div class="col-sm-3">
						<input type="text" name="precioVenta2" id="inputPrecioVenta2" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
					</div>
					<div class="col-sm-3">
						<input type="text" name="precioVenta3" id="inputPrecioVenta3" class="form-control" required="required" step="0.01" min="1" max="9999999" placeholder="0.00">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputCantidad" class="col-sm-3 col-form-label">Cantidad:</label>
					<div class="col-sm-4">
						<input type="number" name="cantidad" id="inputCantidad" class="form-control" required="required" placeholder="Num">
					</div><button type="button" id="btnCargar" class="btn btn-md btn-warning"> Crear Casilleros</button>
				</div>

				<div class="form-group row">
					<label for="inputAlmacen" class="col-sm-3 col-form-label">Almacen:</label>
					<div class="col-sm-8">
						<select name="idalmacen" id="inputAlmacen" class="form-control" required="required">
							<option>[Seleccionar]</option>
							<?php while ($listaalmacen = $almacen->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value="<?php echo $listaalmacen['idtienda']; ?>"><?php  echo $listaalmacen['descripcion'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputColor" class="col-sm-3 col-form-label">Color:</label>
					<div class="col-sm-8">
						<input type="text" name="color" id="inputColor" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputIncluye" class="col-sm-3 col-form-label">Incluye:</label>
					<div class="col-sm-9">
						<input type="text" name="incluye" id="inputIncluye" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputObservaciones" class="col-sm-3 col-form-label">Observaciones:</label>
					<div class="col-sm-9">
						<input type="text" name="observaciones" id="inputObservaciones" class="form-control">
					</div>
				</div>
			</form>
		</div>

		<div class="col-md-4 marco1">
			<div id="eventos"><legend>Numeros de Serie</legend></div>
		</div>
	</div>
</div>
