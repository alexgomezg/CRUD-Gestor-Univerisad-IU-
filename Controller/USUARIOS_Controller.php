
<?php

//Script : PROFESOR_Controller
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
	
	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}
	
//Incluyo las vistas y el modelo de USUARIOS
	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include '../View/USUARIOS_DELETE_View.php';
	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

//La función get_data_form() recoge los valores del modelo USUARIOS que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve.
	function get_data_form(){

		$login = $_POST['login'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$dni = $_POST['DNI'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$FechaNacimiento = $_POST['FechaNacimiento'];
		if(isset($_POST['fotopersonal_original'])){
			$fotopersonal = $_POST['fotopersonal_original'];
		}else{
			$fotopersonal="";
		}
		$sexo = $_POST['sexo'];
		$action = $_POST['action'];

		if($action=='ADD'||$action=='EDIT'){
		//if($action=='ADD'){
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
}

		
		$usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
		return $usuarios;
	}


	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // Se invoca la vista de add de usuarios
					new USUARIOS_ADD();
				}
				else{
					$USUARIOS = get_data_form(); //Se recogen los datos del formulario
					if(!$USUARIOS->devolverError()){
					$respuesta = $USUARIOS->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); // Muestra el resultado de la operación
					} 
					
				}
				break;
			case 'DELETE':
				if (!$_POST){ //Llega el login a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); //Se crea el objeto
					$valores = $USUARIOS->RellenaDatos(); // Se rellenan los datos del objeto con los datos de la tupla
					new USUARIOS_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //Llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $USUARIOS->DELETE(); // Se hace el DELETE en la base de datos
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');// Creo el objeto
					$valores = $USUARIOS->RellenaDatos(); // Se rellenan los datos del objeto con los datos de la tupla leida
					if(!$USUARIOS->devolverError()){
					if (is_array($valores))
					{
						new USUARIOS_EDIT($valores); //Invoco la vista de edit con los datos ya cargados 

					}else
					{
						new MESSAGE($valores, '../Controller/USUARIOS_Controller.php'); // Muestra el resultado de la operación
					}
				}
				}
				else{

					$USUARIOS = get_data_form(); //Se recogen los datos del formulario

					$respuesta = $USUARIOS->EDIT(); // Update de la tabla USUARIOS en la base de datos
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new USUARIOS_SEARCH();
				}
				else{
					$USUARIOS = get_data_form(); //Se recogen los datos del formulario
					$datos = $USUARIOS->SEARCH();// Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					$lista = array('login','password','DNI','nombre', 'apellidos','telefono','email','FechaNacimiento','fotopersonal','sexo');
					//Instancio el ShowAll
					new USUARIOS_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); //Nos llega el USUARIO a mostrar por get y creamos el objeto
				$valores = $USUARIOS->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new USUARIOS_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$USUARIOS = new USUARIOS_Model('','','','','','','','','','','');;
				}
				else{
					$USUARIOS = get_data_form(); //Se recogen los datos del formulario
				}
				$datos = $USUARIOS->SEARCH(); //Busca según los parametros especificados
				$lista = array('login','password','DNI','nombre', 'apellidos','telefono','email','FechaNacimiento','fotopersonal','sexo');
				new USUARIOS_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>
