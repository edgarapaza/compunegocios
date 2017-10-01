<?php
require_once "Conexion.php";

class NuevaFamilia
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddFamilia($codigo,$familia)
	{

		$duplicado = "SELECT * FROM familia WHERE codigo ='$codigo' AND familia ='$familia';";

		$resultado = $this->con->query($duplicado);
		$data      = $resultado->fetch_array();
		echo $data[0];

		if($data[0] == 0){
			$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia')";

			if (!$this->con->query($sql)) {
	 		  echo("Error description: " . mysqli_error($this->con));
			}

			echo "Ingresado";
		}else{
			echo "Duplicado";
		}

		$this->con->close();

	}

	public function ListaFamilias(){

		$sql = "SELECT * FROM familia ORDER BY familia;";

			if (!$this->con->query($sql)) {
	 		  echo("Error description: " . mysqli_error($this->con));
			}
		$data = $this->con->query($sql);

		return $data;
		//$this->con->close();
	}

}
echo "h";
$newfam = new NuevaFamilia();
$data = $newfam->ListaFamilias();
while ($fila = $data->fetch_array()) {
	$fila[0]."<br>";
	$fila[1]."<br>";
	$fila[2]."<br>";
}
?>
