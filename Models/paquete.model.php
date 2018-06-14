<?php 
require_once "Conexion.php";

class Paquete
{
	private $conn;

	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function GenerarPaqueteSuma()
	{
		//Variables
		$flag = true;
		$ult_cod ="";

		//Ultimo codigo Registrado en el paquete suma
		$sql1 = "SELECT idps_temp FROM paqsuma_temp ORDER BY idps_temp DESC";


		if(!$res1 = $this->conn->query($sql1)){
			echo "Error Buscando Ultimo Codigo Suma Temp." . mysqli_error($this->conn);
			$flag = false;
		}

		$num = $res1->num_rows;
		
		if($num <= 0){
			$sql2 = "INSERT INTO paqsuma_temp VALUES (1,'General_Temporal',0,1);";
			$this->conn->query($sql2);
			$ult_cod = 1;
		}else{
			// Devuelve el el ultimo codigo de la tabla de paquete suma
			$ultimo = $res1->fetch_array();
			$ult_cod = $ultimo[0];
		}

		if($flag == false){
			echo "Error";
			exit();
		}else{
			return $ult_cod;
		}

		mysqli_close($this->conn);
	}

	public function NuevoPaqueteSuma($nextcodigo){
		$des = 'Temporal_'.$nextcodigo;
		$sql = "INSERT INTO paqsuma_temp (idps_temp,descpaquete,total,pendiente,fecha) VALUES ($nextcodigo,'$des',0,1,now());";
		$this->conn->query($sql);

		mysqli_close($this->conn);
	}

	public function InsertPaqueteTemporal($fecalta,$idproducto,$producto,$modelo, $precio, $cantidad, $subtotal, $idps_temp)
	{
		$flag = true;
		$sql_temp = "INSERT INTO paquete_temp (idpaquete_temp,fecReg,idproducto,producto,modelo,cantidad,precio,subtotal,idps_temp,estado) VALUES (null,'$fecalta','$idproducto','$producto','$modelo','$cantidad','$precio','$subtotal','$idps_temp',1);";

		if(!$this->conn->query($sql_temp)){
			echo "Error Insertando Temporal 1 " . mysqli_error($this->conn);
			$flag = false;
		}

		if($flag == true){
			echo "Insertado con exito";
		}else{
			echo "Error creando registro temporal";
		}


		mysqli_close($this->conn);
	}

	public function DeletePaqueteTemporal($idpaquete)
	{
		$sql_temp = "DELETE FROM paquete_temp WHERE idpaquete_temp = $idpaquete LIMIT 1;";

	}

	public function SumaPaquete($idpaquete)
	{
		$sql = "SELECT sum(subtotal) as total FROM paquete_temp WHERE idps_temp = '$idpaquete' AND estado = 1;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Suma. " . mysqli_error($this->conn);
		}

		$fila = $rpta->fetch_array(MYSQLI_ASSOC);
		return $fila;
		mysqli_close($this->conn);
	}

	public function Detalleproducto($idproducto)
	{
		$sql = "SELECT p.idproducto, p.descripcion AS producto, m.marca, p.modelo, p.precventa3 AS precio FROM productos as p, marca as m WHERE p.marca = m.idmarca AND idproducto = $idproducto;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		$fila = $rpta->fetch_array(MYSQLI_ASSOC);
		return $fila;
		mysqli_close($this->conn);
	}

	public function Venta_temporal()
	{
		$sql = "SELECT * FROM paquete_temp WHERE estado = 1";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		
		return $rpta;
		mysqli_close($this->conn);	
	}

	public function GuardarCerrar($idpaquete, $total)
	{
		
		$flag = true;
		// El estado 0 es cerrado corectamente y el estado 1 es Abierto
		$sql = "UPDATE paquete_temp SET estado = 0 WHERE idps_temp = $idpaquete;";
	
		if(!$this->conn->query($sql))
		{
			echo "Error Cerrando paquete. " . mysqli_error($this->conn);
			$flag = false;
			exit();
		}

		$sql2 = "UPDATE paqsuma_temp SET total='$total', pendiente = 0 WHERE idps_temp='$idpaquete';";
		
		if(!$this->conn->query($sql2))
		{
			echo "Error Agregando Total. " . mysqli_error($this->conn);
			$flag = false;
			exit();
		}		

		if($flag == true){
			return 0;
		}else{
			echo "Error";
			return 1;
		}

		mysqli_close($this->conn);		
	}

	public function MatarCodigo($codigomuerto)
	{
		
		$flag = true;
		// El estado 0 es cerrado corectamente y el estado 1 es Abierto
		// 
		$sql = "UPDATE paqsuma_temp SET pendiente='0' WHERE idps_temp='$codigomuerto'";
	
		if(!$this->conn->query($sql))
		{
			echo "Error Cerrando Codigo. " . mysqli_error($this->conn);
			$flag = false;
			exit();
		}

		
		if($flag == true){
			return 0;
		}else{
			echo "Error";
			return 1;
		}

		mysqli_close($this->conn);		
	}



}

/*
$paq = new Paquete();
$cod_temp =  $paq->GenerarPaqueteSuma();
echo "Codigo Temporal".$cod_temp;

$fecalta = '2018-06-04';
$idproducto=61;
$producto='Monitor';
$modelo='KSDK3238';
 $precio=100;
 $cantidad=2;
 $subtotal=200;
$paq->InsertPaqueteTemporal($fecalta,$idproducto,$producto,$modelo, $precio, $cantidad, $subtotal, $cod_temp);
*/
?>