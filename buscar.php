<?php 

require_once("Models/Conexion.php");

$conexion = new Conexion();
$conn = $conexion->Conectarse();
$cadena = $_POST['texto'];

echo "valor del search: ". $cadena . "<br>";

$sql = "SELECT * FROM productos WHERE producto LIKE '%{$cadena}%' OR numserie LIKE '%{$cadena}%';";
if(!$conn->query($sql)){

	echo "Error. ". mysqli_error($conn);
	
}else{
	$datos = $conn->query($sql);
	$numero = $datos->num_rows;

	$output = '';
	if($numero > 0){

		echo "<table class='table table-condensed table-hover'>
	<thead>
		<tr>
			<th>Producto</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Serie</th>
			<th>Stock</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>";
		while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr>
			<td>".$fila['producto']."</td>
			<td>".$fila['marca']."</td>
			<td>".$fila['modelo']."</td>
			<td>".$fila['numserie']."</td>
			<td>".$fila['stock']."</td>
			<td><a href='ventas.php?add=".$fila['idproducto']."' class='btn btn-success'>Agregar >></a></td>
		</tr>";
			
		}
		echo "</tbody></table>";

	}else{
		echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Ningun Producto o Serie encontrado</strong> Alerta ...
			</div>";
	}
}
	
		
