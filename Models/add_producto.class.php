<?php

class Producto
{
	private $conn ;

	function __construct()
	{
		require_once "../core/Conexion.php";

		$link = new Conexion();
		$this->conn= $link->Conectar();

		return $this->conn;
	}

	public function Familias()
	{
		$sql = "SELECT IDfamilia, familia FROM familia;";
		$rpta = $this->conn->query($sql);
        #$data = $rpta->fetch_array();
        return $rpta;
	}

	public function SubFamilias()
	{
		$sql = "SELECT idsubfamilias, subfamilia FROM subfamilias;";
		$rpta = $this->conn->query($sql);
        #$data = $rpta->fetch_array();
        return $rpta;
	}

	public function Proveedor()
	{
		$sql= "SELECT idproveedor, razonSocial FROM proveedor;";
		$rpta = $this->conn->query($sql);
        #$data = $rpta->fetch_array();
        return $rpta;
	}

	public function Marca()
	{
		$sql= "SELECT idmarca, marca FROM marca;";
		$rpta = $this->conn->query($sql);
        #$data = $rpta->fetch_array();
        return $rpta;
	}

	public function Unidades()
	{
		$sql = "SELECT idunidad, unidadMedida FROM unidad;";
		$rpta = $this->conn->query($sql);
		return $rpta;
	}




	public function Agregar(){
		$sql= "INSERT INTO altaProductos2 (IDproveedor,numFactura,fechaEmision,numeroSerie,unidad,precioUnitario,margenganancia,precioVenta,fecAlta,IDfamilia,IDsubfamilia,IDmarca,modelo,tipoArticulo,stockInicial,imagen,obs,IDPersonal,IDalmacen) VALUES ('$IDproveedor','$numFactura','$fechaEmision','$IDproductos','$numeroSerie','$unidad','$precioUnitario','$margenganancia','$precioVenta','$fecAlta','$IDfamilia','$IDsubfamilia','$IDmarca','$modelo','$tipoArticulo','$stockInicial','$imagen','$obs','$IDPersonal','$IDalmacen');";

	}

	public function Modificar(){

	}

	public function Eliminar(){

	}

	public function Consulta(){

	}

}

$producto = new Producto();
/*
$lista = $producto->Familias();
while ($fila = $lista->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['IDfamilia']." ".$fila['familia'];
}

$prov = $producto->Proveedor();
while ($listaprov = $prov->fetch_array(MYSQLI_ASSOC)) {
	echo $listaprov['idproveedor']." ".$listaprov['razonSocial'];
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
*/


?>