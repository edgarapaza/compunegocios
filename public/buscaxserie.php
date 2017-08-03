
<?php
include_once "header.php";
require_once "../public/Models/Consultas.class.php";

#echo "Sereie escaneada: ".$serie;
$serie = '740617255638';
$consultas = new Consultas();
$datos = $consultas->ProductoSerie($serie);
if(isset($datos)){


	echo $datos[0]." ";
	echo $datos[1]." ";
	echo $datos[2]." ";
	echo $datos[3]." ";
	echo $datos[4]." ";
	echo $datos[5]." ";
	echo $datos[6]." ";
	echo $datos[7]." ";
	echo $datos[8]." ";
	echo $datos[9]." ";
	echo $datos[10]." ";
	echo $datos[11]." ";
	echo $datos[12]." ";
	echo $datos[13]." ";
	echo $datos[14]." ";
	echo $datos[15]." ";
	echo $datos[16]." ";
	echo $datos[17]." ";
	echo $datos[18]." ";
	echo $datos[19]." ";
	echo $datos[20]." ";
	echo $datos[21]." ";
	echo $datos[22]." ";
	echo $datos[23]." ";
	echo $datos[24]." ";
	echo $datos[25]." ";
	echo $datos[26]." ";
	echo $datos[27]." ";
	echo $datos[28]." ";
	echo $datos[29]." ";
	echo $datos[30]." ";
	echo $datos[31]." ";
}
else{
	echo "rojo";
}
?>

<h3>Listado</h3>
<form action="" method="POST" class="form-inline" role="form">

	<div class="form-group">
		<label class="sr-only" for="">label</label>
		<input type="text" class="form-control" name="serie" id="serie" placeholder="Escane la serie" value="7506339390230">
	</div>



	<button type="submit" class="btn btn-primary">Submit</button>
</form>