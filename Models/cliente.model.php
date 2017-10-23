<?php
require_once "Conexion.php";

class Cliente{

	private $conn;
	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function AddCliente($nombres, $apellidos, $dni, $direccion, $telefono, $fecNacimiento,$email){

		$dupli = "SELECT * FROM clientes WHERE dni = '$dni' AND nombres = '$nombres' AND apellidos= '$apellidos' AND fecNacimiento = '$fecNacimiento';";

		if ($result = $this->conn->query($dupli))
		{
		    /* determinar el número de filas del resultado */
		    $row_cnt = $result->num_rows;

		    //printf("Result set has %d rows.\n", $row_cnt);

		    if($row_cnt == 0){

		    	$sql = "INSERT INTO clientes (IDClientes,dni,nombres,apellidos,direccion,telefono,fecNacimiento,email) VALUES (NULL,'$dni','$nombres','$apellidos','$direccion','$telefono','$fecNacimiento','$email');";
		    	if(!$this->conn->query($sql)){
		    		echo "Error Description: " . mysqli_error($this->conn);
		    		exit;
		    	}
		    	echo "<span class='alert alert-success'>Guardado!!.</span>";
		    }else{
		    	echo "<span class='alert alert-danger'>Advertencia!!! Este Nombre y DNI esta duplicado.</span>";
		    }

		    /* cerrar el resultset */
		    $result->close();
		}else{
			echo "Error description: " . mysqli_error($this->conn);
		}

		/* cerrar la conexión */
		$this->conn->close();
	}

	public function ListadoClientes(){

		$sql = "SELECT IDClientes AS id, dni, concat(nombres,' ',apellidos) as nombre FROM clientes;";

		if ($result = $this->conn->query($sql)){
			return $result;
		}else{
			echo "Error Description: " . mysqli_error($this->conn);
		}
	}

}

?>