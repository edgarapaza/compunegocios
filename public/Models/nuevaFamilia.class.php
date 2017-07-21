<?php
require_once "Conexion.php";
/**
*
*/
class NuevaFamilia extends Conexion
{

	public function Duplicado($codigo,$familia)
	{

		$sql = "SELECT IDfamilia FROM familia WHERE codigo ='$codigo' AND familia ='$familia' AND descripcion ='$descripcion' AND caracteristica1 ='$caracteristica1'";
		$resultado = $this->link->query($sql);
		$num       = $resultado->num_rows;
		return $num;

	}

	public function AddFamilia($codigo,$familia)
	{
		$respuesta = $this::Duplicado($codigo,$familia);

		if($respuesta > 0){
			echo "Duplex";

		}else{

			$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia')";

			$this->link->query($sql);
		}

	}

}

?>