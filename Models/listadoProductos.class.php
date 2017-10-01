<?php
require_once "Conexion.php";

class ListadoProductos
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function Productos(){

		$sql = "SELECT * FROM productos";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		return $data;

		$this->con->close();

	}

	public function listaxSerie($serie){

		$sql = "SELECT * FROM productos WHERE numserie = '". $serie ."'";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		$this->con->close();
		return $data;
	}

	public function ConvierteMarca($marca){

		$sql = "SELECT marca FROM marca WHERE idmarca = " . $marca;

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		$valor = $data->fetch_array();

		return $valor;

		$this->con->close();
	}

	public function ConvierteAlmace($almacen){

		$sql = "SELECT tienda FROM tienda WHERE idtienda =" . $almacen;

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		$valor = $data->fetch_array();

		return $valor;
		$this->con->close();
	}
}

/*
$listado1 = new ListadoProductos();
$mar = $listado1->ConvierteMarca(11);
echo $mar[0];
$dat = $listado1->Productos();
while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['producto'];
}
$data = $listado1->listaxSerie('11');
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
	echo "Estado:".$fila['estadoActivo']."<br>";
	echo $fila['obs']."<br>";
	echo $fila['parte']."<br>";
}
*/

?>