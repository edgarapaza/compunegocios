<?php

function getConnection()
{
	$mysqli = new mysqli('localhost','root','admin','compu');
	if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_error);
	$mysqli->set_charset("utf8");
	#echo $mysqli->host_info. " Dentro de la clase";
	return $mysqli;
}
