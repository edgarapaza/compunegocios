<?php
require_once("../Models/nuevaFamilia.model.php");

$codfamilia = $_POST['codfamilia'];

$nf = new Nuevafamilia();
$data = $nf->MostrarSubfamilia($codfamilia);

echo "<select name='subfamilia' id='inputSubfamilia' class='form-control'>
		<option value='0'>Ninguno</option>";
while ($fila = $data->fetch_array()) {
	echo "<option value=".$fila[2].">".$fila[1]."</option>";
}
echo "</select>";

?>