<?php
session_start();

require_once "../Models/login.class.php";
$log = new Login();

$user = trim(strtolower($_REQUEST['user']));
$pass = trim($_REQUEST['clave']);

$fila = $log->Ingreso($user,$pass);


//estado, nivel, IDpersonal
	//Estado de Activo en el sistema, Inactivo = 0
	if($fila['estado'] == 1){
		switch ($fila['nivel']) {
			case 1: // Administrador

				$_SESSION['administrador'] = $fila['IDpersonal'];
				$_SESSION['estado'] = 1;

				header("location: ../inicio.html");
				break;

			case 2: //Empleado

				$_SESSION['trabajador'] = $fila['IDpersonal'];
				$_SESSION['estado'] = 2;
				header("location: ../landing.php");
				break;
		}

	}else{
		header("Location: ../index.php");
	}

?>