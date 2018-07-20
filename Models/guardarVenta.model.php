<?php
require_once "Conexion.php";

class GuardarVenta
{
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function Guardar($idproducto,$precio,$cantidad,$total,$codprodgen,$idpersonal)
	{
		$flag = true;

		$sqlup1 = "SELECT stocktotal FROM productos WHERE idproducto = $idproducto;";

		$result1 = $this->con->query($sqlup1);
		$dat1 = $result1->fetch_array();
		
		//echo "Existen ".$dat1[0]. " elementos en la tabla . ";

		if($dat1[0] > 0){
			
			$nuevostock = $dat1[0] - $cantidad;

			echo " -- Nuevo Stock: ".$nuevostock;

			if($nuevostock < 0){

				echo "Error, esta tratando de vender mas productos de los que tiene.";

			}else{

				$sql = "INSERT INTO ventas VALUES (NULL,'$idproducto','$precio','$cantidad','$total',now(),$idpersonal);";

					if (!$this->con->query($sql)) {
			 		  echo("Error insertando ventas: " . mysqli_error($this->con));
			 		  $flag = false;
					}

				$sqlup2 = "UPDATE productos SET stocktotal = '$nuevostock', vendido = true WHERE idproducto = '$idproducto';";

					if (!$this->con->query($sqlup2)) {
			 		  echo("Error actualizando stock: " . mysqli_error($this->con));
			 		  $flag = false;
					}

				$sqlcomprove = "UPDATE compraprovedor SET cantidad = '$nuevostock' WHERE idproducto = $idproducto;";
					if (!$this->con->query($sqlcomprove)) {
			 		  echo("Error actualizando Compras: " . mysqli_error($this->con));
			 		  $flag = false;
					}

				if($flag == false){
					echo "Error";
				}else{
					echo "<div class='alert alert-success'><strong>Guardado!</strong> con exito....</div>";
				}
				
			}
		}
			
		mysqli_close($this->con);

	}
		
}

?>