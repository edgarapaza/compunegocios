<?php
require_once("Conexion.php");

class Nuevafamilia
{
	private $con;

	function __construct()
	{
		$conexion = new Conexion();
		$this->con= $conexion->Conectarse();
		return $this->con;
	}

	public function ListaFamilias(){

		$sql = "SELECT * FROM familia ORDER BY familia;";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

		$data = $this->con->query($sql);
		return $data;

		mysqli_close($this->con);
	}

	public function AddFamilia($codigo,$familia){

		$duplicado = "SELECT IDfamilia FROM familia WHERE codigo = '$codigo' AND familia = '$familia';";
		$resultado = $this->con->query($duplicado);
		$data      = $resultado->fetch_array();

		if($data[0] == 0){
			$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia')";

			if (!$this->con->query($sql)) {
	 		  echo("Error description: " . mysqli_error($this->con));
			}

			echo "Agregado Satisfactoriamente";
		}else{
			echo "La Familia ya se encuentra Registrada";
		}

		mysqli_close($this->con);

	}

	public function MostrarSubfamilia($idfamilia){
		$sql = "SELECT codigo, subfamilia, idsubfamilias FROM subfamilias WHERE IDfamilia = " . $idfamilia;
		if(!$this->con->query($sql)){
			echo("Error description: " . mysqli_error($this->con));
		}
		$data = $this->con->query($sql);
		mysqli_close($this->con);
		return $data;
	}

	public function AddSubfamilia($codigo, $idfamilia, $subfamilia){
		$duplicado = "SELECT idsubfamilias FROM subfamilias WHERE IDfamilia = '$idfamilia' AND codigo = '$codigo' AND subfamilia = '$subfamilia';";

		$resultado = $this->con->query($duplicado);
		$data      = $resultado->fetch_array();

		if($data[0] == 0){
			$sql = "INSERT INTO subfamilias VALUES (NULL,'$idfamilia','$codigo','$subfamilia');";

			if(!$this->con->query($sql)){
				echo("Error description: " . mysqli_error($this->con));
			}

			echo "Guardado";
		}else{
			echo "Dato Duplicado";
		}

		mysqli_close($this->con);
	}
}

?>