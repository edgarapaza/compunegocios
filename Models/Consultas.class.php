<?php
require_once "Conexion.php";

class Consultas{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}


	public function ProductoSerie()
	{
		try{

			$sql = "SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,imagen,IDAlmacen FROM compu.productos WHERE numserie = '7506339390230'";
			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
			$this::getProveedor($fila[2]);
			$this::getFamilia($fila[7]);
			//$this::getSbFamilia($fila[8]);
			$this::getMarca($fila[9]);

		}catch(Exception $e){
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getProveedor($idproveedor)
	{
		try {
			$sql = "SELECT nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs FROM proveedor WHERE idproveedor = ". $idproveedor;

			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Proveedor: ".$fila['0'];
			return $fila['0'];


		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getFamilia($idfamilia)
	{
		try {
			$sql = "SELECT familia FROM familia WHERE IDfamilia = " . $idfamilia;


			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Familia: ".$fila['0'];
			return $fila['0'];


		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getSubFamilia($idsubfamilia ='', $idfamilia)
	{
		try {
			$sql = "SELECT Subfamilia FROM subfamilias WHERE idsubfamilias = $idsubfamilias AND IDfamilia = $idfamilia";


			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Sub Familia: ".$fila['0'];
			return $fila['0'];


		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getMarca($idmarca)
	{
		try {
			$sql = "SELECT marca FROM marca WHERE idmarca = " .$idmarca;


			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];


		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getPersonal($idpersonal='')
	{
		try {
			$sql = "SELECT CONCAT(nombres,' ',paterno,' ',materno) AS personal FROM Personal WHERE IDPersonal = " . $idpersonal;

			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

	public function getTienda($idTienda ='')
	{
		try {

			$sql = "SELECT descripcion FROM tienda WHERE idtienda = " . $idTienda;

			$res = $this->con->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}

		mysqli_close($this->con);
	}

}

$consultas = new Consultas();
$consultas->ProductoSerie();

 ?>