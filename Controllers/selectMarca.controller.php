<?php
require "../Models/marca.class.php";

$marca = new Marca();
$data = $marca->ListaMarca();


echo "<select name='marca' id='inputMarca' class='form-control'>
		<option value='0' selected='selected'>[Selecciona]</option>";
while ($fila = $data->fetch_array()) {
	echo "<option value=".$fila[0].">".$fila[2]."</option>";
}
echo "</select>";

?>