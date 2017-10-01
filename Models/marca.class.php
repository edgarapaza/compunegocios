<?php
require_once "Conexion.php";

class Marca extends Conexion
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}


	function AddMarca($codigo, $marca)
	{

		$sql ="INSERT INTO marca (codigo,marca) VALUES ('". $codigo ."','". $marca ."')";
		echo $sql;
		$rpta = $this->con->query($sql);
	}

	public function Duplicado($codigo, $marca1)
	{
		echo "codigo:".$codigo;
		echo "marca1:".$marca1;

		$sql = "SELECT * FROM marca WHERE marca = '$marca1'";
		echo $sql;
		$res = $this->con->query($sql);
		$num = $res->fetch_array();
		echo "Numeor: ". $num[0];

		$devolver = "";

		if($num[0] == 0){
			$this::AddMarca($codigo, $marca1);
			$devolver = 0;
		}else{
			echo "Duplicado";
			$devolver = 1;
		}

		return $devolver;
	}
}

#$marca = new Marca();
#$marca->AddMarca('PIO','PIONER');
?>

