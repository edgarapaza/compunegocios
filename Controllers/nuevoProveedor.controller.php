<?php
require_once "../Models/nuevoproveedor.class.php";


$nomprove   = $_REQUEST['nombreProveedor'];
$razonsocial = $_REQUEST['razonSocial'];
$numRUC      = $_REQUEST['numRuc'];
$direccion   = $_REQUEST['direccion'];
$celular  = $_REQUEST['celular'];
$telfFijo  = $_REQUEST['telfijo'];
$email    = $_REQUEST['email'];
$website  = $_REQUEST['website'];

$prove = new Proveedor();
$prove->AddProveedor($nomprove,$razonsocial,$numRUC,$direccion,$telfFijo,$celular,$email,$website);

header("Location: ../index.html");
?>
