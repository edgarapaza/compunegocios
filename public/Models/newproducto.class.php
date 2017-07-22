<?php

class NewProducto
{
	private $conn;

	function __construct()
	{
		require_once "Conexion.php";
		$con = new Conexion();
		$this->conn = $con->link;
	}

	public function AddProducto($codproveedor,$numfactura,$fechaEmision,$numserie,$idfamilia,$idsubfamilia,
	$idmarca,$modelo,$tipoUnidad,$tipoArticulo,$descripcion,$precioUnitario,$margenGanancia,$precioVenta,$cantidad,
	$pro_peso,$pro_tamaño,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$obs,$imagen,$idalmacen,$IDPersonal)
	{

		try {

			$pro_fecRegistro = date('Y-m-d H:m:s');
			$estadoActivo = TRUE;

			$sql= "INSERT INTO productos (IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,estadoActivo,obs,imagen,IDAlmacen) VALUES ('$codproveedor','$numfactura','$fechaEmision','$numserie','$idfamilia','$idsubfamilia','$idmarca','$modelo','$tipoUnidad','$tipoArticulo','$descripcion','$precioUnitario','$margenGanancia','$precioVenta','$cantidad','$pro_peso','$pro_tamaño','$pro_alto','$pro_largo','$pro_ancho','$pro_color','$pro_incluye','$pro_fecRegistro','$IDPersonal','$estadoActivo','$obs','$imagen','$idalmacen')";

			$this->conn->query($sql);

			print "<script type='text/javascript'>alert('Guardado');</script>";

		} catch (Exception $e) {
			throw $e;
		}

	}

}

?>