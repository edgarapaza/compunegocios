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
		$sql1 = "SELECT max(idps_temp) FROM paqsuma_temp;";

		if(!$res1 = $this->conn->query($sql1)){
			echo "Error Buscando Ultimo Codigo Suma Temp." . mysqli_error($this->conn);
			$flag = false;
		}

		$num = $res1->fetch_array();
		
		if($num[0] <= 0){
			$sql2 = "INSERT INTO paqsuma_temp VALUES (1,'General_Temporal',0,1);";
			$this->conn->query($sql2);
			$ult_cod = 1;
		}else{
			// Devuelve el el ultimo codigo de la tabla de paquete suma
			$ult_cod = $num[0];
		}

		if($flag == false){
			echo "Error";
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

	public function InsertPaqueteTemporal($fecalta,$idproducto,$producto,$modelo, $cantidad, $precio, $subtotal, $idps_temp,$marca,$serie){
		echo "producto". $producto;
		$flag = true;
		$sql_temp = "INSERT INTO paquete_temp (idpaquete_temp,fecReg,idproducto,producto,modelo,cantidad,precio,subtotal,idps_temp,estado,marca,serie) VALUES (NULL,'$fecalta','$idproducto','$producto','$modelo','$cantidad','$precio','$subtotal','$idps_temp',1,'$marca','$serie');";

		if(!$this->conn->query($sql_temp)){
			echo "Error Insertando paquete Temporal " . mysqli_error($this->conn);
			$flag = false;
		}

		$sql_update1= "UPDATE productos SET vendido = true, oculto = true WHERE idproducto = $idproducto;";
		if(!$this->conn->query($sql_update1)){
			echo "Error cambiando el estado del producto. " . mysqli_error($this->conn);
			$flag = false;
		}

		if($flag == true){
			echo "exito";
		}else{
			echo "Error creando registro temporal";
		}


		mysqli_close($this->conn);
	}

	public function InsertPaqueteTemporalCero($fecalta,$idproducto,$producto,$modelo, $cantidad, $precio, $subtotal, $idps_temp,$marca,$serie)	{
		echo "producto". $producto;
		$flag = true;
		$sql_temp = "INSERT INTO paquete_temp (idpaquete_temp,fecReg,idproducto,producto,modelo,cantidad,precio,subtotal,idps_temp,estado,marca,serie) VALUES (NULL,'$fecalta','$idproducto','$producto','$modelo','$cantidad','$precio','$subtotal','$idps_temp',1,'$marca','$serie');";

		$sql_update1= "UPDATE productos SET vendido = true, oculto = true, stocktotal = 0 WHERE idproducto = $idproducto;";

		if(!$this->conn->query($sql_temp)){
			echo "Error Insertando paquete Temporal " . mysqli_error($this->conn);
			$flag = false;
		}

		if(!$this->conn->query($sql_update1)){
			echo "Error cambiando el estado del producto. " . mysqli_error($this->conn);
			$flag = false;
		}

		if($flag == true){
			echo "exito";
		}else{
			echo "Error creando registro temporal";
		}


		mysqli_close($this->conn);
	}

	public function InsertPaqueteTemporalExistencia($fecalta,$idproducto,$producto,$modelo, $cantidad, $precio, $subtotal, $idps_temp,$marca,$serie,$resta)	{
		echo "producto". $producto;
		$flag = true;
		$sql_temp = "INSERT INTO paquete_temp (idpaquete_temp,fecReg,idproducto,producto,modelo,cantidad,precio,subtotal,idps_temp,estado,marca,serie) VALUES (NULL,'$fecalta','$idproducto','$producto','$modelo','$cantidad','$precio','$subtotal','$idps_temp',1,'$marca','$serie');";

		$sql_up2 = "UPDATE productos SET vendido = true, oculto = false, stocktotal = $resta WHERE idproducto = $idproducto;";
		
		if(!$this->conn->query($sql_temp)){
			echo "Error Insertando paquete Temporal " . mysqli_error($this->conn);
			$flag = false;
		}

		if(!$this->conn->query($sql_up2)){
			echo "Error Actualizando stock y visibilidad " . mysqli_error($this->conn);
			$flag = false;
		}

		if($flag == true){
			echo "Insertado con exito";
		}else{
			echo "Error creando registro temporal";
		}


		mysqli_close($this->conn);
	}

	public function DeletePaqueteTemporal($idpaquete){
		$sql_temp = "DELETE FROM paquete_temp WHERE idpaquete_temp = $idpaquete LIMIT 1;";

	}

	public function SumaPaquete($idpaquete)	{
		$sql = "SELECT sum(subtotal) as total FROM paquete_temp WHERE idps_temp = '$idpaquete' AND estado = 1;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Suma. " . mysqli_error($this->conn);
		}

		$fila = $rpta->fetch_array(MYSQLI_ASSOC);
		return $fila;
		mysqli_close($this->conn);
	}

	public function Detalleproducto($idproducto)	{
		$sql = "SELECT idproducto, descripcion, marca,modelo, numserie, precventa1,precventa2,precventa3, stocktotal FROM productos WHERE idproducto = $idproducto;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		$fila = $rpta->fetch_array(MYSQLI_ASSOC);
		return $fila;
		mysqli_close($this->conn);
	}

	public function Venta_temporal($micodigosession)	{
		$sql = "SELECT idpaquete_temp, idproducto, producto, marca, modelo, serie, cantidad, precio, subtotal FROM paquete_temp WHERE estado = 1 AND idps_temp=$micodigosession;";

		if(!$rpta = $this->conn->query($sql))
		{
			echo "Error Detalle del Producto. " . mysqli_error($this->conn);
		}

		
		return $rpta;
		mysqli_close($this->conn);	
	}

	public function GuardarCerrar($idpaquete,$total,$razonsocial,$ruc,$direccion,$idproducto,$cantidad)	{
		
		$flag = true;

			$sql  = "UPDATE paquete_temp SET estado = 0 WHERE idps_temp = $idpaquete;";
			
			$sql2 = "UPDATE paqsuma_temp SET total='$total', razonsocial = '$razonsocial', ruc='$ruc', direccion = '$direccion', pendiente = 0 WHERE idps_temp='$idpaquete';";
				
			

				if(!$this->conn->query($sql))
				{
					echo "Error Cerrando paquete. " . mysqli_error($this->conn);
					$flag = false;
				}

				if(!$this->conn->query($sql2))
				{
					echo "Error actualizando paquete Suma " . mysqli_error($this->conn);
					$flag = false;
				}		

					

		if($flag == true){
			return 0;
		}else{
			echo "Error";
			return 1;
		}

		mysqli_close($this->conn);		
		
	}

	public function MatarCodigo($codigomuerto)	{
		
		$flag = true;
		// El estado 0 es cerrado corectamente y el estado 1 es Abierto
		// 
		$sql = "UPDATE paqsuma_temp SET pendiente='0' WHERE idps_temp='$codigomuerto'";
		if(!$this->conn->query($sql))
		{
			echo "Error Cerrando Codigo. " . mysqli_error($this->conn);
			$flag = false;
		}

		$sql_del = "DELETE FROM paquete_temp WHERE estado = 1;";
		if(!$this->conn->query($sql_del))
		{
			echo "Error matando temporales. " . mysqli_error($this->conn);
			$flag = false;
		}
		
		if($flag == true){
			return 0; # Si todo sale bien
		}else{
			echo "Error";
			return 1;
		}

		mysqli_close($this->conn);		
	}

	public function QuitarProducto($idproducto){
		
		$flag = true;
		// El estado 0 es cerrado corectamente y el estado 1 es Abierto
		
		$sql_devolver = "SELECT cantidad FROM paquete_temp WHERE idproducto = 10 limit 1;";
		if(!$res1 = $this->conn->query($sql_devolver))
		{
			echo "Error Recogiendo datos " . mysqli_error($this->conn);
			$flag = false;
		}
		$num = $res1->fetch_array();

		$sql_stockactual = "SELECT stocktotal FROM productos WHERE idproducto = $idproducto;";
		if(!$res2 = $this->conn->query($sql_stockactual))
		{
			echo "Error Recogiendo datos " . mysqli_error($this->conn);
			$flag = false;
		}
		$num2 = $res2->fetch_array();

		$nuevo = $num[0] + $num2[0];

		$sql_reponer = "UPDATE productos SET stocktotal = $nuevo WHERE idproducto = $idproducto;";
		if(!$this->conn->query($sql_reponer))
		{
			echo "Error reponiendo producto. " . mysqli_error($this->conn);
			$flag = false;
		}
		
		$sql = "DELETE FROM paquete_temp WHERE idproducto='$idproducto';";
		if(!$this->conn->query($sql))
		{
			echo "Error Eliminando producto. " . mysqli_error($this->conn);
			$flag = false;
		}
		
		if($flag == true){
			return 0; # Si todo sale bien
		}else{
			echo "Error";
			return 1;
		}
		echo "Borrado";
		mysqli_close($this->conn);

	}

	public function UpdateProductoCero(){

	}

	public function UpdateProducto(){
		
	}



}

/*$idproducto = 6;
$paq = new Paquete();
$paq->Quitarproducto($idproducto);*/
?>