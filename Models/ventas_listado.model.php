<?php 

require_once "Conexion.php";

class ListadoVentas
{
	
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function ListaVentas()
	{
		$sql = "SELECT v.idventas, p.descripcion, v.precio, v.cantidad, v.total, concat(per.nombres,' ',per.paterno,' ',per.materno) as trabajador, v.fecRegisto
		FROM ventas as v, productos as p, Personal as per
		WHERE v.idproducto = p.idproducto AND v.IDPersonal = per.IDPersonal";

		if(!$data = $this->con->query($sql)){
			echo "Error: " . mysqli_error($this->con);
		}

		return $data;
		mysqli_close($this->con);
	}

	public function ListaVentasxFecha($fecha)
	{
		$sql = "SELECT v.idventas, p.descripcion, v.precio, v.cantidad, v.total, concat(per.nombres,' ',per.paterno,' ',per.materno) as trabajador, v.fecRegisto
		FROM ventas as v, productos as p, Personal as per
		WHERE v.idproducto = p.idproducto AND v.IDPersonal = per.IDPersonal AND v.fecRegisto LIKE '$fecha%'";

		if(!$data = $this->con->query($sql)){
			echo "Error: " . mysqli_error($this->con);
		}

		return $data;
		mysqli_close($this->con);
	}
}

?>