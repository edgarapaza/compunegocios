<?php
session_start();

require_once "../Models/login.class.php";
$log = new Login();

$user = trim(strtolower($_REQUEST['user']));
$pass = md5(trim($_REQUEST['clave']));

$fila = $log->Ingreso($user,$pass);


//estado, nivel, IDpersonal
	//Estado de Activo en el sistema, Inactivo = 0
	if($fila['estado'] == 1){
		switch ($fila['nivel']) {
			case 1: // Administrador

				$_SESSION['administrador'] = $fila['IDpersonal'];
				$_SESSION['estado'] = 1;

				header("location: ../Views/index.html");
				break;

			case 2: //Empleado

				$_SESSION['trabajador'] = $fila['IDpersonal'];
				$_SESSION['estado'] = 2;
				header("location: ../Views/landing.html");
				break;
		}

	}else{
		header("Location: ../index.html");
	}

?>