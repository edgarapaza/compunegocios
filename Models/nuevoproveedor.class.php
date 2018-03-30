<?php
require_once "Conexion.php";
date_default_timezone_set('UTC');

setlocale(LC_ALL,"es_ES");

class Proveedor
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function AddProveedor($nomprove,$razonsocial,$numRUC,$direccion,$telfFijo,$celular,$email,$website)
	{

		$duplicado = "SELECT idproveedor FROM proveedor WHERE numRUC = '". $numRUC ."'";
        
             if(!$res1 = $this->con->query($duplicado))
             {
             	echo "Error. " . mysqli_error($this->con);
             }
             
             $num = $res1->num_rows;
             echo $num;

             if($num == 0)
             {
             	echo "niguno, puede ingresar";

			$sql = "INSERT INTO proveedor (idproveedor,nomprove,razonsocial,numRUC,direccion,telfFijo,celular,email,website,fecalta) VALUES (NULL,'$nomprove','$razonsocial','$numRUC','$direccion','$telfFijo','$celular','$email','$website',now());";

			if(!$this->con->query($sql)){
				echo "Error. " . mysqli_error($this->con);		
			}

			echo "Ingresado Correctamente";

             }else{
             	echo "Duplicado";
             }

       	mysqli_close($this->con);
	}

}

?>