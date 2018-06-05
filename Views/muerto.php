<?php 
require_once "../Models/paquete.model.php";

$codigo = $_REQUEST['codigomuerto'];

$paq = new Paquete();
echo $codigo;
$paq->MatarCodigo($codigo);

header("Location: ../Controllers/quitarsession.php");
 ?>