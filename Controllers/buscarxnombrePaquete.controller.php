<?php
require_once "../Models/articulosPaquete.model.php";

$articulo = new ArticulosAlmacen();

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$serie  = $_POST['serie'];

$combo = $_POST['idfamilia'];

$data = "";

if($codigo == 1){
		$dat = $articulo->ListaArticulosNombres($nombre);
		echo "
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Codigo</th>
						<th>Serie</th>
						<th>Fam.</th>
						<th>Descripcion</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['numserie']."</td>
						<td>".$fila['codigo']."</td>
						<td>".$fila['descripcion']."</td>

						<td align='right'>"; printf('S/. %.2f',$fila['precventa1']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa2']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa3']); echo "</td>
						<td align='center'>". $fila['stocktotal']."</td>
						<td>

						</td>

						<td>
							<!-- PARTE 1111111111111111111111111111111 DE LA BUSQUEDA PÓR NOMBRE DEL PRODUCTO     -->
							<a href='../Controllers/paquete.controller.php?id=".$fila['idproducto']."' style='text-decoration: none;' id='ELEMENTO' >
								<input type='hidden' id='idprod' value='".$fila['idproducto']."'>
								
								<div class='display_box' align='left'>
									<div style='margin-right:6px;' class='btn btn-success'><b>Agregar</b></div>
								</div>
							</a>

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

if($codigo == 2)
{
	$dat = $articulo->ListaArticulosSerie($serie);
	echo "
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Codigo</th>
						<th>Serie</th>
						<th>Fam.</th>
						<th>Descripcion</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['numserie']."</td>
						<td>".$fila['codigo']."</td>
						<td>".$fila['descripcion']."</td>

						<td align='right'>"; printf('S/. %.2f',$fila['precventa1']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa2']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa3']); echo "</td>
						<td align='center'>". $fila['stocktotal']."</td>
						<td>

						</td>

						<td>
							<!-- PARTE 222222222222222222222 DE LA BUSQUEDA por SERIE   -->
							<a href='../Controllers/paquete.controller.php?id=".$fila['idproducto']."' style='text-decoration: none;' id='ELEMENTO' >
								<input type='hidden' id='idprod' value='".$fila['idproducto']."'>
								
								<div class='display_box' align='left'>
									<div style='margin-right:6px;' class='btn btn-info'><b>Agregar</b></div>
								</div>
							</a>

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

#  CODIGO DE BUSQUEDA POR FAMILIA
if($codigo == 3)
{
	$dat = $articulo->ListaArticulosFamilias($combo);
	echo "
		<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Codigo</th>
						<th>Serie</th>
						<th>Fam.</th>
						<th>Descripcion</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['numserie']."</td>
						<td>".$fila['codigo']."</td>
						<td>".$fila['descripcion']."</td>

						<td align='right'>"; printf('S/. %.2f',$fila['precventa1']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa2']); echo "</td>
						<td align='right'>"; printf('S/. %.2f',$fila['precventa3']); echo "</td>
						<td align='center'>". $fila['stocktotal']."</td>
						<td>

						</td>

						<td>
							<!-- PARTE 33333333333333333333333333 DE LA BUSQUEDA POR FAMILIA  -->

							<a href='../Controllers/paquete.controller.php?id=".$fila['idproducto']."' style='text-decoration: none;' id='ELEMENTO' >
								<input type='hidden' id='idprod' value='".$fila['idproducto']."'>
								
								<div class='display_box' align='left'>
									<div style='margin-right:6px;'><b>Agregar</b></div>

								</div>
							</a>

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

?>