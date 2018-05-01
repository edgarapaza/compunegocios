<?php
require_once "../Models/articulos.model.php";

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
							<a href='venta2.php?idprod=".$fila['idproducto']."' class='btn btn-success'>Vender</a>

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
							<a href='venta2.php?idprod=".$fila['idproducto']."' class='btn btn-success'>Vender</a>

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

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
							<a href='venta2.php?idprod=".$fila['idproducto']."' class='btn btn-success'>Vender</a>

						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

?>
