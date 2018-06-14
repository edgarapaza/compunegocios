<?php
require_once "../Models/cliente.model.php";
$cliente = new Cliente();
$result = $cliente->ListadoClientes();

echo "<tr class='bg-info'><th>cod.</th><th>Nombre</th><th>DNI</th><th>Opciones</th></tr>";
while ($fila = $result->fetch_array(MYSQLI_ASSOC)){
echo "
		<tr>
		<td>".$fila['id']."</td>
		<td>".$fila['nombre']."</td>
		<td>".$fila['dni']."</td>
		<td><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-plus-sign'></span></button></td>
	  </tr>
	";
}
?>
