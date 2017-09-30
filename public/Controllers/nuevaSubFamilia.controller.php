<?php
require_once "../Models/nuevaSubFamilia.class.php";


$IDfamilia  = $_REQUEST['familia'];
$codigo     = trim(ucfirst(strtolower($_REQUEST['codigosub'])));
$subfamilia = trim(ucfirst(strtolower($_REQUEST['subfamilia'])));

echo $IDfamilia;
echo $codigo;
echo $subfamilia;

$newsubfamilia = new NuevaSudFamilia();
$res = $newsubfamilia->Duplicado($IDfamilia, $codigo, $subfamilia);



if($res > 0){
	header("Location: ../landing.php?msg=Duplicado");
}else{
	header("Location: ../landing.php?msg=Guardado exitosamente");
}
?>