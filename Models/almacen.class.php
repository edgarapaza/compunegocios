<?php
require_once "Conexion.php";

class Almacen
{
	private $con;

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddAlmacen($tienda, $descripcion, $direccion, $telefono, $idpersonal)
	{
		$duplicado = "SELECT idalmacen FROM almacen WHERE almacen = '".$tienda."'";

		if($res = $this->con->query($duplicado))
		{
			$num = $res->num_rows;

			if($num == 0){

				$sql_ultimo = "SELECT idalmacen FROM almacen order by idalmacen desc limit 1";

				$last = $this->con->query($sql_ultimo);
				$valor_final = $last->fetch_array();
				$next = $valor_final[0] + 1;

				$sql ="INSERT INTO almacen (idalmacen,almacen,descripcion,direccion,telefono,IDpersonal) VALUES ('$next','$tienda','$descripcion','$direccion','$telefono','1002')";

				if (!$this->con->query($sql)) {
		 		  echo("Error description insert: " . mysqli_error($this->con));
		 		  exit;
				}

				echo "<span class='alert alert-success'>Almacen Guardado!!!</span>";
			}else{
				echo "<span class='alert alert-danger'>Alerta!... Dato duplicado.</span>";
			}

			$res->close();

		}else{
			echo("Error description final: " . mysqli_error($this->con));
		}

		mysqli_close($this->con);
	}
}
?>