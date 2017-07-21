<?php
require_once "../Models/nuevaFamilia.class.php";
$newFamilia = new NuevaFamilia();

$codigo          = trim(strtoupper($_REQUEST['codigo']));
$familia         = trim(strtoupper($_REQUEST['familia']));
$descripcion     = trim(strtoupper($_REQUEST['descripcion']));
$caracteristica1 = trim(strtoupper($_REQUEST['caracteristica1']));
$caracteristica2 = trim(strtoupper($_REQUEST['caracteristica2']));
$caracteristica3 = trim(strtoupper($_REQUEST['caracteristica3']));
$caracteristica4 = trim(strtoupper($_REQUEST['caracteristica4']));
$caracteristica5 = trim(strtoupper($_REQUEST['caracteristica5']));
$caracteristica6 = trim(strtoupper($_REQUEST['caracteristica6']));
$obs             = trim(strtoupper($_REQUEST['obs']));


$newFamilia->AddFamilia($codigo,$familia,$descripcion,$caracteristica1,$caracteristica2,$caracteristica3,$caracteristica4,$caracteristica5,$caracteristica6,$obs);

header("Location: ../nuevoProducto.php");
?>