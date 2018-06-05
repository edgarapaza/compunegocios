<?php 
require_once "header4.php";
require_once "../Models/productosVendidos.model.php";

$idproducto = $_REQUEST['idproducto'];


$proven = new ProductosVendidos();

echo "<table class='table table-striped'><tbody>";	
				$fila2 = $proven->Detalleproducto2($idproducto);
				
				
				echo "<tr><th>Codigo</th>   <td>". $fila2[0] ."</td></tr>";
				echo "<tr><th>Producto</th> <td>". $fila2[1] ."</td></tr>";
				echo "<tr><th>Familia</th>  <td>". $fila2[2] ."</td></tr>";
				echo "<tr><th>Num. Serie</th><td>". $fila2[3] ."</td></tr>";
				echo "<tr><th>Marca</th>    <td>". $fila2[4] ."</td></tr>";
				echo "<tr><th>Modelo</th>   <td>". $fila2[5] ."</td></tr>";
				echo "<tr><th>Parte</th>    <td>". $fila2[6] ."</td></tr>";
				echo "<tr><th>Almacen</th>  <td>". $fila2[7] ."</td></tr>";
			
			echo "
			</tbody></table>";
?>