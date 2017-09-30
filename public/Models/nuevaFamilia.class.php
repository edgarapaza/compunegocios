<?php
require_once "Conexion.php";

class NuevaFamilia{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function Duplicado($codigo,$familia)
	{

		$sql       = "SELECT * FROM familia WHERE codigo ='$codigo' AND familia ='$familia';";
		echo $sql;
		$resultado = $this->con->query($sql);
		$data      = $resultado->fetch_array();
		echo $data[0];
		$devolver = "";
		if($data[0] == 0){
			$this::AddFamilia($codigo, $familia);
			echo "<br> Nuevo no exite";
			$devolver = 0;
		}else{
			echo "Duplicado";
			$devolver = 1;
		}

		return $devolver;

	}

	public function AddFamilia($codigo,$familia)
	{

		$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia')";
		echo $sql;
		$this->con->query($sql);
	}

}

?>
