<?php
require_once "../Models/nuevaFamilia.class.php";
$newFamilia = new NuevaFamilia();

$codigo  = trim(ucfirst(strtolower($_REQUEST['codigo'])));
$familia = trim(ucfirst(strtolower($_REQUEST['familia'])));

$res = $newFamilia->Duplicado($codigo,$familia);

if($res > 0){
	header("Location: ../landing.php?msg=Duplicado");
}else{
	header("Location: ../landing.php?msg=Guardado exitosamente");
}
?>