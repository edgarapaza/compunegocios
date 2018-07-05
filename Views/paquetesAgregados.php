<?php 
session_start();
require_once "header4.php";
if(empty($_SESSION["nuevo_codigo"]))
		{
			echo "Debe crear un nuevo codigo para la Venta por Paquete (Grupo).<br>";
			
		}
		else{	

				$micodigosession = $_SESSION["nuevo_codigo"];

				require_once "../Models/paquete.model.php";

				$paq = new Paquete();
				$datos = $paq->Venta_temporal();

				$total = $paq->SumaPaquete($micodigosession);

				?>
			

			<script type="text/javascript" src="js/jquery.min.js"></script>

			<script type="text/javascript">
				$(document).ready(function(){
					$("#btnBuscar").click(function(){

						var text1 = $("#xnombre").val();
						var text2 = $("#xserie").val();

						if(text1 == "")
						{

							if(text2 == ""){

								alert("Ingresar un nombre o Numero de serie");
								$("#xnombre").css("background-color", "yellow");
								$("#xnombre").focus();
							}else{

								$("#xnombre").val("");
								$("#xnombre").css("background-color","white");

								var lista2 = {
								"codigo" : 2,
								"serie"  : text2
								};
								$.ajax({
									url: '../Controllers/buscarxnombrePaquete.controller.php',
									type: 'POST',
									data: lista2,
									success: function(res){
										$("#respuesta").html(res);
									},
									error: function(res) {
										$("#respuesta").html(res);
									}
								});

								Limpiar();
								return false;

							}

						}else{

							$("#xnombre").css("background-color","white");


							$("#xserie").val("");

							var lista = {
								"codigo" : 1,
								"nombre" : text1
							};
							$.ajax({
								url: '../Controllers/buscarxnombrePaquete.controller.php',
								type: 'POST',
								data: lista,
								success: function(res){
									$("#respuesta").html(res);
								},
								error: function(res) {
									$("#respuesta").html(res);
								}
							});

							Limpiar();
							return false;

						}

					});

					$("#btnLimpiar").click(function(){
						Limpiar();
					});
				});

				function Limpiar() {
					var text1 = $("#xnombre").val("");
					var text2 = $("#xserie").val("");
					$("#xnombre").focus();
				}
			</script>

			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
			<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">

			
			<script type="text/javascript">
				function mandar(codigomuerto){
					alert(codigomuerto);
					window.location = "muerto.php?codigomuerto=" + codigomuerto;
				}
			</script>

			<div class="container">
				<div class="row">

							

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<form action="" method="POST" class="form-inline" role="form" name="search_datos">


							


							<table class="table table-hover table-bordered">
									<caption>Mover almacenes</caption>
									<thead>
										<tr>
											<th>Busqueda por Nombre y Serie</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div>
														<input type="text" class="form-control" name="xnombre" id="xnombre" placeholder="Busca x Nombre"><br>
														<input type="text" class="form-control" name="xserie" id="xserie" placeholder="Buscar x Serie"><br>

														<button type="button" class="btn btn-success" name="btnBuscar" id="btnBuscar">Buscar</button>
														<button type="button" class="btn btn-primary" name="btnLimpiar" id="btnLimpiar">Limpiar</button>

												</div>
											</td>
										</tr>
									</tbody>
							</table>

						</form>
					</div>


					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div id="respuesta"></div>
					</div>
				</div>
			</div>

			<form id="Form" action="../Controllers/paqueteGuardarCerrar.controller.php" class="form-inline">
				<table class="table table-hover">
								<tr>
									<th>Nombre/ Razon Social</th>
									<td><input type="text" name="razonsocial" id="1" class="form-control"></td>
									<th>RUC / DNI</th>
									<td><input type="text" name="ruc" id="2" class="form-control"></td>
									<th>Direccion</th>
									<td><input type="text" name="direccion" id="3" class="form-control"></td>
								</tr>
							</table>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<input type="hidden" name="next_paquete" value="<?php echo $micodigosession; ?>">
					<?php echo "Esta trabajando con el Grupo (Paquete): " . $_SESSION["nuevo_codigo"]; ?>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				 | Si por alguna razón, el numero de paquete no funciona presione: <a href="javascript:mandar(<?php echo $micodigosession; ?>)">Cerrar Codigo</a>
					
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Num</th>
							<th>Producto</th>
							<th>Modelo</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Sub Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
							
						while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
						 ?>
						<tr>
							<td>
								<div class="checkbox">
								<label>
									<input type="checkbox" name="<?php echo "elemento".$i; ?>" value="<?php echo $i; ?>" >
								</label>
							</div></td>
							<td><?php echo $i; ?></td>
							<td><?php echo $fila['producto']; ?></td>
							<td><?php echo $fila['modelo']; ?></td>
							<td>
								<input type="text" name="precio" class="txt_precio" value="<?php echo $fila['precio']; ?>" min="1" max="9999">
							</td>
							<td><input type="number" name="cantidad" id="<?php echo $i; ?>" value="<?php echo $fila['cantidad']; ?>" min="1" max="9999"></td>
							<td>
								
									<?php echo $fila['subtotal']; ?>
								</td>
								<td>
									<input type="text" name="id_producto" id="id_producto" value="<?php echo $fila['idproducto']; ?>">
									<a href="#?cod=<?php echo $fila['idproducto']; ?>">Actualizar</a>
									<a href="#?cod=<?php echo $fila['idproducto']; ?>">Quitar</a>
								</td>
						</tr>
						<?php 
								$i++;
							} ?>
						<tr>
							
							<td colspan="2"><button type="submit" class="btn btn-info">Guardar/Cerrar</button></td>

							<td colspan="2" align="right">Total</td>
							<td><?php printf("S/. %.2f", $total['total']); ?>
								<input type="hidden" name="total1" value="<?php echo $total['total']; ?>">
							</td>
						</tr>	
					</tbody>
				</table>
			</form>
<?php } ?>