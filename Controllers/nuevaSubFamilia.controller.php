<?php
require_once("../Models/nuevaFamilia.model.php");

$idfamilia = $_POST['codigo'];
$datos = explode("#",$idfamilia);

echo $datos[1];
$subfam = new Nuevafamilia();
$lista = $subfam->MostrarSubfamilia($datos[1]);

echo "<table class='table table-striped'>
	<tr>
		<th>Codigo</th>
		<th>Sub Familia</th>
	</tr>";
	while ($fila = $lista->fetch_array(MYSQLI_ASSOC)) {
		echo "
		<tr>
			<td>".$fila[codigo]."</td>
			<td>".$fila[subfamilia]."</td>
		</tr>";
	}
echo "</table>";

?>

