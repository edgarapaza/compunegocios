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


	public function ListaMarca()
	{

		$sql = "SELECT idmarca, codigo, marca FROM marca ORDER BY marca";
		$dat = $this->con->query($sql);
		return $dat;
		mysqli_close($this->con);
	}

	public function Duplicado($codigo, $marca1)
	{
		
		$sql = "SELECT * FROM marca WHERE marca = '$marca1'";
		
		$res = $this->con->query($sql);
		$num = $res->fetch_array();
				
		if($num[0] == 0){
			
			$sql2 ="INSERT INTO marca (codigo,marca) VALUES ('". $codigo ."','". $marca1 ."')";
		
			if(!$this->con->query($sql2)){
				echo "Error. ". mysqli_error($this->con);
			}
			echo "<span class='alert alert-success'>Nueva Marca Agregada!!!</span>";
			
		}else{
			echo "<span class='alert alert-danger'>Alerta!... Dato duplicado.</span>";
			
		}

		mysqli_close($this->con);
	}
}

?>

