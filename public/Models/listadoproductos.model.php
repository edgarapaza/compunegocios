<?php
require_once "Conexion.php";

class Listado extends Conexion
{

	public function Productos()
	{
		try {
			$sql = "SELECT IDproducto,producto,numserie,IDFamilia,IDSubFam,IDmarca,modelo,descripcion,precioVenta,cantidad,obs,imagen,IDAlmacen FROM productos";
			$data = $this->link->query($sql);
			return $data;
		} catch (Exception $e) {
			throw $e;
		}

	}

	public function Familias()
	{

	}

}

?>