<?php require_once "header4.php"; ?>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	
	function Agregar(){
		alert("click");
		var newDiv = document.createElement("div"); 
  	var newContent = document.createTextNode("Hola!¿Qué tal?"); 
  	newDiv.appendChild(newContent);
	}
</script>


<div class="container">
	<div class="row">
		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			
		<p>Selecciona el tipo de Reporte</p>
		<form>
			<div class="form-group">
				<label for="inputCampos1" class="col-sm-2 control-label">Campos1:</label>
				<div class="col-sm-6">
					<select name="campos1" id="inputCampos1" class="form-control" required="required" multiple="multiple">
						<option value="todos">Todos</option>
						<option value="descripcion">Producto</option>
						<option value="codigo">Cod. Producto</option>
						<option value="idfamilia">Familia</option>
						<option value="idsubfamilia">Sub Familia</option>
						<option value="marca">Marca</option>
						<option value="tipArticulo">Articulo</option>
						<option value="PVP">Precio Venta proveedor</option>
						<option value="precventa1">Precio Venta 1</option>
						<option value="precventa2">Precio Venta 2</option>
						<option value="precventa3">Precio Venta 3</option>
						<option value="stocktotal">Stock Total</option>
						<option value="color">Color</option>
						<option value="parte">Parte</option>
						<option value="idpersonal">Personal</option>
						<option value="fechaalta">Fecha de Alta</option>
						<option value="idalmacen">Almacen</option>
						<option value="total">Total</option>
					</select>
				</div>
			</div>

			<button type="button" onclick="Agregar()" class="btn btn-success" name="btnAddtoReport" id="btnAddtoReport">Agregar >></button>
		</form>

		</div>


		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p>Generar Reporte</p>
			<form action="">
				<div class="form-group">
					<label for="inputCrearReporte" class="col-sm-2 control-label">CrearReporte:</label>
					<div class="col-sm-6">
						<select name="crearReporte" id="inputCrearReporte" class="form-control" required="required" multiple="multiple">
							<option value="uno">Uno</option>
						</select>
					</div>
				</div>
				<button type="button" class="btn btn-info" name="btnNewReport" id="btnNewReport">Guardar / Generar Reporte</button>
			</form>
		</div>
	</div>

</div>

<div id="div1">El texto superior se ha creado dinámicamente.</div>



<?php include "footer4.html"; ?>