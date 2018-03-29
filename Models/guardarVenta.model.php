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

	public function Guardar($idproducto,$precio,$cantidad,$total)
	{
		
		$sqlup1 = "SELECT stocktotal from productos WHERE idproducto = " . $idproducto;

		$result1 = $this->con->query($sqlup1);
		$dat1 = $result1->fetch_array();
		
		//echo "Existen ".$dat1[0]. " elementos en la tabla . ";

		if($dat1[0] > 0){
			$nuevostock = $dat1[0] - $cantidad;

			//echo " -- Nuevo Stock: ".$nuevostock;

			if($nuevostock < 0){
				echo "Error, esta tratando de vender mas productos de los que tiene.";
			}else{

				$sql = "INSERT INTO ventas VALUES (NULL,'$idproducto','$precio','$cantidad','$total',now(),'1002')";

				if (!$this->con->query($sql)) {
		 		  echo("Error description 1: " . mysqli_error($this->con));
				}

				$sqlup2 = "UPDATE productos SET stocktotal = '". $nuevostock ."' WHERE idproducto = " . $idproducto;

				if (!$this->con->query($sqlup2)) {
		 		  echo("Error description 2: " . mysqli_error($this->con));
				}
				
				//echo " Stock Actualizado " . $nuevostock;
				echo "<div class='alert alert-success'><strong>Guardado!</strong> con exito....</div>";
			}
		}
	
		
		mysqli_close($this->con);

	}
		
}


?>