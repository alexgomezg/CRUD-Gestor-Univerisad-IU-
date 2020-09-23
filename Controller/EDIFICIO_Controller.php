<?php

//Script : EDIFICIO_Controller
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

//Incluyo las vistas y el modelo de EDIFICIO
	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

//La función get_data_form() recoge los valores del modelo EDIFICIO que vienen del formulario por medio de post y la action a realizar, crea una instancia EDIFICIO y la devuelve.
	function get_data_form(){

		$CODEDIFICIO = $_POST['CODEDIFICIO'];
		$NOMBREEDIFICIO = $_POST['NOMBREEDIFICIO'];
		$DIRECCIONEDIFICIO = $_POST['DIRECCIONEDIFICIO'];
		$CAMPUSEDIFICIO = $_POST['CAMPUSEDIFICIO'];
		$action = $_POST['action'];

		
		$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
		return $edificio;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

//En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ //Se invoca la vista de add de usuarios
					new EDIFICIO_ADD();
				}
				else{
					$edificio = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $edificio->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el CODEDIFICIO a eliminar por get
					$edificio = new  EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); //Se crea el objeto
					$valores = $edificio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new  EDIFICIO_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //LLegan los datos confirmados por post y se eliminan
					$edificio = get_data_form();
					$respuesta = $edificio->DELETE();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega el EDIFICIO a editar por get
					$edificio = new  EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); // Creo el objeto
					$valores = $edificio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					if (is_array($valores))
					{
						new  EDIFICIO_EDIT($valores); //Invoco la vista de edit con los datos ya cargados

					}else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$edificio = get_data_form(); //Recojo los valores del formulario

					$respuesta = $edificio->EDIT(); //  Update de la tabla EDIFICIO en la base de datos
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  EDIFICIO_SEARCH();
				}
				else{
					$edificio = get_data_form(); //Recojo los valores del formulario
					$datos = $edificio->SEARCH(); // Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					//Instancio el ShowAll
					$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO'); // Paso como parametros los valores a mostrar

					new  EDIFICIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$edificio = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','',''); //Nos llega el EDIFICIO a mostrar por get y creamos el objeto
				$valores = $edificio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new  EDIFICIO_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$edificio = new EDIFICIO_Model('','','','',''); // Creo la instancia del modelo de Edificio
				}
				else{
					$edificio = get_data_form(); //Recojo los valores del formulario
				}
				$datos = $edificio->SEARCH(); //Busca según los parametros especificados
				$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');
				new EDIFICIO_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>