<?php
require_once "Conexion.php";
/**
*
*/
class Proveedor extends Conexion
{
	public function AddProveedor($data)
	{
		$datos = unserialize(serialize($data));
		$dat1 = $datos['nombprove'];
		$dat2 = $datos['razonsocial'];
		$dat3 = $datos['numruc'];
		$dat4 = $datos['direccion'];
		$dat5 = $datos['celularpvd'];
		$dat6 = $datos['telfijopvd'];
		$dat7 = $datos['emailpvd'];
		$dat8 = $datos['websitepvd'];
		$dat9 = $datos['obspvd'];


		try {

			$fecha = date('Y-m-d H:m');
			$sql = "INSERT INTO proveedor (nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs,fecRegistro) VALUES ('$dat1','$dat2','$dat3','$dat4','$dat5','$dat6','$dat7','$dat8','$dat9','$fecha');";
			echo $sql;
			$rpta = $this->link->query($sql);

			return $rpta;

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function Duplicado($data)
	{

		try {
				$datos = unserialize(serialize($data));
				#echo "Numero de RUC: ".$datos['numruc'];
			$sql = "SELECT idproveedor FROM proveedor WHERE numRUC = '".$datos['numruc']."'";
			$rpta = $this->link->query($sql);
			$registros = $rpta->num_rows;
			if($registros > 0){
				echo "Ya existe";
			}else{
				$this::AddProveedor($data);
			}

		} catch (Exception $e) {
			throw $e;

		}
	}
}


?>