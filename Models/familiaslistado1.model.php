<?php 
require_once "Conexion.php";

class FamiliasLista
{

	private $conn;
	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function FamiliasListado(){

		$sql = "SELECT IDfamilia, codigo, familia FROM familia";

		if(!$result = $this->conn->query($sql))
		{
			echo "Error Description: " . mysqli_error($this->conn);
		}

		return $result;
		mysqli_close($this->con);
	}

}

?>
