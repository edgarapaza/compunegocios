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
            mysqli_close($this->con);
	}

	public function SubFamilias()
	{

            $sql = "SELECT idsubfamilias, subfamilia FROM subfamilias;";
            $rpta = $this->con->query($sql);
            return $rpta;
            mysqli_close($this->con);
	}

	public function Proveedor($codigo)
	{
		$sql= "SELECT idproveedor, razonSocial FROM proveedor WHERE idproveedor = " . $codigo ;
    $rpta = $this->con->query($sql);
    $res = $rpta->fetch_array();
    return $res;
    mysqli_close($this->con);
	}

	public function Marca()
	{

            $sql= "SELECT idmarca, marca FROM marca;";
            $rpta = $this->con->query($sql);
            #$data = $rpta->fetch_array();
            return $rpta;
            mysqli_close($this->con);
	}

	public function Unidades()
	{
            $sql = "SELECT idunidad, unidadMedida FROM unidad;";
            $rpta = $this->con->query($sql);
            return $rpta;
            mysqli_close($this->con);
	}

	public function Almacen()
	{

		$sql = "SELECT idalmacen, almacen, descripcion, direccion FROM almacen";
		$rpta = $this->con->query($sql);
		return $rpta;
		mysqli_close($this->con);

	}

	public function UltimoCodigo()
	{

		$sql = "SELECT idproducto FROM productos ORDER BY idproducto DESC LIMIT 1;";
		$rpta = $this->con->query($sql);
		$dato = $rpta->fetch_array();
		mysqli_close($this->con);
		
		return $dato;
		
	}

}
