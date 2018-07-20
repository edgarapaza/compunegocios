<?php 
session_start();
require_once "../Models/paquete.model.php";

$paq = new Paquete();
$cod_ultimo = $paq->GenerarPaqueteSuma();
$next = $cod_ultimo + 1;
$paq->NuevoPaqueteSuma($next);

$_SESSION['nuevo_codigo'] = $next;

?>