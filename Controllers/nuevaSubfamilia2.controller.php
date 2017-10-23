<?php
require_once("../Models/nuevaFamilia.model.php");
$subfam = new Nuevafamilia();

$codigo     = trim(strtoupper($_POST['codigo']));
$idfamilia  = trim(strtoupper($_POST['idfamilia']));
$subfamilia = trim(strtoupper($_POST['subfamilia']));

$subfam->AddSubfamilia($codigo, $idfamilia, $subfamilia);

?>