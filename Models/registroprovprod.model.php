<?php
require_once "Conexion.php";

class RegistroProveedorProducto
{
	private $con;

	function __construct()
	{
		$conexion = new Conexion();
		$this->con= $conexion->Conectarse();
		return $this->con;
	}

	public function RegistroProveProd($idproveedor, $idproducto=0)
	{
	
		$sql = "INSERT INTO registroprovprod (idregistro,idproveedor,fecregistro) VALUES (NULL,". $idproveedor .", now());";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}
		echo "Guardado";

		$dato = RegistroProveedorProducto::UltimoRegistro();
		return $dato;
		mysqli_close($this->con);
	}

	public function ListadoRegistroProvProd($idproveedor)
	{
		$sql = "SELECT idregistro, idproveedor, fecregistro FROM registroprovprod WHERE idproveedor = '". $idproveedor ."' ORDER BY fecregistro DESC;";

		if(!$res = $this->con->query($sql))
		{
			echo("Error Mostrar: " . mysqli_error($this->con));
		}

		return $res;
		mysqli_close($this->con);
	}

	public function UltimoRegistro()
	{
		$sql = "SELECT idregistro FROM registroprovprod ORDER BY idregistro DESC LIMIT 1";

		if(!$result = $this->con->query($sql))
		{
			echo("Error Ultimo: " . mysqli_error($this->con));
		}

		$ultimo = $result->fetch_array();
		return $ultimo;
		mysqli_close($this->con);
	}

	public function NombreProveedor($idproveedor)
	{
		$sql = "SELECT razonsocial FROM proveedor WHERE idproveedor = " . $idproveedor;

	  if(!$res1 = $this->con->query($sql))
	  {
	  	echo "Error Nombre. " . mysqli_error($this->con);
	  }

	  $fila = $res1->fetch_array(MYSQLI_ASSOC);

    return $fila;
    mysqli_close($this->con);
	}
}