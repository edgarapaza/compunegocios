<?php
session_start();
require "../Models/personal.class.php";

$nombres    = trim(ucfirst(strtolower($_POST['nombres'])));
$paterno    = trim(ucfirst(strtolower($_POST['paterno'])));
$materno    = trim(ucfirst(strtolower($_POST['materno'])));
$dni        = trim($_POST['dni']);
$direccion  = trim(ucfirst(strtolower($_POST['direccion'])));
$telefono1  = trim(ucfirst(strtolower($_POST['telefono1'])));
$telefono2  = trim(ucfirst(strtolower($_POST['telefono2'])));
$idpersonal  = $_SESSION['administrador'];


$usuario = trim(strtolower($_POST['inputUsuario']));
$passwd = trim(strtolower($_POST['inputPassword']));
$nivel = trim(strtolower($_POST['nivel']));
$estado = trim(strtolower($_POST['estado']));

switch ($nivel) {
	case 1:
		$cargo = "Administrador";
		break;
	case 2:
		$cargo = "Personal";
		break;
	case 3:
		$cargo = "Solo Visualizar";
		break;
	
	default:
		$cargo = "Personal";
		break;
}

$personal = new Personal();
$res = $personal->AddPersonal($nombres,$paterno,$materno,$dni,$direccion,$telefono1,$telefono2,$idpersonal,$cargo,$usuario,md5($passwd),$nivel,$estado);

if($res == 0){
	header("Location: ../Views/confirmGeneral.php?mensaje='Guardado exitosamente'");
}else{
	header("Location: ../Views/confirmGeneral.php?mensaje='El usuario que desea ingresar ya existe.  Por favor ingrese su usuario o consulte al administrador del sistema.'");
}
?>