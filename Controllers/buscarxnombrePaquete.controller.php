
<?php
require_once "../Models/articulosPaquete.model.php";

$articulo = new ArticulosAlmacen();

$codigo = $_POST['codigo'];
@$nombre = $_POST['nombre'];
@$serie  = $_POST['serie'];

$data = "";

if($codigo == 1){
		$dat = $articulo->ListaArticulosNombres($nombre);
		echo "
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Descripcion</th>
						<th>Marca</th>
						<th>Serie</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>
						<th>Cantidad
							<input type='number' name='txtcantidad' id='txtcantidad' value='1' required='required' size='2' min='1' max='99'>
						</th>
						<th>Opc</th>
					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['marca']."</td>
						<td>".$fila['numserie']."</td>
						

						<td align='right'>"; printf('S/. %.2f',$fila['precventa1']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa2']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa3']); echo "</td>
						<td align='center'>". $fila['stocktotal']."</td>
						<td>
							
						</td>

						<td>
							<button type='button' class='btn btn-success' id='button' onclick='MostrarCantidad(".$fila['idproducto'].",".$fila['stocktotal'].")'>Agregar</button>
							<!--PARTE 11111111111111111 DE LA BUSQUEDA PÓR NOMBRE DEL PRODUCTO -->

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

if($codigo == 2){
	$dat = $articulo->ListaArticulosSerie($serie);
	echo "
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Marca</th>
						<th>Serie</th>
						<th>Fam.</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>
						<th>Cantidad
							<input type='number' name='txtcantidad' id='txtcantidad' value='1' required='required' size='2' min='1' max='99'>
						</th>
						<th>Opc</th>
					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['marca']."</td>
						<td>".$fila['numserie']."</td>
						<td>".$fila['familia']."</td>

						<td align='right'>"; printf('S/. %.2f',$fila['precventa1']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa2']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa3']); echo "</td>
						<td align='center'>". $fila['stocktotal']."
							
						</td>
						<td>
							
						</td>

						<td>
							<!--PARTE 222222222222222222222 DE LA BUSQUEDA por SERIE -->
							<button type='button' class='btn btn-success' id='button' onclick='MostrarCantidad(".$fila['idproducto'].",".$fila['stocktotal'].")'>Agregar</button>
						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}


?>


<script type="text/javascript" charset="utf-8" async defer>

	function MostrarCantidad(idproducto, stock){
		
		var txtcantidad = $("#txtcantidad").val();
		
		if(txtcantidad <=0)
			{
				alert("Ha ingresado 0 o un numero negativo en la cantidad a vender. Corrija Por favor");
			}else{

				if(stock>=txtcantidad){
						    				
			        $.ajax({
			            type: 'POST',
			            url : '../Controllers/paquete.controller.php',
			            data: { id: idproducto, cantidad: txtcantidad, stock: stock},
			            success: function(){
			            	alert("Producto Agregado");
			            	location.href="../Views/paquetesAgregados.php";
			            },
			            error: function(){
			            	alert("Error");
			            }
			            
			        });
			        return false;
				}else{
					alert("La cantidad introducida en cantidad es incorrecta");
					$("#txtcantidad").css('background-color','yellow');
				}
			}
	}
</script>