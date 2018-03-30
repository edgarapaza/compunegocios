<?php
require_once "../Models/cliente.model.php";

$nombres       = trim(strtoupper($_POST['nombres']));
$apellidos     = trim(strtoupper($_POST['apellidos']));
$dni           = trim(strtoupper($_POST['dni']));
$direccion     = trim(strtoupper($_POST['direccion']));
$telefono      = trim(strtoupper($_POST['telefono']));
$fecNacimiento = trim(strtoupper($_POST['fecnac']));
$email         = trim(strtoupper($_POST['email']));

$cliente = new Cliente();
$cliente->AddCliente($nombres, $apellidos, $dni, $direccion, $telefono, $fecNacimiento,$email);

?>