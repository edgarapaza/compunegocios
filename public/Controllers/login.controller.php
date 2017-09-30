<?php
session_start();

require_once "../Models/login.class.php";
$log = new Login();

$user = trim(strtolower($_REQUEST['user']));
$pass = trim($_REQUEST['clave']);

$data = $log->Ingreso($user,$pass);

$fila = $data->fetch_array();

	//Estado de Activo en el sistema, Inactivo = 0
	if($fila[0] == 1){
		switch ($fila[1]) {
			case 1: // Administrado

				$_SESSION['administrador'] = $fila[2];
				header("location: ../inicio.html");
				break;

			case 2: //Empleado

				$_SESSION['empleado'] = $fila[2];
				header("location: ../landing.php");
				break;
		}

	}else{
		header("Location: ../index.php");
		echo "document.getElementById('msg').innerHTML = 'Error de session';";
	}

?>