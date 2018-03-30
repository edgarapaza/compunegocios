<?php
include "Views/header.php"; 
session_start();
@$personal = $_SESSION['administrador'];

	require_once "Models/nuevoProducto.class.php";
	$producto = new Producto();

	$familia  = $producto->Familias();
	$prov     = $producto->Proveedor();
	$marca    = $producto->Marca();
	$unidad   = $producto->Unidades();
	$almacen  = $producto->Almacen();
	$subfam   = $producto->SubFamilias();

	$ultimo   = $producto->UltimoCodigo();

	$porciones = explode("-", $ultimo[0]);
	#echo "porcion 1: ".$porciones[0]."<br>";
	#echo "porcion 2: ".$porciones[1]."<br>";
	$next = $porciones[0] + 1;

	$codigo = "CN-". $next;
	#echo "Codigo Generador: " . $codigo;

?>
	<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


	<script type="text/javascript">


		$(document).ready(function(){

			$("#btnmostrar").click(function(){
				
				$.ajax({
					type : 'POST',
					url  : 'Controllers/selectMarca.controller.php',
					beforeSend: function(){
						$('#listaMarca').html("<img src='img/load.gif'>");
					},
					success: function(res){
						document.getElementById('listaMarca').innerHTML = res;
					},
					error: function(){
						$("#listaMarca").html("Error Cargando Listado de Marcas");
					}
				});				
			});



			$("#btnNuevaMarca").on('load',function(){
				var codigomarca = $("#inputCodigoM").val();
				var marcanew = $("#inputMarcaM").val();

				var lista = {"codigo":codigomarca, "marca2":marcanew};
				$.ajax({
					data: lista,
					type: 'POST',
					url : "Controllers/nuevaMarca.controller.php",

					success: function(res){
						$("#msgmodal").html(res);
					},
					error: function(res){
						$("#msgmodal").html("Error" + res);
					}
				});
			});

			$("#inputFamilia").on("change",function(){
				var codfamilia = $("#inputFamilia").val();

				$.ajax({
					data : {"codfamilia":codfamilia},
					type : 'POST',
					url  : 'Controllers/selectSubfamilia.controller.php',
					beforeSend: function(){
						$('#mio').html("<img src='img/load.gif'>");
					},
					success: function(response){
						document.getElementById('mio').innerHTML = response;
					},
					error: function(){
						$("#mio").html("Error en la Consulta a la tabla");
					}
				});
			});

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
				cantid = $("#inputCantidad").val();

				for (var i = 1; i <= cantid; i++) {
					var newelem = '<input type="text" name="serie" id="serie" class="form-control" required="required">';

					$('#eventos').append(i + newelem);
				}
			});

			/***************************************************************************************************
			**   OBTENER LOS VALORES DE TABLA   ****************
			***************************************************************************************************/


			$("#btnRegistrar").click(function(){

				var idfamilia  = $("#inputFamilia").val();
				var subfamilia = $("#inputSubfamilia").val();
				var mimarca    = $("#inputMimarca").val();
				var model      = $("#inputModelo").val();
				var tipuni     = $("#inputTipoUnidad").val();
				var tipart     = $("#inputTipoArticulo").val();
				var descripcion= $("#inputproducto").val();
				var pvp        = $("#inputPrecioUnitario").val();
				var marge1     = $("#inputMargenGanancia1").val();
				var marge2     = $("#inputMargenGanancia2").val();
				var marge3     = $("#inputMargenGanancia3").val();
				var preven1    = $("#inputPrecioVenta1").val();
				var preven2    = $("#inputPrecioVenta2").val();
				var preven3    = $("#inputPrecioVenta3").val();
				var stock      = $("#inputCantidad").val();
				var color      = $("#inputColor").val();
				var inclu      = $("#inputIncluye").val();
				var partee     = $("#inputNumparte").val();
				var idpers     = $("#idpersonal").val();
				var cantida    = $("#cantidad").val();
				var almacen    = $("#inputAlmacen").val();
				var cod        = $("#idcodigo").val();
				var total	   = pvp * stock;



				for (var i = 0; i <= stock ; i++) {

					var textserie = document.getElementsByName("serie")[i].value;

					var parametros = {
						"famil"   : idfamilia,
						"subfam"  : subfamilia,
						"varserie": textserie,
						"mimarca" : mimarca,
						"model"   : model,
						"tipuni"  : tipuni,
						"tipart"  : tipart,
						"descripcion": descripcion,
						"pvp"     : pvp,
						"marge1"  : marge1,
						"marge2"  : marge2,
						"marge3"  : marge3,
						"preven1" : preven1,
						"preven2" : preven2,
						"preven3" : preven3,
						"stock"	  : stock,
						"color"   : color,
						"inclu"   : inclu,
						"partee"  : partee,
						"idpers"  : idpers,
						"almacen" : almacen,
						"cod"     : cod,
						"total"   : total

			        };

					$.ajax({
		                data : parametros,
		                url  : 'Controllers/nuevoProducto.controller.php',
		                type : 'POST',
		                beforeSend: function () {
		                    //alert(varserie.value);
		                    $("#resultado").html("<img src='img/load.gif'>");
		                },
		                success: function (data) {
		                    $("#resultado").html(data);
		                    $("#formulario")[0].reset();
		                },
		                error: function(res){
		                	$("#resultado").html(res);
		                }
			        });
				}

			});

		});
	</script>



