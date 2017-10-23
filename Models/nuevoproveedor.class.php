<?php
require_once "Conexion.php";

class Proveedor{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddProveedor($data)
	{

		$datos = unserialize(serialize($data));
		$dat1 = $datos['nombprove'];
		$dat2 = $datos['razonsocial'];
		$dat3 = $datos['numruc'];
		$dat4 = $datos['direccion'];
		$dat5 = $datos['celularpvd'];
		$dat6 = $datos['telfijopvd'];
		$dat7 = $datos['emailpvd'];
		$dat8 = $datos['websitepvd'];
		$dat9 = $datos['obspvd'];

		$duplicado = $sql = "SELECT idproveedor FROM proveedor WHERE numRUC = '".$datos['numruc']."'";
		$sql_duplicado = $this->con->query

			$fecha = date('Y-m-d H:m');
			$sql = "INSERT INTO proveedor (idprovsdasdeedor,nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs,fecRegistro) VALUES (NULL,'$dat1','$dat2','$dat3','$dat4','$dat5','$dat6','$dat7','$dat8','$dat9','$fecha')";

			$rpta = $this->con->query($sql);

	}

	public function Duplicado($data)
	{
			$datos = unserialize(serialize($data));
			#echo "Numero de RUC: ".$datos['numruc'];

			$rpta = $this->con->query($sql);
			$registros = $rpta->num_rows;
			if($registros > 0){
				echo "Ya existe";
			}else{
				$this::AddProveedor($data);
			}
	}
}
?>