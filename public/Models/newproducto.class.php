<?php
require_once "Conexion.php";
class NewProducto extends Conexion
{
	public function AddProducto($codproveedor,$producto, $numfactura,$fechaEmision,$numserie,$idfamilia,$idsubfamilia,$idmarca,$modelo,$tipoUnidad,$tipoArticulo,$descripcion,$precioUnitario,$margenGanancia,$precioVenta,$cantidad,$pro_peso,$pro_tamano,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$obs,$imagen,$idalmacen,$idpersonal)
	{

		try {

			$pro_fecRegistro = date('Y-m-d H:m:s');
			$estadoActivo = 1;

			$sql= "INSERT INTO compu.productos (producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,estadoActivo,obs,imagen,IDAlmacen) VALUES
('$producto','$codproveedor','$numfactura','$fechaEmision','$numserie','$idfamilia','$idsubfamilia','$idmarca','$modelo','$tipoUnidad','$tipoArticulo','$descripcion','$precioUnitario','$margenGanancia','$precioVenta','$cantidad','$pro_peso','$pro_tamano','$pro_alto','$pro_largo','$pro_ancho','$pro_color','$pro_incluye','$pro_fecRegistro','$idpersonal','$estadoActivo','$obs','$imagen','$idalmacen');";

			$this->link->query($sql);

			print "<script type='text/javascript'>alert('Guardado');</script>";

		} catch (Exception $e) {
			throw $e;
		}

	}

}

?>