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
		$duplicado = "SELECT idtienda FROM tienda WHERE tienda = '$tienda' AND descripcion = '$descripcion' AND direccion = '$direccion'";

		if($res = $this->con->query($duplicado))
		{
			$num = $res->num_rows;

			if($num == 0){

				$sql_ultimo = "SELECT idtienda FROM tienda order by idtienda desc limit 1";

				$last = $this->con->query($sql_ultimo);
				$valor_final = $last->fetch_array();
				$next = $valor_final[0] + 1;

				$sql ="INSERT INTO tienda VALUES ('$next','$tienda','$descripcion','$direccion','$telefono','1001');";

				if (!$this->con->query($sql)) {
		 		  echo("Error description: " . mysqli_error($this->con));
		 		  exit;
				}

				echo "<span class='alert alert-success'>Almacen Guardado!!!</span>";
			}else{
				echo "<span class='alert alert-danger'>Alerta!... Dato duplicado.</span>";
			}

			$res->close();

		}else{
			echo("Error description: " . mysqli_error($this->con));
		}

		mysqli_close($this->con);
	}
}
?>