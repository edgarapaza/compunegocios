<?php
session_start();
require_once "header4.php";

$idpersonal = $_SESSION['administrador'];

$idprove    = $_REQUEST['idproveedor'];
$idregistro = $_REQUEST['idregistro'];

#echo "Codigo del Proveedor: " . $idprove;
#echo "Codigo del Registro: " . $idregistro;


	require_once "../Models/nuevoProducto.class.php";
	$producto = new Producto();

	$familia  = $producto->Familias();
	$proveed  = $producto->Proveedor($idprove);

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

<style type="text/css">

	#popup {
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1001;
	}

	.content-popup {
	    margin:0px auto;
	    margin-top:120px;
	    position:relative;
	    padding:10px;
	    width:500px;
	    min-height:250px;
	    border-radius:4px;
	    background-color:#FFFFFF;
	    box-shadow: 0 2px 5px #666666;
	}

	.content-popup h2 {
	    color:#48484B;
	    border-bottom: 1px solid #48484B;
	    margin-top: 0;
	    padding-bottom: 4px;
	}

	.popup-overlay {
	    left: 0;
	    position: absolute;
	    top: 0;
	    width: 100%;
	    z-index: 999;
	    display:none;
	    background-color: #777777;
	    cursor: pointer;
	    opacity: 0.7;
	}

	.close {
	    position: absolute;
	    right: 15px;
	}
	.centrar
	{
		display: table-cell;
		vertical-align: middle;
	}
