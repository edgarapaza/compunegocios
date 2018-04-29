<?php 
require_once "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();
$todo = $mover->MostrarTodo();

echo "<table class='table table-hover'>
				<thead>
					<tr class='thead-dark'>
						<th>Cod. Prod.</th>
						<th>Producto</th>
						<th>Almacen</th>
						<th>Cantidad</th>
						<th>Mover a</th>						
						<th></th>
					</tr>
				</thead>
				<tbody>";
while ($fila = $todo->fetch_array()) {

	echo "<tr><td>". $fila[0] ."</td>";
	echo "<td>". $fila[1] ."</td>";
	echo "<td>". $fila[2] ."</td>";
	echo "<td>". $fila[3] ."</td>";
	echo "<td>
				
						<a href='nuevoAlmacenx.php?idproducto=". $fila[0] ."&idalmacen=". $fila[2] ."' class='btn btn-danger'>Mover a</a>
 				</td></tr>";
	
}

echo "</tbody></table>";

?>


