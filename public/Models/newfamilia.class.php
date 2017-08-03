<?php
require_once "Conexion.php";

$conn = new Conexion();
#echo $conn->link->host_info. " Dentro de la clase";


$codigo  = $_REQUEST['micodigo'];
$familia = $_REQUEST['mifam'];


$sql = "INSERT INTO familia (IDfamilia,codigo,familia) VALUES (NULL,'$codigo','$familia');";
$conn->link->query($sql);

echo "<strong>Guardado</strong> correctamente ...";
?>

