<?php
require_once "Conexion.php";

class NuevaSudFamilia extends Conexion
{

	public function Duplicado($IDfamilia,$codigo,$subfamilia)
	{

		$sql       = "SELECT idsubfamilias FROM subfamilias WHERE codigo = '$codigo' AND subfamilia = '$subfamilia';";
		echo $sql;
		$resultado = $this->link->query($sql);
		$data      = $resultado->fetch_array();
		echo $data[0];

		$devolver = "";
		if($data[0] == 0){
			$this::AddSubFamilia($IDfamilia,$codigo,$subfamilia);
			echo "<br> Nuevo no exite";
			$devolver = 0;
		}else{
			echo "Duplicado";
			$devolver = 1;
		}

		return $devolver;

	}

	public function AddSubFamilia($IDfamilia,$codigo,$subfamilia)
	{

		$sql = "INSERT INTO subfamilias (idsubfamilias,IDfamilia,codigo,subfamilia) VALUES (NULL, '$IDfamilia','$codigo','$subfamilia');";
		echo $sql;
		$this->link->query($sql);
	}

}

?>
