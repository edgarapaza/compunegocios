<?php

require_once "../Models/productosVendidos.model.php";

$numserie = $_REQUEST['minumserie'];

echo "Numero de Serie consultado: " . $numserie ."<br>";

$proven = new ProductosVendidos();

$idprodserie = $proven->getProductoSerie($numserie);
$data1 = $proven->RegistroVentasSerie($idprodserie[0]);

$data2 = $proven->Detalleproducto($idprodserie[0]);

echo "<div class='row'>
		<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 '>
		 <h3 class='bg-info'>Registro de Ventas del producto:</h3>
		";
			
			while ($fila1 = $data1->fetch_array()) {
				echo "FECHA DE VENTA: ".$fila1[0]."<br>";
				echo "ID producto   : ".$fila1[4]."<br>";
				echo "Precio        : S/. ".$fila1[1]."<br>";
				echo "Cantidad      : ".$fila1[2]."<br>";
				echo "Cod Personal  : ".$fila1[3]."<br>";
				echo "--------------------------------------<br>";
			}

echo "</div>";
		
	echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
			echo "<table class='table table-striped'><tbody>";
			while ($fila2 = $data2->fetch_array()) {
				
				echo "<tr><th>Codigo</th>   <td>". $fila2[0] ."</td></tr>";
				echo "<tr><th>Producto</th> <td>". $fila2[1] ."</td></tr>";
				echo "<tr><th>Familia</th>  <td>". $fila2[2] ."</td></tr>";
				echo "<tr><th>Num. Serie</th><td>". $fila2[3] ."</td></tr>";
				echo "<tr><th>Marca</th>    <td>". $fila2[4] ."</td></tr>";
				echo "<tr><th>Modelo</th>   <td>". $fila2[5] ."</td></tr>";
				echo "<tr><th>Parte</th>    <td>". $fila2[6] ."</td></tr>";
				echo "<tr><th>Almacen</th>  <td>". $fila2[7] ."</td></tr>";
			}
			echo "</tbody></table>";
	echo "</div> 	</div>";


?>

		
		