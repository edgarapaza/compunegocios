<?php
require_once "Conexion.php";

class ListadoProductos extends Conexion
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	function Productos(){
		try {
		$sql = "SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia1,marGanancia2,marGanancia3,precioVenta1,precioVenta2,precioVenta3,cantidad,IDAlmacen,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,estadoActivo,obs,parte FROM productos";

			$data = $this->con->query($sql);

		} catch (Exception $e) {
			throw $e;
		}

		return $data;
	}

	function listaxSerie($serie){
		try {
			$sql = "SELECT IDproducto,codigo, producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia1,marGanancia2,marGanancia3,precioVenta1,precioVenta2,precioVenta3,cantidad,IDAlmacen,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,parte FROM productos WHERE numserie = '". $serie ."'";
			$data = $this->con->query($sql);
		} catch (Exception $e) {
			throw $e;
		}

		return $data;
	}

	function ConvierteMarca($marca){
		try {
			$sql = "SELECT marca FROM marca WHERE idmarca = " . $marca;
			$data = $this->con->query($sql);
			$valor = $data->fetch_array();

		} catch (Exception $e) {
			throw $e;
		}

		return $valor;
	}

	function ConvierteAlmace($almacen){
		try {
			$sql = "SELECT tienda FROM tienda WHERE idtienda =" . $almacen;
			$data = $this->con->query($sql);
			$valor = $data->fetch_array();
		} catch (Exception $e) {
			throw $e;
		}

		return $valor;
	}
}

/*
$listado1 = new ListadoProductos();
$mar = $listado1->ConvierteMarca(22);
echo $mar[0];
$dat = $listado1->Productos();
while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['producto'];
}
$data = $listado1->listaxSerie('884745754');
while ($fila = $data->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['IDproducto']."<br>";
	echo $fila['producto']."<br>";
	echo $fila['IDproveedor']."<br>";
	echo $fila['numFactura']."<br>";
	echo $fila['fecEmision']."<br>";
	echo $fila['numserie']."<br>";
	echo $fila['IDFamilia']."<br>";
	echo $fila['IDSubFam']."<br>";
	echo $fila['IDmarca']."<br>";
	echo $fila['modelo']."<br>";
	echo $fila['tipoUnidad']."<br>";
	echo $fila['tipArticulo']."<br>";
	echo $fila['descripcion']."<br>";
	echo $fila['preUnitario']."<br>";
	echo $fila['marGanancia1']."<br>";
	echo $fila['marGanancia2']."<br>";
	echo $fila['marGanancia3']."<br>";
	echo $fila['precioVenta1']."<br>";
	echo $fila['precioVenta2']."<br>";
	echo $fila['precioVenta3']."<br>";
	echo $fila['cantidad']."<br>";
	echo $fila['IDAlmacen']."<br>";
	echo $fila['pro_color']."<br>";
	echo $fila['pro_incluye']."<br>";
	echo $fila['pro_fecRegistro']."<br>";
	echo $fila['IDPersonal']."<br>";
	echo $fila['alertAmbar']."<br>";
	echo $fila['alertRojo']."<br>";
	echo "Estado:".$fila['estadoActivo']."<br>";
	echo $fila['obs']."<br>";
	echo $fila['parte']."<br>";
}
*/

?>