<?php
require_once "../Models/nuevaFamilia.model.php";
$fam = new Nuevafamilia();

$codigo  = trim(strtoupper($_POST['codigo']));
$familia = trim(strtoupper($_POST['familia']));

$fam->AddFamilia($codigo,$familia);

?>