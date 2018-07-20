<?php 
require_once "../Models/paquete.model.php";

$codigo = $_REQUEST['codigomuerto'];

$paq = new Paquete();

$paq->MatarCodigo($codigo);

header("Location: ../Controllers/quitarsession.php");
 ?>