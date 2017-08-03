<?php
require "../Models/personal.class.php";

$nombres    = trim(ucfirst(strtolower($_POST['nombres'])));
$paterno    = trim(ucfirst(strtolower($_POST['paterno'])));
$materno    = trim(ucfirst(strtolower($_POST['materno'])));
$dni        = trim(ucfirst(strtolower($_POST['dni'])));
$direccion  = trim(ucfirst(strtolower($_POST['direccion'])));
$telefono1  = trim(ucfirst(strtolower($_POST['telefono1'])));
$telefono2  = trim(ucfirst(strtolower($_POST['telefono2'])));
$obs        = trim(ucfirst(strtolower($_POST['obs'])));
$idpersonal = trim(ucfirst(strtolower($_POST['idpersonal'])));


echo $nombres."<br>";
echo $paterno."<br>";
echo $materno."<br>";
echo $dni."<br>";
echo $direccion."<br>";
echo $telefono1."<br>";
echo $telefono2."<br>";
echo $obs."<br>";
echo $idpersonal."<br>";

$personal = new Personal();
$res = $personal->Duplicado($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$obs,$idpersonal);

if($res > 0){
	header("Location: ../landing.php?msg=Duplicado");
}else{
	header("Location: ../landing.php?msg=Guardado exitosamente");
}
?>