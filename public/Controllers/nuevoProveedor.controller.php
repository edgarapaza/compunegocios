<?php
require_once "../Models/proveedor.class.php";

$data = array(
	'nombprove'   => ucfirst(strtolower($_POST['nombreProveedor'])),
	'razonsocial' => ucfirst(strtolower($_POST['razonSocial'])),
	'numruc'      => ucfirst(strtolower($_POST['numRuc'])),
	'direccion'   => ucfirst(strtolower($_POST['direccion'])),
	'celularpvd'  => ucfirst(strtolower($_POST['celular'])),
	'telfijopvd'  => ucfirst(strtolower($_POST['telfijo'])),
	'emailpvd'    => ucfirst(strtolower($_POST['email'])),
	'websitepvd'  => ucfirst(strtolower($_POST['website'])),
	'obspvd'      => ucfirst(strtolower($_POST['obs']))
	);

$proveedor = new Proveedor();
$proveedor->Duplicado($data);

header("Location: ../nuevoProducto.php");
?>