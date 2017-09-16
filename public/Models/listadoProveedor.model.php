<?php
require_once "Conexion.php";

class ListadoProveedor extends Conexion{

	public function Proveedor()
	{
		try {
			$sql = "SELECT idproveedor,nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website FROM proveedor";
			$data = $this->link->query($sql);
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}
}

?>

SELECT idproveedor,nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs,fecRegistro FROM proveedor;
