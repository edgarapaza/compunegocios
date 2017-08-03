<?php
require_once "Conexion.php";

class Almacen extends Conexion
{

	function AddAlmacen($tienda, $descripcion, $direccion, $telefono, $idpersonal)
	{

		$sql_ultimo = "SELECT idtienda FROM tienda order by idtienda desc limit 1";
		$last = $this->link->query($sql_ultimo);
		$valor_final = $last->fetch_array();
		$next = $valor_final[0] + 1;


		$sql ="INSERT INTO tienda (idtienda,tienda,descripcion,direccion,telefono,IDpersonal) VALUES ('$next','$tienda','$descripcion','$direccion','$telefono','$idpersonal');";

		$rpta = $this->link->query($sql);
	}

	public function Duplicado($tienda, $descripcion, $direccion, $telefono, $idpersonal)
	{
		$sql = "SELECT count(*) FROM tienda WHERE descripcion = '$descripcion' AND direccion = '$direccion';";

		$res = $this->link->query($sql);
		$num = $res->fetch_array();


		$devolver = "";

		if($num[0] == 0){
			$this::AddAlmacen($tienda, $descripcion, $direccion, $telefono, $idpersonal);
			$devolver = 0;
		}else{
			$devolver = 1;
		}

		return $devolver;
	}
}
?>