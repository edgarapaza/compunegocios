<?php 
require_once'../Models/moveralmacen.model.php';

$mover = new MoverAlmacen();
$todo = $mover->Almacenes();

echo "<select name='nuevoalmacen' id='inputAlmacen' class='form-control' required='required'>
			<option value=''>-- Selecciona una --</option>
			<option value='all'>Todos</option>";
while ($fila = $todo->fetch_array()) {
	echo "<option value='". $fila[0] ."'>".$fila[1]."</option>";
}
echo "</select>";
?>