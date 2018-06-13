<?php
require_once "../Models/articulosMover.model.php";

$articulo = new ArticulosAlmacenMover();



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
						<th>Cod.Prod.</th>
						<th>Producto</th>
						<th>Almacen</th>
						<th>Cantidad</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['almacen']."</td>
						<td>".$fila['stocktotal']."</td>
						<td>

						</td>

						<td>
							
							<a href='./nuevoAlmacenx.php?idproducto=". $fila['idproducto'] ."&idalmacen=". $fila['idalmacen'] ."&almacen=". $fila['almacen'] ."' class='btn btn-danger'>Mover a</a>
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
						<th>Cod.Prod.</th>
						<th>Producto</th>
						<th>Almacen</th>
						<th>Cantidad</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['almacen']."</td>
						<td>".$fila['stocktotal']."</td>

						<td>

						</td>

						<td>
							
							<a href='./nuevoAlmacenx.php?idproducto=". $fila['idproducto'] ."&idalmacen=". $fila['idalmacen'] ."&almacen=". $fila['almacen'] ."' class='btn btn-danger'>Mover a</a>
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
						<th>Cod.Prod.</th>
						<th>Producto</th>
						<th>Almacen</th>
						<th>Cantidad</th>

					</tr>
				</thead>";
				
				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
				
				echo "
				<tbody>
					<tr>
						<td>".$fila['idproducto']."</td>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['almacen']."</td>
						<td>".$fila['stocktotal']."</td>

						<td>

						</td>

						<td>
							
							<a href='./nuevoAlmacenx.php?idproducto=". $fila['idproducto'] ."&idalmacen=". $fila['idalmacen'] ."&almacen=". $fila['almacen'] ."' class='btn btn-danger'>Mover a</a>
						</td>
					</tr>
				</tbody>";
				}
	echo "
		</table>
		";
}

?>
