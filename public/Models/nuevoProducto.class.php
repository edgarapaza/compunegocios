<?php
require_once "Conexion.php";

class Producto extends Conexion
{
	private $numserie;
	private $provedor;
	private $familia;
	private $subfamilia;
	private $marca;
	private $numfactura;
	private $fechaEmision;
	private $descripcion;
	private $modelo;
	private $tipoUnidad;
	private $cantidad;
	private $precioUnitario;
	private $margenGanancia;
	private $precioVenta;
	private $tipoArticulo;
	private $almacen;

	public function Familias()
	{
		try {
			$sql = "SELECT IDfamilia, familia FROM familia;";
			$rpta = $this->link->query($sql);

	        return $rpta;

		} catch (Exception $e) {
			throw $e;
		}
	}

	public function SubFamilias()
	{
		try{
			$sql = "SELECT idsubfamilias, subfamilia FROM subfamilias;";
			$rpta = $this->link->query($sql);
	        return $rpta;
		}catch(Exception $e){
			throw $e;
		}
	}

	public function Proveedor()
	{
		try {
			$sql= "SELECT idproveedor, razonSocial FROM proveedor;";
			$rpta = $this->link->query($sql);
	        #$data = $rpta->fetch_array();
	        return $rpta;
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function Marca()
	{
		try {
			$sql= "SELECT idmarca, marca FROM marca;";
			$rpta = $this->link->query($sql);
	        #$data = $rpta->fetch_array();
	        return $rpta;
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function Unidades()
	{
		try{
			$sql = "SELECT idunidad, unidadMedida FROM unidad;";
			$rpta = $this->link->query($sql);
			return $rpta;
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function Almacen()
	{
		try {
			$sql = "SELECT idalmacen, descripcion FROM almacen";
			$rpta = $this->link->query($sql);
			return $rpta;
		} catch (Exception $e) {
			throw $e;
		}

	}


	public function Modificar(){

	}

	public function Eliminar(){

	}

	public function Consulta(){

	}

}

/*
$producto = new Producto();
$subfam = $producto->SubFamilias();
while ($listaSubFam = $subfam->fetch_array(MYSQLI_ASSOC)) {
	echo $listaSubFam['idsubfamilias'];
	echo $listaSubFam['subfamilias'];
}
$lista = $producto->Familias();
while ($fila = $lista->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['IDfamilia']." ".$fila['familia'];
}


$marca = $producto->Marca();
while ($listamarca = $marca->fetch_array(MYSQLI_ASSOC)) {
	echo $listamarca['idmarca']." ".$listamarca['marca'];
}
$unidad = $producto->Unidades();
while ($listaunidad = $unidad->fetch_array(MYSQLI_ASSOC)) {
	echo $listaunidad['idunidad'];
	echo $listaunidad['unidadMedida'];
}
$prov = $producto->Proveedor();
while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) {
	echo $listaprov['idproveedor']." ".$listaprov['razonSocial'];
}
*/

?>

