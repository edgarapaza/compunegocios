<?php
require_once "Conexion.php";
/**
*
*/
class Consultas extends Conexion
{

<<<<<<< HEAD
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
=======
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
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385

		}catch(Exception $e){
			throw $e;
		}
	}

	public function getProveedor($idproveedor)
	{
		try {
			$sql = "SELECT nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs FROM proveedor WHERE idproveedor = ". $idproveedor;
<<<<<<< HEAD

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Proveedor: ".$fila['0'];
			return $fila['0'];
=======
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getFamilia($idfamilia)
	{
		try {
			$sql = "SELECT familia FROM familia WHERE IDfamilia = " . $idfamilia;
<<<<<<< HEAD

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Familia: ".$fila['0'];
			return $fila['0'];
=======
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getSubFamilia($idsubfamilia ='', $idfamilia)
	{
		try {
			$sql = "SELECT Subfamilia FROM subfamilias WHERE idsubfamilias = $idsubfamilias AND IDfamilia = $idfamilia";
<<<<<<< HEAD

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Sub Familia: ".$fila['0'];
			return $fila['0'];
=======
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getMarca($idmarca)
	{
		try {
			$sql = "SELECT marca FROM marca WHERE idmarca = " .$idmarca;
<<<<<<< HEAD

			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			#echo "Marca: ".$fila['0'];
			return $fila['0'];
=======
			echo "<br>---------------------------------------------<br>";
			$res = $this->link->query($sql);
			$fila = $res->fetch_array();
			var_dump($fila);
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385

		} catch (Exception $e) {
			throw $e;
		}
	}
<<<<<<< HEAD

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

=======
}

$consultas = new Consultas();
$consultas->ProductoSerie();

/*


SELECT CONCAT(nombres,' ',paterno,' ',materno) AS personal FROM Personal WHERE IDPersonal = 1002;

SELECT descripcion FROM tienda WHERE idtienda = 4;
*/
>>>>>>> e258af6d66b5fb7e9c6421e585da58b05454e385
 ?>