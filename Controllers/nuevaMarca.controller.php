<?php
require "../Models/marca.class.php";

$codigo     = strtoupper(trim($_POST['codigo']));
$nuevamarca = strtoupper(trim($_POST['marcass']));

$mar = new Marca();
$res = $mar->Duplicado($codigo, $nuevamarca);

?>