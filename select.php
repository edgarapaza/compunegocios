<?php 
require_once("Models/Conexion.php");
$conexion = new Conexion();
$conn = $conexion->Conectarse();

$idproducto = $_POST['idprod'];

$sql = "SELECT * FROM productos WHERE idproducto = " . $idproducto;

if($data = $conn->query($sql)){
	//echo "Todo bien";
}else{
	echo "Error en la Base de datos o tabla. " . mysqli_error($conn);
}

$fila = $data->fetch_array();

if($fila == 0){
	echo "No hay datos para este producto";
}else{

echo "<table class='table' border='1'>
	<caption>Detalles del producto</caption>
	<tbody>
		<tr>
			<th>Producto</th>
			<td>". $fila[2] ."</td>
			<td>---------</td>
			<th>Precio</th>
			<td>". $fila[9] ."</td>
		</tr>
		<tr>
			<th>Num. Serie</th>
			<td>". $fila[3] ."</td>
			<td></td>
			<th>Precio Venta 1</th>
			<td>". $fila[13] ."</td>
		</tr>
		<tr>
			<th>Marca</th>
			<td>". $fila[4] ."</td>
			<td></td>
			<th>Precio Venta 2</th>
			<td>". $fila[14] ."</td>
		</tr>
		<tr>
			<th>Modelo</th>
			<td>". $fila[5] ."</td>
			<td></td>
			<th>Precio Venta 3</th>
			<td>". $fila[15] ."</td>
		</tr>
		<tr>
			<th>Tipo de Unidad</th>
			<td>". $fila[6] ."</td>
			<td></td>
			<th>Stock</th>
			<td>". $fila[16] ."</td>
		</tr>
		<tr>
			<th>Articulo</th>
			<td>". $fila[7] ."</td>
			<td></td>
			<th>Stock Minimo</th>
			<td>". $fila[17] ."</td>
		</tr>
		<tr>
			<th>Descripcion</th>
			<td>". $fila[8] ."</td>
			<td></td>
			<th>Color</th>
			<td>". $fila[18] ."</td>	
		</tr>
		<tr>
			<th>Familia</th>
			<td>". $fila[22] ."</td>
			<td></td>
			<th>Incluye</th>
			<td>". $fila[19] ."</td>
		</tr>
		<tr>
			<th>Fecha Registro</th>
			<td>". $fila[20] ."</td>
			<td></td>
			<th>Estado</th>
			<td>". $fila[21] ."</td>
		</tr>
	</tbody>
</table>";
}
?>