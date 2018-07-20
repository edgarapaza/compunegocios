<?php 
require_once "../Models/paquete.model.php";

$paq        = new Paquete();
# id es idproducto
$idproducto = $_REQUEST['id'];
$cantidad   = $_REQUEST['cantidad'];
$stock      = $_REQUEST['stock'];


echo "Codigo del Producto recibido: " . $idproducto;

$idps_temp =  $paq->GenerarPaqueteSuma();

$data      = $paq->Detalleproducto($idproducto);

$fecalta    = date('Y-m-d h:i:s');
$prod       = $data['descripcion'];
$marca      = $data['marca'];
$modelo     = $data['modelo'];
$serie      = $data['numserie'];
$precio     = $data['precventa3'];
$stocktotal = $data['stocktotal'];
$subtotal   = $precio * $cantidad;

printf("Producto: %s Stock: %s Venta: %s ", $prod, $stocktotal, $cantidad);
if($cantidad > 0){

	if($stocktotal >= 1){

		if($cantidad <= $stocktotal){

			$resta = $stocktotal - $cantidad;
			printf("\nValor de la Resta %s", $resta);

			if( $resta == 0 ){

				$sql_up1 = "agregar a la tabla vendidos temporal";
				print("actualizar campo vendido = true\n");
				print("actualizar campo ocultar = true\n");

				$paq->InsertPaqueteTemporalCero($fecalta,$idproducto,$prod,$modelo, $cantidad, $precio, $subtotal, $idps_temp,$marca,$serie);
				header("Location: ../Views/paquetesAgregados.php");
				
			}else{

				if($resta > 0){

					$paq->InsertPaqueteTemporalExistencia($fecalta,$idproducto,$prod,$modelo, $cantidad, $precio, $subtotal, $idps_temp,$marca,$serie,$resta);

					header("Location: ../Views/paquetesAgregados.php");
					
				}else{

					print("Error en el ingreso de los datos");
				}
			}
		}else{
			printf("No procede la venta, debido a que el numero exdece a la cantidad en Stock");
		}

	}else{
		echo "Valor 0 o negativo";
	}
}else{
	printf("No se aceptan valores negativos o Ceros");
}




?>