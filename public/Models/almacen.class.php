<?php
require_once "Conexion.php";

class Almacen
{
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddAlmacen($tienda, $descripcion, $direccion, $telefono, $idpersonal)
	{

		$duplicado = "SELECT count(*) FROM tienda WHERE descripcion = '$descripcion' AND direccion = '$direccion';";
		$res = $this->con->query($duplicado);
		if (!$this->con->query($duplicado)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

		$num = $res->fetch_array();

		if($num[0] == 0){

			$sql_ultimo = "SELECT idtienda FROM tienda order by idtienda desc limit 1";
			$last = $this->con->query($sql_ultimo);
			$valor_final = $last->fetch_array();
			$next = $valor_final[0] + 1;


			$sql ="INSERT INTO tienda VALUES ('$next','$tienda','$descripcion','$direccion','$telefono','$idpersonal');";

			if (!$this->con->query($sql)) {
	 		  echo("Error description: " . mysqli_error($this->con));
			}
		}

		$this->con->close();
		echo "Guardado";
	}

}
?>