<div class="container">
	<div class="row">

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div id="resultado"></div>
			<form action="" method="POST" class="form-horizontal" role="form" id="formulario">
				<div class="form-group">
					<legend>Registro de Productos</legend>
				</div>

				<input type="hidden" name="idpersonal" id="idpersonal" value="1001">
				<input type="hidden" readonly="readonly" name="codigo" id="idcodigo" value="<?php echo $codigo; ?>" >

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
							<option value="0">Seleccione</option>
							<?php while ($listafamilia = $familia->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $listafamilia['IDfamilia'];?>"><?php echo $listafamilia['familia'];?></option>
							<?php } ?>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputSubfamilia" class="col-sm-3 col-form-label">Subfamilia:</label>
					<div class="col-sm-8">
							<div id="mio"></div>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputMimarca" class="col-sm-3 col-form-label">Marca:</label>
					<div class="col-sm-4">
						<div id="listaMarca"></div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<button type="button" class="btn btn-success" id="btnmostrar" name="btnmostrar">Cargar/Actualizar</button>
						<a class="btn btn-primary" data-toggle="modal" href='#nueva-marca'>Nueva Marca</a>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputModelo" class="col-sm-3 col-form-label">Modelo:</label>
					<div class="col-sm-8">
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
						<input type="text" name="precioUnitario" id="inputPrecioUnitario" class="form-control" required="required" placeholder="0.00">
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
								<option value="<?php echo $listaalmacen['idalmacen']; ?>"><?php  echo $listaalmacen['descripcion'];?></option>
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
					<div class="col-sm-8">
						<input type="text" name="incluye" id="inputIncluye" class="form-control">
					</div>
				</div>

				<button type="button" id="btnRegistrar" class="btn btn-lg btn-primary">Guardar</button>
			</form>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div id="eventos"><legend>Numeros de Serie</legend></div>
		</div>

	</div>
</div>



<div class="modal fade" id="nueva-marca">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nueva Marca</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-horizontal" role="form">
						<div id="msgmodal"></div>
						<div class="form-group">
							<label for="inputCodigo" class="col-sm-2 control-label">Codigo:</label>
							<div class="col-sm-10">
								<input type="text" name="codigo" id="inputCodigoM" class="form-control" value="" required="required" placeholder="Codigo (3 letras)">
							</div>
						</div>

						<div class="form-group">
							<label for="inputMarca" class="col-sm-2 control-label">Marca:</label>
							<div class="col-sm-10">
								<input type="text" name="marca" id="inputMarcaM" class="form-control" required="required" placeholder="Marca">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="button" class="btn btn-primary" id="btnNuevaMarca" name="btnNuevaMarca">Guardar</button>
							</div>
						</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

				