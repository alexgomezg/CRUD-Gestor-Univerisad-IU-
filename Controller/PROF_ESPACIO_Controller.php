<?php

//Script : PROF_ESPACIO_Controller
//Creado el : 10-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

//Incluyo las vistas y el modelo de PROF_ESPACIO
	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';
	include '../Model/PROFESOR_Model.php';
	include '../Model/ESPACIO_Model.php';

//La función get_data_form() recoge los valores del modelo PROF_ESPACIO que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_ESPACIO y la devuelve.
	function get_data_form(){
		//Compruebo si los valores vienen por _GET o _POST, ya que en el SHOWCURRENT paso parametros para mostrar la entidad debil
		if($_GET){
			if(!empty($_GET['DNI'])){
			$DNI = $_GET['DNI'];
		}else{
			$DNI="";
		}

		if(!empty($_GET['CODESPACIO'])){
			$CODESPACIO = $_GET['CODESPACIO'];
		}else{
			$CODESPACIO="";
		}
			$action = $_GET['action'];
		}else{
		$DNI = $_POST['DNI'];
		$CODESPACIO = $_POST['CODESPACIO'];
		$action = $_POST['action'];
	}
		$prof_espacio = new PROF_ESPACIO_Model($DNI,$CODESPACIO); // Esta variable representa el objeto prof_espacio
		return $prof_espacio;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

//En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ //Se invoca la vista de add de usuarios
					$PROFESOR = new PROFESOR_Model('','','','',''); //creamos el objeto edificio 
					$PROFESORES = $PROFESOR->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					$ESPACIO = new ESPACIO_Model('','','','','',''); //creamos el objeto edificio 
					$ESPACIOS = $ESPACIO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					new PROF_ESPACIO_ADD($PROFESORES,$ESPACIOS);
				}
				else{
					$prof_espacio = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $prof_espacio->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el DNI y CODESPACIO a eliminar por get
					$prof_espacio = new  PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); //Se crea el objeto
					$valores = $prof_espacio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new  PROF_ESPACIO_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //LLegan los datos confirmados por post y se eliminan
					$prof_espacio = get_data_form();
					$respuesta = $prof_espacio->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega el PROF_ESPACIO a editar por get
					$prof_espacio = new  PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); // Creo el objeto
					$valores = $prof_espacio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					if (is_array($valores))
					{
						new  PROF_ESPACIO_EDIT($valores); //Invoco la vista de edit con los datos ya cargados

					}else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$prof_espacio = get_data_form(); //Recojo los valores del formulario

					$respuesta = $prof_espacio->EDIT(); //  Update de la tabla PROF_ESPACIO en la base de datos
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  PROF_ESPACIO_SEARCH();
				}
				else{
					$prof_espacio = get_data_form(); //Recojo los valores del formulario
					$datos = $prof_espacio->SEARCH(); // Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					//Instancio el ShowAll
					$lista = array('DNI','CODESPACIO');

					new  PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$prof_espacio = new  PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); //Nos llega el PROF_ESPACIO a mostrar por get y creamos el objeto
				$valores = $prof_espacio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new  PROF_ESPACIO_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$prof_espacio = new PROF_ESPACIO_Model('',''); //Intancio el modelo PROF_ESPACIO
				}
				else{
					$prof_espacio = get_data_form(); //Recojo los valores del formulario
				}
				$datos = $prof_espacio->SEARCH(); //Busca según los parametros especificados
				$lista = array('DNI','CODESPACIO');
				new PROF_ESPACIO_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>