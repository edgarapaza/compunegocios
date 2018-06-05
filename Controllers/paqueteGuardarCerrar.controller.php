<?php
session_start();
require_once "../Models/paquete.model.php";

$idpaquete = $_REQUEST['next_paquete'];
$total     = $_REQUEST['total1'];

echo $idpaquete;
echo "<br>";
echo $total;
$paq = new Paquete();
$paq->GuardarCerrar($idpaquete, $total);

header("Location: ./quitarsession.php");
?>