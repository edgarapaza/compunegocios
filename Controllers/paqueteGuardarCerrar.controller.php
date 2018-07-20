<?php
session_start();
require_once "../Models/paquete.model.php";

$idpaquete   = $_REQUEST['next_paquete'];
$total       = $_REQUEST['total1'];
$id_producto = $_REQUEST['id_producto'];
$cantidad   = $_REQUEST['txtcantidad'];
$contador = $_REQUEST['cont'];

$razonsocial = trim(strtoupper($_REQUEST['razonsocial']));
$ruc         = trim(strtoupper($_REQUEST['ruc']));
$direccion   = trim(strtoupper($_REQUEST['direccion']));


$paq = new Paquete();
$paq->GuardarCerrar($idpaquete, $total,$razonsocial,$ruc,$direccion, $id_producto, $cantidad);

header("Location: ./quitarsession.php");
?>