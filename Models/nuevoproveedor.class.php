<?php
require_once "Conexion.php";
date_default_timezone_set('UTC');

setlocale(LC_ALL,"es_ES");

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

		$duplicado = "SELECT idproveedor FROM proveedor WHERE numRUC = '".$datos['numruc']."'";
        
             $this->con->query($duplicado);
                        
		//$sql = "INSERT INTO proveedor (idprovsdasdeedor,nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs,fecRegistro) VALUES (NULL,'$dat1','$dat2','$dat3','$dat4','$dat5','$dat6','$dat7','$dat8','$dat9','NULL')";

		//$rpta = $this->con->query($sql);
                
             return $rpta;
       	mysqli_close($this->con);

	}

	
}
?>