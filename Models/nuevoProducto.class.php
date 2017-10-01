<?php
require_once "Conexion.php";

class Producto{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function Familias()
	{

		$sql = "SELECT IDfamilia, familia FROM familia";
		$rpta = $this->con->query($sql);
        return $rpta;

	}

	public function SubFamilias()
	{

		$sql = "SELECT idsubfamilias, subfamilia FROM subfamilias;";
		$rpta = $this->con->query($sql);
        return $rpta;
	}

	public function Proveedor()
	{

		$sql= "SELECT idproveedor, razonSocial FROM proveedor;";
		$rpta = $this->con->query($sql);
        return $rpta;
	}

	public function Marca()
	{

		$sql= "SELECT idmarca, marca FROM marca;";
		$rpta = $this->con->query($sql);
        #$data = $rpta->fetch_array();
        return $rpta;
	}

	public function Unidades()
	{

		$sql = "SELECT idunidad, unidadMedida FROM unidad;";
		$rpta = $this->con->query($sql);
		return $rpta;
	}

	public function Almacen()
	{

		$sql = "SELECT idtienda, descripcion FROM tienda";
		$rpta = $this->con->query($sql);
		return $rpta;

	}

	public function UltimoCodigo()
	{

		$sql = "SELECT codigo FROM productos ORDER BY codigo DESC LIMIT 1;";
		$rpta = $this->con->query($sql);
		$dato = $rpta->fetch_array();
		return $dato;

	}

}

?>

