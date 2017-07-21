<?php
require_once "Conexion.php";

class Marca extends Conexion
{

	function AddMarca($codigo, $marca)
	{
		echo "Codigo:".$codigo;
		echo "Marca: ".$marca;

		$mar = $marca;
		$res = $this::Duplicado($mar);

		if($res > 0){
			echo "<script type='text/javascript'>alert('Duplicado');</script>";
		}else{
			try {

				$sql ="INSERT INTO marca (codigo,marca) VALUES ('". $codigo ."','". $marca ."')";
				$rpta = $this->link->query($sql);

			} catch (Exception $e) {
				throw $e;
			}
		}
		return true;
	}

	public function Duplicado($mar1)
	{
		echo "Marca enviado: ".$mar1;
		$sql = "SELECT idmarca FROM marca WHERE marca = '$mar1'";
		$res = $this->link->query($sql);
		$num = $res->num_rows;
		return $num;
	}
}

#$marca = new Marca();
#$marca->AddMarca('PIO','PIONER');
?>

