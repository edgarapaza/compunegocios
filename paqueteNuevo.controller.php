<?php 
session_start();
require_once "../Models/paquete.model.php";

$paq = new Paquete();
$cod_ultimo = $paq->GenerarPaqueteSuma();

echo "Nuevo Codigo ". $cod_ultimo;

$_SESSION["nuevo_codigo"] = $cod_ultimo;

?>