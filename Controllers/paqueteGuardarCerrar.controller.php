<?php
session_start();
require_once "../Models/paquete.model.php";

$idpaquete     = $_REQUEST['next_paquete'];
$total             = $_REQUEST['total1'];
$id_producto = $_REQUEST['id_producto'];
$razonsocial = $_REQUEST['razonsocial'];
$ruc              = $_REQUEST['ruc'];
$direccion   = $_REQUEST['direccion'];

#echo $idpaquete;
#echo "<br>";
#echo $total;
#
$paq = new Paquete();
$paq->GuardarCerrar($idpaquete, $total);

header("Location: ./quitarsession.php");
?>