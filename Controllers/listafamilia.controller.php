<?php 

require_once "../Models/familiaslistado.model.php";
$fam = new FamiliasLista();
$dat = $fam->FamiliasListado();

echo "<select name='cbofamilias' id='cbofamilias' class='form-control' required='required'>
								<option value='-'>[Seleccionar]</option>
								<option value='all'>Todos</option>";

while ($row = $dat->fetch_array()) {
	
	echo "<option value='". $row[0] ."'>". $row[2] ."</option>";
}

echo "</select>";
?>
