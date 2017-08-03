<?php
require_once "Conexion.php";
/**
*
*/
class Consultas extends Conexion
{

	public function ProductoSerie()
	{
		try{

			$sql = "SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,imagen,IDAlmacen FROM compu.productos WHERE numserie = '7506339390230'";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
			$this::getProveedor($fila[2]);
			$this::getFamilia($fila[7]);
			//$this::getSbFamilia($fila[8]);
			$this::getMarca($fila[9]);

		}catch(Exception $e){
			throw $e;
		}
	}

	public function getProveedor($idproveedor)
	{
		try {
			$sql = "SELECT nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs FROM proveedor WHERE idproveedor = ". $idproveedor;
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getFamilia($idfamilia)
	{
		try {
			$sql = "SELECT familia FROM familia WHERE IDfamilia = " . $idfamilia;
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getSubFamilia($idsubfamilia ='', $idfamilia)
	{
		try {
			$sql = "SELECT Subfamilia FROM subfamilias WHERE idsubfamilias = $idsubfamilias AND IDfamilia = $idfamilia";
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getMarca($idmarca)
	{
		try {
			$sql = "SELECT marca FROM marca WHERE idmarca = " .$idmarca;
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);

		} catch (Exception $e) {
			throw $e;
		}
	}
}

$consultas = new Consultas();
$consultas->ProductoSerie();

/*


SELECT CONCAT(nombres,' ',paterno,' ',materno) AS personal FROM Personal WHERE IDPersonal = 1002;

SELECT descripcion FROM tienda WHERE idtienda = 4;
*/
 ?>