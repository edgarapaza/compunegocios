<?php
session_start();
if(isset($_SESSION['administrador']))
{

	require_once "Models/nuevoProducto.class.php";
	$producto = new Producto();
	$familia  = $producto->Familias();
	$prov     = $producto->Proveedor();
	$marca    = $producto->Marca();
	$unidad   = $producto->Unidades();
	$almacen  = $producto->Almacen();
	$subfam   = $producto->SubFamilias();

?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
					var newelem = '<input type="text" name="serie" id="serie" placeholder="" required="required">';

					$('#eventos').append(newelem);
				}
			});

			/***************************************************************************************************
			**   OBTENER LOS VALORES DE TABLA   ****************
			***************************************************************************************************/


			$("#btnRegistrar").click(function(){
				var btnRegistrar = $("#btnRegistrar");
				alert(btnRegistrar.text() + " Presionado");

				var prove_dor = document.getElementById('inputProvedor').value;
				var famil = document.getElementById('inputFamilia').value;
				var subfam = document.getElementById('inputSubfamilia').value;
				var mimarca = document.getElementById('inputMimarca').value;
				var tipuni = document.getElementById('inputTipoUnidad').value;
				var tipart = document.getElementById('inputTipoArticulo').value;
				var almace = document.getElementById('inputAlmacen').value;

				var factu = document.getElementById("inputnumFactura").value;
				var fecha = document.getElementById("inputFechaEmision").value;
				var produ = document.getElementById("inputproducto").value;
				var partee = document.getElementById("inputNumparte").value;
				var descr = document.getElementById("inputDescripcion").value;
				var model = document.getElementById("inputModelo").value;
				var preuni  = document.getElementById("inputPrecioUnitario").value;
				var marge1  = document.getElementById("inputMargenGanancia1").value;
				var marge2  = document.getElementById("inputMargenGanancia2").value;
				var marge3  = document.getElementById("inputMargenGanancia3").value;
				var preven1 = document.getElementById("inputPrecioVenta1").value;
				var preven2 = document.getElementById("inputPrecioVenta2").value;
				var preven3 = document.getElementById("inputPrecioVenta3").value;
				var cantida  = document.getElementById("inputCantidad").value;
				var color  = document.getElementById("inputColor").value;
				var inclu  = document.getElementById("inputIncluye").value;
				var obser  = document.getElementById("inputObservaciones").value;
				var idpers = document.getElementById("idpersonal").value;

/*
			alert(prove_dor);
			 alert(famil);
			 alert(subfam);
			 alert(mimarca);
			 alert(tipuni);
			 alert(tipart);
			 alert(almace);
			 alert(factu);
			 alert(fecha);
			 alert(produ);
			 alert(partee);
			 alert(descr);
			 alert(model);
			 alert(preuni);
			 alert(marge1);
			 alert(marge2);
			 alert(marge3);
			 alert(preven1);
			 alert(preven2);
			 alert(preven3);
			 alert(cantida);
			 alert(color);
			 alert(inclu);
			 alert(obser);
			 alert(idpers);
*/




				for (var i = 0; i <= cantida -1 ; i++) {

					var textserie=document.getElementsByName("serie")[i].value;
					alert(textserie);

					var parametros = {
						"factura" : factu,
						"fecha"   : fecha,
						"produ"   : produ,
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
						"cantida"  : cantida,
						"color"   : color,
						"inclu"   : inclu,
						"obser"   : obser,
						"idpers"  : idpers,
						"prove"   : prove_dor,
						"famil"   : famil,
						"subfam"  : subfam,
						"mimarca" : mimarca,
						"tipuni"  : tipuni,
						"tipart"  : tipart,
						"preuni"  : preuni,
						"almace"  : almace,
						"varserie"	  : textserie
			        };

					$.ajax({

		                data : parametros,
		                url  : 'Models/newproducto.class.php',
		                type : 'POST',
		                beforeSend: function () {
		                    //alert(varserie.value);
		                    $("#resultado").html("Procesando, espere por favor...");
		                },
		                success:  function (data) {
		                    //alert(varserie.value);
		                    $("#resultado").html(data);
		                }
			        });
				}

			});
				return false;

		});


	</script>

	<div class="container">
  		<div class="row">
  			<div class="col-md-8">
				<div id="resultado" class="alert alert-success respuesta"></div>
				<form action="" method="POST" class="form-horizontal" role="form" id="formulario">


					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" id="btnRegistrar" class="btn btn-lg btn-primary">Guardar</button>
							<a href="#">Cancelar</a>
						</div>
					</div>


					<div class="form-group">
						<legend>Registro de Productos</legend>
					</div>

					<input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo $_SESSION['administrador'];?>">

					<div class="form-group">
						<label for="inputProvedor" class="col-sm-3 control-label">*Provedor:</label>
						<div class="col-sm-6">
							<select name="codproveedor" id="inputProvedor" class="form-control" required="required">
								<?php while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) { ?>

								<option value="<?php echo $listaprov['idproveedor'];  ?>"><?php echo $listaprov['razonSocial'];  ?></option>
								<?php } ?>
							</select>
						</div>

					</div>

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
						<label for="inputProducto" class="col-sm-3 control-label">*Producto:</label>
						<div class="col-sm-9">
							<input type="text" name="producto" id="inputproducto" class="form-control" required="required" placeholder="Laptop, Memoria USB, Monitor, etc.">
						</div>
					</div>

					<div class="form-group">
						<label for="inputNumparte" class="col-sm-3 control-label">Numero de Parte:</label>
						<div class="col-sm-9">
							<input type="text" name="numparte" id="inputNumparte" class="form-control" required="required" placeholder="Parte">
						</div>
					</div>

					<div class="form-group">
						<label for="inputFamilia" class="col-sm-3 control-label">*Familia:</label>
						<div class="col-sm-6">
							<select name="familia" id="inputFamilia" class="form-control" required="required">

								<?php while ($listafamilia = $familia->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
								<?php } ?>
							</select>
						</div>

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

					</div>

					<div class="form-group">
						<label for="inputMimarca" class="col-sm-3 control-label">Marca:</label>
						<div class="col-sm-6">
							<select name="mimarca" id="inputMimarca" class="form-control" required="required">
								<?php while ($listamarca = $marca->fetch_array()) { ?>
								<option value="<?php echo $listamarca[0];?>"><?php echo $listamarca[1]; ?></option>
								<?php } ?>
							</select>
						</div>

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
							<input type="text" name="modelo" id="inputModelo" class="form-control" required="required" placeholder="Indique el Modelo">
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
								<option value="Simple" selected>Simple</option>
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
							<input type="text" name="margenGanancia1" id="inputMargenGanancia1" class="form-control" value="8" required="required">
						</div>%
						<button type="button" id="btnCalcular" class="btn btn-sm btn-success">Calcular</button>
						<div class="col-sm-2">
							<input type="text" name="margenGanancia2" id="inputMargenGanancia2" class="form-control" value="10" required="required">
						</div>
						<div class="col-sm-2">
							<input type="text" name="margenGanancia3" id="inputMargenGanancia3" class="form-control" value="12" required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPrecioVenta" class="col-sm-3 control-label">PrecioVenta:</label>
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

					<div class="form-group">
						<label for="inputCantidad" class="col-sm-3 control-label">Cantidad:</label>
						<div class="col-sm-2">
							<input type="number" name="cantidad" id="inputCantidad" class="form-control" required="required" placeholder="Num">
						</div><button type="button" id="btnCargar" class="btn btn-md btn-warning">Cargar</button>
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


				</form>

  			</div>

			<div id="eventos" class="col-md-4 bg-warning"><legend>Adicionales</legend></div>

  		</div>
  	</div>

<?php
}else{
	header("Location: index.html");
}
?>
