<?php
require_once "Conexion.php";

class Personal{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	function AddPersonal($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$obs,$idpersonal)
	{
		echo "aqui";
		$sql ="INSERT INTO Personal (IDPersonal,nombres,paterno,materno,dni,direccion,telefono1,telefono2,obs,creadopor) VALUES (NULL,'$nombres','$paterno','$materno','$dni','$direccion','$telefono1','$telefono2','$obs','$idpersonal');";
		echo $sql;
		$this->con->query($sql);
	}

	public function Duplicado($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$obs,$idpersonal)
	{
		$sql = "SELECT IDpersonal FROM Personal WHERE nombres = '$nombres' AND paterno ='$paterno' AND materno = '$materno' AND dni ='$dni';";
		echo $sql;
		$res = $this->con->query($sql);
		$num = $res->fetch_array();


		$devolver = "";

		if($num[0] == 0){
			$this::AddPersonal($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$obs,$idpersonal);
			$devolver = 0;
		}else{
			$devolver = 1;
			echo "Dupli";
		}

		return $devolver;
	}
}

?>