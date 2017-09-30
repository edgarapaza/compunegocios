<?php
require_once "Conexion.php";

	$conexion = new Conexion();
	$mysqli = $conexion->Conectarse();

$codigo  = $_REQUEST['micodigo'];
$familia = $_REQUEST['mifam'];


$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia');";
$conn->link->query($sql);

echo "<strong>Guardado</strong> correctamente ...";
?>

