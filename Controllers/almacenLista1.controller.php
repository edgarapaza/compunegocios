<?php 
require_once "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();
$todo = $mover->MostrarTodo();

echo "<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Cod.Prod.</th>
						<th>Producto</th>
						<th>Modelo</th>
						<th>Marca</th>
						<th>Serie</th>
						<th>Almacen</th>
						<th>Cantidad</th>
						<th>Mover a</th>						
						<th></th>
					</tr>
				</thead>
				<tbody>";
while ($fila = $todo->fetch_array()) {

	echo "<tr><td>". $fila['idproducto'] ."</td>";
	echo "<td>". $fila['descripcion'] ."</td>";
	echo "<td>". $fila['marca'] ."</td>";
	echo "<td>". $fila['modelo'] ."</td>";
	echo "<td>". $fila['numserie'] ."</td>";
	echo "<td>". $fila['almacen'] ."</td>";
	echo "<td>". $fila['stocktotal'] ."</td>";
	echo "<td>
				
						<a href='./nuevoAlmacenx.php?idproducto=". $fila['idproducto'] ."&idalmacen=". $fila['idalmacen'] ."&almacen=". $fila['nuevo'] ."' class='btn btn-danger'>Mover a</a>
 				</td></tr>";
	
}

echo "</tbody></table>";

?>