</style>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src= "js/series.js"></script>


	<script type="text/javascript">
		window.addEventListener('load',carga, false);


		function carga(){

			$("#btnmostrar").trigger('click');

		}

		$(document).ready(function(){

			$("#refresh").click(function(){
				window.location.reload(true);
				$('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
			});


			$("#btnmostrar").click(function(){

				$.ajax({
					type : 'POST',
					url  : '../Controllers/selectMarca.controller.php',
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


			$("#btnNuevaMarca").click(function(){

				var codigomarca = $("#inputCodigoM").val();
				var otramarca   = $("#nuevamarca1").val();

				var marcalista = {
						"codigo" : codigomarca,
						"marcass"  : otramarca
					};

				$.ajax({
					data : marcalista,
					type : "POST",
					url  : "../Controllers/nuevaMarca.controller.php",
				})
				.done(function(res) {
					console.log("success");
					$("#msgmodal").html(res);
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			});


			$("#inputFamilia").on("change",function(){
				var codfamilia = $("#inputFamilia").val();

				$.ajax({
					data : {"codfamilia":codfamilia},
					type : 'POST',
					url  : '../Controllers/selectSubfamilia.controller.php',
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

				var idproveedor = $("#idproveedor").val();
				var idfamilia   = $("#inputFamilia").val();
				var subfamilia  = $("#inputSubfamilia").val();
				var mimarca     = $("#inputMarca").val();
				var model       = $("#inputModelo").val();
				var tipuni      = $("#inputTipoUnidad").val();
				var tipart      = $("#inputTipoArticulo").val();
				var descripcion = $("#inputproducto").val();
				var pvp         = $("#inputPrecioUnitario").val();
				var marge1      = $("#inputMargenGanancia1").val();
				var marge2      = $("#inputMargenGanancia2").val();
				var marge3      = $("#inputMargenGanancia3").val();
				var preven1     = $("#inputPrecioVenta1").val();
				var preven2     = $("#inputPrecioVenta2").val();
				var preven3     = $("#inputPrecioVenta3").val();
				var stock       = $("#inputCantidad").val();
				var color       = $("#inputColor").val();
				var inclu       = $("#inputIncluye").val();
				var partee      = $("#inputNumparte").val();
				var idpers      = $("#idpersonal").val();
				var cantida     = $("#cantidad").val();
				var almacen     = $("#inputAlmacen").val();
				var cod         = $("#idcodigo").val();
				var total	      = pvp * stock;
				var factura     = $("#inputFactura").val();
				var feccompra   = $("#inputFechaCompra").val();
				var idregistro  = $("#idregistro").val();

				if(pvp < 0)
				{
					alert('El precio introducido es negativo. Corregir');
					exit();
				}

				for (var i = 0; i <= stock ; i++) {

					var textserie = document.getElementsByName("serie")[i].value;

					var parametros = {
						"idproveedor"   : idproveedor,
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
						"total"   : total,
						"factura" : factura,
						"feccompra": feccompra,
						"idregistro": idregistro

			        };

					$.ajax({
		                data : parametros,
		                url  : '../Controllers/nuevoProducto.controller.php',
		                type : 'POST',
		                beforeSend: function () {
		                    //alert(varserie.value);
		                    $("#resultado").html("<img src='img/load.gif'>");
		                },
		                success: function (data) {

		                		$('#popup').fadeIn('slow');
								        $('.popup-overlay').fadeIn('slow');
								        $('.popup-overlay').height($(window).height());

		                    $("#resultado").html(data);
								        return false;

		                },
		                error: function(res){
		                	$("#resultado").html(res);
		                	window.location.reload(true);
		                }
			        });
				}

			});

		});
	</script>



<div class="container">
	<div class="row">

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<form action="" method="POST" class="form-horizontal" role="form" id="formulario">
				<div class="form-group">
					<legend>
						Nuevo Producto - <span class="alert-danger">Proveedor: "<?php echo $proveed[1]; ?>"</span>
						  | 
					<button type="button" id="btnRegistrar" class="btn btn-lg btn-primary">Guardar</button>
					<a href="stock1.php?codigo=<?php echo $idprove; ?>&idregistro=<?php echo $idregistro; ?>">Regresar al Listado</a>
					</legend>
				</div>

				<input type="hidden" name="idproveedor" readonly="readonly" id="idproveedor" value="<?php echo $idprove; ?>">
				<input type="hidden" name="idpersonal" readonly="readonly" id="idpersonal" value="<?php echo $idpersonal; ?>">
				<input type="hidden" name="codigo" readonly="readonly" id="idcodigo" value="<?php echo $codigo; ?>" >
				<input type="hidden" name="idregistro" readonly="readonly" id="idregistro" value="<?php echo $idregistro; ?>" >

				<div class="form-group row">
					<label for="inputProducto" class="col-sm-2 col-form-label">*Producto:</label>
					<div class="col-sm-8">
						<input type="text" name="producto" id="inputproducto" class="form-control" required="required" placeholder="Laptop, Memoria USB, Monitor, etc.">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputNumparte" class="col-sm-2 col-form-label">Numero de Parte:</label>
					<div class="col-sm-8">
						<input type="text" name="numparte" id="inputNumparte" class="form-control" required="required" placeholder="Parte">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputFamilia" class="col-sm-2 col-form-label">*Familia:</label>
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
					<label for="inputSubfamilia" class="col-sm-2 col-form-label">Subfamilia:</label>
					<div class="col-sm-8">
							<div id="mio"></div>
						</select>
					</div>

				</div>

				<div class="form-group row inline">
					<label for="inputMimarca" class="col-sm-2 col-form-label">Marca:</label>
					<div class="col-sm-3">
						<div id="listaMarca"></div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<button type="button" class="btn btn-success" id="btnmostrar" name="btnmostrar">Load/Refresh</button>
						<a class="btn btn-primary" data-toggle="modal" href='#nueva-marca'>Nueva Marca</a>
					</div>

				</div>

				<div class="form-group row">
					<label for="inputModelo" class="col-sm-2 col-form-label">Modelo:</label>
					<div class="col-sm-8">
						<input type="text" name="modelo" id="inputModelo" class="form-control" required="required" placeholder="Indique el Modelo">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputTipoUnidad" class="col-sm-2 col-form-label">Tipo Unidad:</label>
					<div class="col-sm-8">
						<select name="tipoUnidad" id="inputTipoUnidad" class="form-control" required="required">
							<option value="28">Unidad</option>
							<?php while ($listaunidad = $unidad->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value="<?php echo $listaunidad['idunidad']; ?>"><?php echo $listaunidad['unidadMedida']; ?></option><?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputTipoArticulo" class="col-sm-2 col-form-label">TipoArticulo:</label>
					<div class="col-sm-8">
						<select name="tipoArticulo" id="inputTipoArticulo" class="form-control" required="required">
							<option value="Simple" selected>Simple</option>
							<option value="Compuesto">Compuesto</option>
							<option value="Servicio">Servicio</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputPrecioUnitario" class="col-sm-2 col-form-label">PrecioUnitario:</label>
					<div class="col-sm-5">
						<input type="number" name="precioUnitario" id="inputPrecioUnitario" class="form-control" required="required" placeholder="0.00" min="0" max="99999999">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputMargenGanancia" class="col-sm-2 col-form-label">MargenGanancia:</label>
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
					<label for="inputPrecioVenta" class="col-sm-2 col-form-label">PrecioVenta:</label>
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
					<label for="inputCantidad" class="col-sm-2 col-form-label">Cantidad:</label>
					<div class="col-sm-4">
						<input type="number" name="cantidad" min="1" max="99" step="1" id="inputCantidad" class="form-control" required="required" placeholder="Num" value="1">
					</div>
				</div>


				<div class="form-group row">
					<label for="serieCantidad" class="col-sm-2 col-form-label">Serie Producto:</label>
					<div class="col-sm-4">
						<select name="serieCantidad" id="inputSerieCantidad" class="form-control" required="required">
							<option value="" selected="selected">[Seleccionar]</option>
							<option value="Multiples">Multiples Series</option>
							<option value="Unico">Unica Series</option>
						</select>
						<div id="unicaSerie"></div>
					</div>
					<button type="button" id="btnCargar" style="display: none;" class="btn btn-md btn-warning"> Crear Casilleros</button>
				</div>


				<div class="form-group row">
					<label for="inputAlmacen" class="col-sm-2 col-form-label">Almacen:</label>
					<div class="col-sm-8">
						<select name="idalmacen" id="inputAlmacen" class="form-control" required="required">
							<option>[Seleccionar]</option>
							<?php while ($listaalmacen = $almacen->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $listaalmacen['idalmacen']; ?>"><?php  echo $listaalmacen['almacen'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="inputColor" class="col-sm-2 col-form-label">Color:</label>
					<div class="col-sm-8">
						<input type="text" name="color" id="inputColor" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputIncluye" class="col-sm-2 col-form-label">Incluye:</label>
					<div class="col-sm-8">
						<input type="text" name="incluye" id="inputIncluye" class="form-control">
					</div>
				</div>
				<hr>

				<div class="form-group row">
					<label for="inputFactura" class="col-sm-2 col-form-label">Numero Factura:</label>
					<div class="col-sm-4">
						<input type="text" name="factura" id="inputFactura" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputFechaCompra" class="col-sm-2 col-form-label">Numero Fecha Compra:</label>
					<div class="col-sm-4">
						<input type="date" name="fechaCompra" id="inputFechaCompra" class="form-control">
					</div>
				</div>




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


				<form action="../Controllers/nuevaMarca.controller.php" method="POST" class="form-horizontal" role="form">


						<div id="msgmodal"></div>


						<div class="form-group">
							<label for="inputCodigo" class="col-sm-2 control-label">Codigo:</label>
							<div class="col-sm-10">
								<input type="text" name="codigo" id="inputCodigoM" class="form-control" value="" required="required" placeholder="Codigo (3 letras)">
							</div>
						</div>

						<div class="form-group">
							<label for="nuevamarca" class="col-sm-2 control-label">Marca:</label>
							<div class="col-sm-10">
								<input type="text" name="nuevamarca1" id="nuevamarca1" class="form-control" required="required" placeholder="Marca">
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

<div id="popup" style="display: none;" class="centrar">
    <div class="content-popup">
        <div>
        	<br>
          <h2>Mensaje de apoyo</h2>
          <div class="alert alert-info">
          	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          		<div id="resultado"></div>
          </div>
          <button type="button" id="refresh" class="btn btn-success">Cerrar</button>
        </div>
    </div>
</div>


<?php include "footer4.html"; ?>
