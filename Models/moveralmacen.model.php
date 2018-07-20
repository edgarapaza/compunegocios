<?php
require_once "Conexion.php";

class MoverAlmacen
{
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function MostrarTodo()
	{
		
		$sql = "SELECT p.idproducto, p.descripcion,p.marca, p.modelo, p.numserie, a.almacen, p.stocktotal, p.idalmacen, (SELECT almacen FROM almacen WHERE idalmacen = p.idalmacen) as nuevo
			FROM productos as p, almacen as a 
			WHERE p.stocktotal <> 0;";
		
		if (!$data = $this->con->query($sql)) {
 		  	echo("Error mostrando registros: " . mysqli_error($this->con));
		}

		return $data;
		
		mysqli_close($this->con);
	}

	public function MostrarxAlmacen($idalmacen)
	{
		$sql = "CALL ConsultaAlmacen($idalmacen);";
		

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;

		mysqli_close($this->con);
	}

	public function MoveraNuevoAlmacen($ida_ant, $ida_nue,$idproducto, $idpersonal, $stockmover, $resta)
	{
		$flag = true;

		$sql1 = "INSERT INTO moveralmacen (idmover,idproducto,idalmacenanterior,idalmacennuevo,fecmovido,cantidad,idpersonal) VALUES (NULL,'$idproducto','$ida_ant','$ida_nue',now(),'$stockmover','$idpersonal');";
		

			if(!$this->con->query($sql1)){
				$msg = "Error Insertando Cambio almacen. " . mysqli_error($this->con);
				$flag = false;
			}
    
	    $sql_update = "UPDATE productos SET stocktotal = '$resta', oculto = false WHERE idproducto = $idproducto;";

		    if(!$this->con->query($sql_update))
		    {
		    	$msg =  "Error Actualizando Stock. " . mysqli_error($this->con);
		    	$flag = false;
		    }

		
		

		if($flag == true){
				echo "REalizado copn existo diferente de CERO";
			}else{
				return $msg;
			}
		

	    mysqli_close($this->con);
	}

	public function MoveraNuevoAlmacenCero($ida_ant, $ida_nue,$idproducto, $idpersonal, $stockmover, $resta)
	{
		$flag = true;

		$sql_insert_mover = "INSERT INTO moveralmacen (idmover,idproducto,idalmacenanterior,idalmacennuevo,fecmovido,cantidad,idpersonal) VALUES (NULL,'$idproducto','$ida_ant','$ida_nue',now(),'$stockmover','$idpersonal');";

    
		if(!$this->con->query($sql_insert_mover )){
			$msg = "Error Insertando Cambio almacen. " . mysqli_error($this->con);
			$flag = false;
		} 
    
    	$sql_update = "UPDATE productos SET stocktotal = '$resta', oculto = true WHERE idproducto = $idproducto;";

	    if(!$this->con->query($sql_update))
	    {
	    	$msg =  "Error Actualizando Stock. " . mysqli_error($this->con);
	    	$flag = false;
	    }

	

	if($flag == true){
			return 0;
		}else{
			return $msg;
		}

    mysqli_close($this->con);
	}

	public function Almacenes()
	{
		$sql = "SELECT idalmacen, almacen FROM almacenLista;";

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;

		mysqli_close($this->con);
	}

	public function NombreAlmacen($idalmacen)
	{
		$sql = "SELECT almacen FROM almacen WHERE idalmacen = " .$idalmacen;

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}
		$alma = $data->fetch_array();
		return $alma;

		mysqli_close($this->con);
	}
}

/*
$mover = new MoverAlmacen();
//$todo = $mover->MostrarxAlmacen(6);
$todo = $mover->Almacenes();

while ($fila = $todo->fetch_array()) {
	echo $fila[0];
	echo $fila[1];
	echo $fila[2];
	echo $fila[3];
}
*/