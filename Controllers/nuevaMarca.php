<?php
require "../Models/marca.class.php";

$codigo = ucfirst(strtolower($_POST['codigo']));
$marca1 = ucfirst(strtolower($_POST['marca']));

$marca = new Marca();
$res = $marca->Duplicado($codigo, $marca1);

echo $res;

if($res > 0){
	header("Location: ../landing.php?msg=Duplicado");
}else{
	header("Location: ../landing.php?msg=Guardado exitosamente");
}
?>