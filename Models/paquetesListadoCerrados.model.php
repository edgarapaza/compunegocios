<?php 
require_once "Conexion.php";

class PaquetesListado
{

	private $conn;

	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function ListadoPaquetesCerrados()
	{
		$sql = "SELECT idps_temp, descpaquete, total, fecha, razonsocial, ruc, direccion FROM paqsuma_temp WHERE pendiente = 0 AND total <> 0 ORDER BY fecha DESC";

		if (!$res = $this->conn->query($sql)) {
			echo("Error listado: " . mysqli_error($this->con));
		}

		return $res;
		mysqli_close($this->con);
		#echo "<div class='alert alert-success'><strong>Listado!</strong></div>";
	}
}


/*
$paqlista = new PaquetesListado();
$data = $paqlista->ListadoPaquetesCerrados();


while ($fila = $data->fetch_array(MYSQL_ASSOC)) {
	echo $fila['idps_temp'];
	echo $fila['descpaquete'];
	echo $fila['total'];
	echo $fila['fecha'];
	echo "<br>";
}
*/
?>