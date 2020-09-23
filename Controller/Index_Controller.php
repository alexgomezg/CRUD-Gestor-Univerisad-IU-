<?php
//Session
session_start();
//Incluir funcion autenticacion
include '../Functions/Authentication.php';
//Si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//Esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();
}

?>