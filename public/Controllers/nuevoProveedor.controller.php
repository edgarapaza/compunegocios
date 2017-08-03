<?php
require_once "../Models/nuevoproveedor.class.php";

$data = array(
	'nombprove'   => ucfirst(strtolower($_REQUEST['nombreProveedor'])),
	'razonsocial' => ucfirst(strtolower($_REQUEST['razonSocial'])),
	'numruc'      => ucfirst(strtolower($_REQUEST['numRuc'])),
	'direccion'   => ucfirst(strtolower($_REQUEST['direccion'])),
	'celularpvd'  => ucfirst(strtolower($_REQUEST['celular'])),
	'telfijopvd'  => ucfirst(strtolower($_REQUEST['telfijo'])),
	'emailpvd'    => ucfirst(strtolower($_REQUEST['email'])),
	'websitepvd'  => ucfirst(strtolower($_REQUEST['website'])),
	'obspvd'      => ucfirst(strtolower($_REQUEST['obs']))
	);

$proveedor = new Proveedor();
$proveedor->Duplicado($data);

header("Location: ../landing.php");
?>