<?php
session_start();

if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../View/Login_View.php';
	$login = new Login();
}
else{

	include '../Model/Access_DB.php';

	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','','');
	$respuesta = $usuario->login();

	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		header('Location:../index.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}

?>

