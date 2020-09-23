<?php
//----------------------------------------------------
// DB connection function
// Can be modified to use CONSTANTS defined in config.inc
//----------------------------------------------------
include_once '../Model/config.php';
//Esta funcion se encarga de hacer la conexión a la base de datos que utiliza la web
function ConnectDB()
{
    $mysqli = new mysqli(host, user, pass , BD);
    	
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
