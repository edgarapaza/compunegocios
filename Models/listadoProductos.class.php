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

		$sql = "SELECT p.IDproducto, p.codigo, p.producto, pv.razonSocial, p.numFactura, p.fecEmision,p.numserie,f.familia, m.marca, p.modelo, u.unidadMedida, p.tipArticulo, p.descripcion,p.preUnitario, p.marGanancia1, p.marGanancia2, p.marGanancia3, p.precioVenta1, p.precioVenta2, p.precioVenta3,p.cantidad, t.tienda, p.pro_color, p.pro_incluye, CONCAT(per.nombres,' ',per.paterno,' ',per.materno) as empleado,p.estadoActivo, p.obs, p.parte FROM productos as p, proveedor as pv, familia as f, marca as m, unidad as u, tienda as t, Personal as per WHERE p.IDproveedor = pv.idproveedor AND p.IDFamilia = f.IDfamilia AND p.IDmarca = m.idmarca AND p.tipoUnidad = u.idunidad AND p.IDPersonal = per.IDPersonal;";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		return $data;

		$this->con->close();

	}

	public function listaxSerie($serie){

		$sql = "SELECT p.IDproducto, p.codigo, p.producto, pv.razonSocial, p.numFactura, p.fecEmision,p.numserie,f.familia, m.marca, p.modelo, u.unidadMedida, p.tipArticulo, p.descripcion,p.preUnitario, p.marGanancia1, p.marGanancia2, p.marGanancia3, p.precioVenta1, p.precioVenta2, p.precioVenta3,p.cantidad, t.tienda, p.pro_color, p.pro_incluye, CONCAT(per.nombres,' ',per.paterno,' ',per.materno) as empleado,p.estadoActivo, p.obs, p.parte FROM productos as p, proveedor as pv, familia as f, marca as m, unidad as u, tienda as t, Personal as per WHERE p.IDproveedor = pv.idproveedor AND p.IDFamilia = f.IDfamilia AND p.IDmarca = m.idmarca AND p.tipoUnidad = u.idunidad AND p.IDPersonal = per.IDPersonal AND p.numserie = ". $serie ;

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		return $data;
		$this->con->close();
	}
}

/*
$listado1 = new ListadoProductos();
$dat = $listado1->listaxSerie('314654214');
while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
	echo $fila['IDproducto']."<br>";
	echo $fila['producto']."<br>";
	echo $fila['razonSocial']."<br>";
	echo $fila['numFactura']."<br>";
	echo $fila['fecEmision']."<br>";
	echo $fila['numserie']."<br>";
	echo $fila['familia']."<br>";
	echo $fila['marca']."<br>";
	echo $fila['modelo']."<br>";
	echo $fila['unidadMedida']."<br>";
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
	echo $fila['tienda']."<br>";
	echo $fila['pro_color']."<br>";
	echo $fila['pro_incluye']."<br>";
	echo $fila['empleado']."<br>";
	echo "Estado:".$fila['estadoActivo']."<br>";
	echo $fila['obs']."<br>";
	echo $fila['parte']."<br>";
}
*/
?>