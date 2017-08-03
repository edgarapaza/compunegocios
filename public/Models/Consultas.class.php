<?php
require_once "Conexion.php";
/**
*
*/
class Consultas extends Conexion
{

	public function ProductoSerie($serie)
	{
		try{

			$sql = "SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,imagen,IDAlmacen FROM compu.productos WHERE numserie = '". $serie."'";
			$res    = $this->link->query($sql);

			$fila   = $res->fetch_array();

			$prov   = $this::getProveedor($fila[2]);
			$fam    = $this::getFamilia($fila[6]);
			//$subfam = $this::getSubFamilia($fila[7]);
			$mar    = $this::getMarca($fila[8]);
			$per = $this::getPersonal($fila[25]);
			$tien = $this::getTienda($fila[31]);

			$valores = array(
			$fila[0],
			$fila[1],
			$prov,
			$fila[3],
			$fila[4],
			$fila[5],
			$fila[6],
			$fam,
			$mar,
			$fila[9],
			$fila[10],
			$fila[11],
			$fila[12],
			$fila[13],
			$fila[14],
			$fila[15],
			$fila[16],
			$fila[17],
			$fila[18],
			$fila[19],
			$fila[20],
			$fila[21],
			$fila[22],
			$fila[23],
			$fila[24],
			$per,
			$fila[26],
			$fila[27],
			$fila[28],
			$fila[29],
			$fila[30],
			$tien
			);


			return $valores;

		}catch(Exception $e){
			throw $e;
		}
	}

	public function getProveedor($idproveedor)
	{
		try {
			$sql = "SELECT nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs FROM proveedor WHERE idproveedor = ". $idproveedor;

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Proveedor: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getFamilia($idfamilia)
	{
		try {
			$sql = "SELECT familia FROM familia WHERE IDfamilia = " . $idfamilia;

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Familia: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getSubFamilia($idsubfamilia ='', $idfamilia)
	{
		try {
			$sql = "SELECT Subfamilia FROM subfamilias WHERE idsubfamilias = $idsubfamilias AND IDfamilia = $idfamilia";

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Sub Familia: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getMarca($idmarca)
	{
		try {
			$sql = "SELECT marca FROM marca WHERE idmarca = " .$idmarca;

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getPersonal($idpersonal='')
	{
		try {
			$sql = "SELECT CONCAT(nombres,' ',paterno,' ',materno) AS personal FROM Personal WHERE IDPersonal = " . $idpersonal;

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getTienda($idTienda ='')
	{
		try {

			$sql = "SELECT descripcion FROM tienda WHERE idtienda = " . $idTienda;

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];

		} catch (Exception $e) {
			throw $e;
		}
	}

}

 ?>