<?php
$codigoCliente = $_REQUEST['cod'];

$cod = $_REQUEST['cod'];
$producto = $_REQUEST['producto'];
$precio = $_REQUEST['precio'];
?>

<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
			type: 'POST',
			url : 'Controllers/listadoCliente.controller.php',
			beforeSend: function(){
				$("#result").html("<img src='img/load.gif'>");
			},
			success: function(response){
				$("#result").html(response);
			}
		});

		$("#cantidad").keyup(function(){
			var valor = $("#cantidad").val();
			var prec = parseFloat($("#precio1").val());
			var subtot = valor * prec;

			$("#subtotal").val(subtot);

		});

		$("#cantidad").change(function(){
			var valor = $("#cantidad").val();
			var prec = parseFloat($("#precio1").val());
			var subtot = valor * prec;

			$("#subtotal").val(subtot);
		});

		/**
         * Funcion para añadir una nueva columna en la tabla
         */

        $("#add").click(function(){
            // Obtenemos el numero de filas (td) que tiene la primera columna
            // (tr) del id "tabla"
            var tds=$("#tabla tr:first td").length;
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            var nuevaFila="<tr>";
            for(var i=0;i<tds;i++){
                // añadimos las columnas
                nuevaFila+="<td>columna "+(i+1)+" Añadida con jquery</td>";
            }
            // Añadimos una columna con el numero total de columnas.
            // Añadimos uno al total, ya que cuando cargamos los valores para la
            // columna, todavia no esta añadida

            nuevaFila+="<td>"+(trs+1)+" columnas";
            nuevaFila+="</tr>";
            $("#tabla").append(nuevaFila);
        });


        /**
         * Funcion para eliminar la ultima columna de la tabla.
         * Si unicamente queda una columna, esta no sera eliminada
         */
        $("#del").click(function(){
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            if(trs>1)
            {
                // Eliminamos la ultima columna
                $("#tabla tr:last").remove();
            }
        });


        $('#js-tabla tr:last').after('<tr><td>Cuatro</td></tr>');

	});
</script>

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<form action="" method="POST" class="form-inline" role="form" id="guarda">
				<h3>Ventas</h3>
				<div class="form-group">
					<label for="inputCliente" class="col-sm-2 control-label">Cliente:</label>
					<div class="col-sm-4">
						<input type="text" name="cliente" id="inputCliente" class="form-control" required="required">
						<input type="text" name="codCliente" value="<?php echo $codigoCliente;?>">
					</div>
					<div class="col-sm-2">
						<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1"> <span class="glyphicon glyphicon-search"></span> Buscar</button>
					</div>
					<label for="inputCliente" class="col-sm-2 control-label">Fecha:</label>
					<div class="col-sm-2">
						<input type="date" name="fecha" id="inputfecha" class="form-control">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="inputCliente" class="col-sm-2 control-label">Personal:</label>
				<div class="col-sm-2">
					<input type="text" name="cliente" id="inputCliente" class="form-control" required="required">
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalProductos"><span class="glyphicon glyphicon-plus"></span> Agregar</button>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<table class="table table-striped table-hover" id="tabla">
			<thead>
				<tr class="bg-primary">
					<th>Cod</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Sub Total</th>
					<th>--</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $cod; ?></td>
					<td><?php echo $producto; ?></td>
					<td><input type="number" name="cantidad" id="cantidad" min="0" step="1"></td>
					<td><input type="text" name="precio1" id="precio1" value="<?php echo $precio; ?>" disable></td>
					<td><input type="text" name="subtotal" id="subtotal" value=""></td>
					<td>
						<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Parte inferior-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="form-group pull-right">
				<label for="inputTotal" class="col-sm-6 control-label">Importe Bruto:</label>
				<div class="col-sm-6">
					<input type="text" name="total" id="inputTotal" class="form-control" required="required">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<div class="form-group pull-right">
					<label for="inputTotal" class="col-sm-6 control-label">Importe Neto:</label>
					<div class="col-sm-6">
						<input type="text" name="total" id="inputTotal" class="form-control" required="required">
					</div>
				</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<div class="form-group pull-right">
					<label for="inputTotal" class="col-sm-6 control-label">Total Factura:</label>
					<div class="col-sm-6">
						<input type="text" name="total" id="inputTotal" class="form-control" required="required">
					</div>
				</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group ">
				<label for="inputTotal" class="col-sm-2 control-label">Forma de pago:</label>
				<div class="col-sm-4">
					<select name="formaPago" id="formaPago" class="form-control">
						<option value="Contado">Contado</option>
						<option value="Credito">Credito</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL AGREGAR CLIENTE -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLabelModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-
			label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Buscar cliente</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-inline" role="form">

					<div class="form-group">
						<label class="sr-only" for="">Cliente</label>
						<input type="text" class="form-control" id="valor" placeholder="Nombre">
					</div>
					<button type="button" class="btn btn-primary">Buscar</button>
					<h3>Listado de clientes</h3>
					<div class="">
						<table class="table table-striped table-responsive">
							<tbody>
								<div id="result"></div>
							</tbody>
						</table>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Agregar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL AGREGAR PRODUCTO -->
<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-
			label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Buscar Producto</h4>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<label class="sr-only" for="">Cliente</label>
					<input type="text" class="form-control" id="valor" placeholder="Nombre">
				</div>
				<button type="button" class="btn btn-primary">Buscar</button>

				<?php
				require_once "Models/listadoProductos.class.php";
				$listado1 = new ListadoProductos();
				$data = $listado1->Productos();
				?>


					    <div>
					    	<h2>Productos</h2>
				        	<div class="table">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr class="success">
											<th>Cod.</th>
											<th>Producto</th>
											<th>Serie</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>Precio Venta</th>
											<th>Cantidad</th>
											<th>Almacen</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($fila = $data->fetch_array()) { ?>
										<tr>
											<td><?php echo $fila['IDproducto'];?></td>
											<td><?php echo $fila['producto'];?></td>
											<td><?php echo $fila['numserie'];?></td>
											<td><?php echo $fila['marca'];?></td>
											<td><?php echo $fila['modelo'];?></td>
											<td>S/. <?php echo $fila['precioVenta1'];?></td>
											<td><?php echo $fila['cantidad'];?></td>
											<td><?php echo $fila['tienda'];?></td>
											<td>
												<a href="ventas.php?cod=<?php echo $fila['IDproducto'];?>&producto=<?php echo $fila['producto'];?>&precio=<?php echo $fila['precioVenta1'];?>" type="button" class="btn btn-success" id="add"><span class="glyphicon glyphicon-plus"></span></a>
											</td>
										</tr>
										<?php
											}
											?>
									</tbody>
								</table>
				        	</div>
					    </div>


			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-
			dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Agregar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


