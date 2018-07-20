<?php 
require_once "../Models/moveralmacen.model.php";

$codigo = $_REQUEST['cod'];
//echo "Codigo enviado: ".$codigo;
$mover = new MoverAlmacen();
$todo = $mover->MostrarxAlmacen($codigo);

echo "<table class='table table-hover'>
				<thead>
					<tr>
						<th>Cod. Prod.</th>
						<th>Producto</th>
						<th>Marca</th>
						<th>Modelo</th>
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
	echo "<td>". $fila['nuevo'] ."</td>";
	echo "<td>". $fila['cantidad'] ."</td>";
	echo "<td>
				
						<a href='./nuevoAlmacenx.php?idproducto=". $fila['idproducto'] ."&idalmacen=". $fila['idalmacennuevo'] ."&almacen=". $fila['nuevo'] ."' class='btn btn-danger'>Mover a</a>
 				</td></tr>";
	
}

echo "</tbody></table>";

?>

<script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=300,height=200,left = 390,top = 50');
    }
    </script>
