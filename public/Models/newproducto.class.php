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

	public function AddProducto($IDproveedor,$numFactura,$fecEmision,$numserie,$IDFamilia,$IDSubFam,$IDmarca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$preUnitario,$marGanancia,$precioVenta,$cantidad,$pro_peso,$pro_tamaño,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$pro_fecRegistro,$alertAmbar,$alertRojo,$estadoActivo,$obs,$imagen)
	{

		try {

			$pro_fecRegistro = date('Y-m-d H:m');
			$IDPersonal = "1002";

			$sql= "INSERT INTO productos (IDproducto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,imagen) VALUES (NULL,'$IDproveedor','$numFactura','$fecEmision','$numserie','$IDFamilia','$IDSubFam','$IDmarca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$preUnitario','$marGanancia','$precioVenta','$cantidad','$pro_peso','$pro_tamaño','$pro_alto','$pro_largo','$pro_ancho','$pro_color','$pro_incluye','$pro_fecRegistro','$IDPersonal','$alertAmbar','$alertRojo','$estadoActivo','$obs','$imagen')";
			print $sql;
			$this->conn->query($sql);

			print "<script type='text/javascript'>alert('Guardado');</script>";

		} catch (Exception $e) {
			throw $e;
		}

	}

	}

?>