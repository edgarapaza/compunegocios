<?php
require_once "Conexion.php";

class ProductosVendidos
{
	private $conn;
	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function getProductoSerie($serie)
	{
		$sql = "SELECT idproducto FROM productos WHERE numserie = '$serie';";
		if(!$rtpa = $this->conn->query($sql))
		{
			echo "Error obteniendo codigo por Serie" . mysqli_error($this->conn);
		}

		if($rtpa->num_rows <= 0){
			echo "Ninguno";
		}else{
		
			$idproducto = $rtpa->fetch_array();
		}

		return $idproducto;

		mysqli_close($this->conn);
	}

	public function getProductoProducto($nombre)
	{
		$sql = "SELECT idproducto FROM productos WHERE descripcion LIKE '% $nombre %';";
		if(!$rtpa = $this->conn->query($sql))
		{
			echo "Error obteniendo codigo por producto" . mysqli_error($this->conn);
		}

		return $rtpa;
		mysqli_close($this->conn);
	}

	public function getProductoFecha($fecha)
	{
		$sql = "SELECT idproducto FROM productos WHERE fecAlta LIKE '$fecha%';";
		if(!$rtpa = $this->conn->query($sql))
		{
			echo "Error obteniendo codigo por Fecha" . mysqli_error($this->conn);
		}

		if($rtpa == NULL){
			echo "Ninguno encontrado";
		}

		return $rtpa;
		mysqli_close($this->conn);
	}

	public function getProductoMes($mes, $anio)
	{
		$mes_anio = $anio.'-'.$mes;
		$sql = "SELECT idproducto FROM productos WHERE fecAlta LIKE '$mes_anio%';";

		if(!$rtpa = $this->conn->query($sql))
		{
			echo "Error obteniendo codigo por mes" . mysqli_error($this->conn);
		}

		return $rtpa;
		mysqli_close($this->conn);
	}

	public function RegistroVentasSerie($idproducto)
	{
		
		$sql = "SELECT fecRegisto, precio,cantidad, IDPersonal, idproducto FROM ventas WHERE idproducto = $idproducto;";

		if(!$dat = $this->conn->query($sql))
		{
			echo "Error Registro de Ventas" . mysqli_error($this->conn);
		}

		return $dat;
		mysqli_close($this->conn);
	}

	public function RegistroVentas($idproducto)
	{
		
		$sql = "SELECT fecRegisto, precio,cantidad, IDPersonal, idproducto FROM ventas WHERE idproducto = $idproducto;";

		if(!$dat = $this->conn->query($sql))
		{
			echo "Error Registro de Ventas" . mysqli_error($this->conn);
		}

		$datos = $dat->fetch_array();
		return $datos;
		mysqli_close($this->conn);
	}

	public function Detalleproducto($idproducto)
	{
		$sql = "SELECT p.codigo, p.descripcion, f.familia, p.numserie, m.marca, p.modelo, p.parte, a.almacen FROM productos as p, familia as f, almacen as a, marca as m WHERE p.idfamilia = f.idfamilia AND p.idalmacen = a.idalmacen AND p.marca = m.idmarca AND idproducto = $idproducto;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		return $rpta;
		mysqli_close($this->conn);
	}

	public function Detalleproducto2($idproducto)
	{
		$sql = "SELECT p.codigo, p.descripcion, f.familia, p.numserie, m.marca, p.modelo, p.parte, a.almacen FROM productos as p, familia as f, almacen as a, marca as m WHERE p.idfamilia = f.idfamilia AND p.idalmacen = a.idalmacen AND p.marca = m.idmarca AND idproducto = $idproducto LIMIT 1;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		$fila = $rpta->fetch_array();
		return $fila;
		mysqli_close($this->conn);
	}

}

?>
