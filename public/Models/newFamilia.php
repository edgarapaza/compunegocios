<?php
require_once "Conexion.php";
/**
*
*/
class NewFamilia extends Conexion
{

	public function AddFamilia()
	{
		$respuesta = $this::Duplicado();

		if($respuesta > 0){
			echo "Duplicado";
		}else{

			try {
				$sql = "INSERT INTO familia (IDfamilia,codigo,familia,descripcion,caracteristica1,caracteristica2,caracteristica3,caracteristica4,caracteristica5,caracteristica6,tipoArticulo,IDprecio) VALUES ('$IDfamilia','$codigo','$familia','$descripcion','$caracteristica1','$caracteristica2','$caracteristica3','$caracteristica4','$caracteristica5','$caracteristica6','$tipoArticulo','$IDprecio')";
				$this->link->query($sql);
				print "<script type='text/javascript'>alert('Guardado');</script>";
			} catch (Exception $e) {
				throw $e;

			}

		}

	}

	public function Duplicado()
	{
		$sql = "SELECT codigo,familia,descripcion,caracteristica1,caracteristica2 FROM familia";

		$res = $this->link->query($sql);
		$num = $res->num_rows;
		return $num;
	}
}

$newFamilia = new NewFamilia();
$newFamilia->AddFamilia();
$newFamilia->Duplicado();
?>