<?php
require_once "Conexion.php";

class Personal{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddPersonal($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$idpersonal,$cargo,$usuario,$passwd,$nivel,$estado)
	{
		
		$sql_duplicado = "SELECT IDpersonal FROM Personal WHERE nombres = '$nombres' AND paterno ='$paterno' AND materno = '$materno' AND dni ='$dni' LIMIT 1;";
		
		if(!$res = $this->con->query($sql_duplicado)){
			echo ("Error consulta Duplicado " . mysqli_error($this->con));
		}
		
		$num = $res->fetch_array();
		
		
		if($num[0] > 0)
		{ 
			$msg = "Dato Duplicado";
			echo $msg;
			return $msg;
		}else{
			$sql ="INSERT INTO Personal VALUES (NULL,'$nombres','$paterno','$materno','$dni','$direccion','$telefono1','$telefono2',now(),'$idpersonal','$cargo','./img/faces/avatar.png');";
		
			if(!$this->con->query($sql))
			{
				echo ("Error Insertando nuevo personal ". mysqli_error($this->con));
			}

			# Selecciono el ultimo codigo del personal creado 
			$sql_ultimo = "SELECT IDPersonal FROM Personal ORDER BY IDPersonal DESC LIMIT 1;";
			$result1 = $this->con->query($sql_ultimo);
			$ultimo = $result1->fetch_array();


			$sql_login = "INSERT INTO login VALUES (NULL,'$ultimo[0]','$usuario','$passwd','$nivel','$estado');";


			if(!$this->con->query($sql_login))
			{
				echo ("Error Insertando Datos Login ". mysqli_error($this->con));
			}

			return 0;


		}
		
		


		mysqli_close($this->con);
	}


	public function NombreTrabajador($idpersonal)
	{
		$sqlt = "SELECT nombres, concat(paterno,' ',materno) as apellidos, cargo, foto FROM Personal WHERE IDPersonal = $idpersonal";

		if (!$data = $this->con->query($sqlt)) {
 		  echo "Error consulta personal: " . mysqli_error($this->con);
		}

		$fila = $data->fetch_array();

		return $fila;

		mysqli_close($this->con);
	}
}

//$pers = new Personal();
//$pers->AddPersonal('Patricia','Luque','Tello','12345679');

?>