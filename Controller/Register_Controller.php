<?php

session_start();
//include_once '../Locale/Strings.php';

include '../View/MESSAGE_View.php';

//Session_start();
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
else{
		
	include '../Model/USUARIOS_Model.php';
		//include '../View/MESSAGE_View.php';
		$fotopersonal="";
		$target_dir = "../Files/";
		$target_file = $target_dir . basename($_FILES["fotopersonal"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(basename($_FILES["fotopersonal"]["name"])!==""){
		if(isset($_POST["submit"])) {
    	$check = getimagesize($_FILES["fotopersonal"]["tmp_name"]);
    	if($check !== false) {
        	//echo "File is an image - " . $check["mime"] . ".";
        	$uploadOk = 1;
    	} else {
        	//echo "File is not an image.";
        	$uploadOk = 0;
    	}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    new MESSAGE('Inserción fallida: Ya existe una imagen con ese nombre', '../Controller/USUARIOS_Controller.php');
		    $uploadOk = 0;
		    $login="null";
		}
		// Check file size
		if ($_FILES["fotopersonal"]["size"] > 500000) {
		     new MESSAGE('Inserción fallida: La imagen es demasiado pesada', '../Controller/USUARIOS_Controller.php');
		    $uploadOk = 0;
		    $login="null";
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		 new MESSAGE('Inserción fallida: Formato no soportado', '../Controller/USUARIOS_Controller.php');
		    $uploadOk = 0;
		    $login="null";
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    new MESSAGE('Error: Imagen no subida', '../Controller/USUARIOS_Controller.php');
		    $login="null";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fotopersonal"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        $fotopersonal = basename($_FILES["fotopersonal"]["name"]);
		    } else {
		        new MESSAGE('Error: Imagen no subida', '../Controller/USUARIOS_Controller.php');
		        $login="null";
		    }
		}
	}


	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['DNI'],$_REQUEST['nombre'],
		$_REQUEST['apellidos'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['FechaNacimiento'],$fotopersonal,$_REQUEST['sexo']);
	$respuesta = $usuario->Register();

	if ($respuesta == 'true'){
		$respuesta = $usuario->registrar();
		//Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	else{
		//include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}

?>

