<script type="text/javascript" src="../Views/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Views/js/bootstrap.js"></script>

<script type='text/javascript'>
	function nuevo(dato)
	{
		
		var cod = document.getElementById('nuevocodigo').value = dato;
		alert(cod);


	}
</script>


<?php

require_once "../Models/productosVendidos.model.php";

$fecha = $_REQUEST['fechabusqueda'];

echo "Fecha consultada: " . $fecha ."<br>";

$proven = new ProductosVendidos();

$fechas = $proven->getProductoFecha($fecha);

echo "<table class='table table-hover'>
	<thead>
		<tr>
			<th>Fecha Venta</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Personal</th>
			<th>Id Producto</th>
			<th>opciones</th>
		</tr>
	</thead>
	<tbody>";
			while ($fila1 = $fechas->fetch_array())
			{
				echo "<tr>";
					$datosventa = $proven->RegistroVentas($fila1[0]);

					echo "<td>". $datosventa[0] ."</td>";
					echo "<td>". $datosventa[1] ."</td>";
					echo "<td>". $datosventa[2] ."</td>";
					echo "<td>". $datosventa[3] ."</td>";
					echo "<td>". $datosventa[4] ."</td>";
					echo "<td>";
					?>

					<input type='button' class='btn btn-success' value='Detalles' onclick="window.open('prodLista.php?idproducto=<?php echo $datosventa[4]; ?>','popUpWindow','height=500,width=450,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">
				<?php 
				echo "</td></tr>";
			}
			echo "<tbody></table>";

?>

