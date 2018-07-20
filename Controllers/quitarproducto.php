<?php 
require_once "../Models/paquete.model.php";

$idproducto = $_REQUEST['id'];
$paq = new Paquete();
$paq->Quitarproducto($idproducto);
echo "Id Prodeuctos recibido: ".$idproducto;

header("Location: ../Views/paqueteAgregados.php");

 ?>