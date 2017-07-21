<?php
require "../Models/marca.class.php";

$codigo = ucfirst(strtolower($_POST['codigo']));
$marca1 = ucfirst(strtolower($_POST['marca']));

$marca = new Marca();
$marca->AddMarca($codigo, $marca1);
header("Location: ../nuevoProducto.php");
?>