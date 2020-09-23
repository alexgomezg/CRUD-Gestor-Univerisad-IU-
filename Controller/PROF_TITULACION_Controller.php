<?php

//Script : PROF_TITULACION_Controller
//Creado el : 10-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

//Incluyo las vistas y el modelo de PROF_TITULACION
	include '../Model/PROF_TITULACION_Model.php';
	include '../Model/TITULACION_Model.php';
	include '../Model/PROFESOR_Model.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

//La función get_data_form() recoge los valores del modelo PROF_TITULACION que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_TITULACION y la devuelve.
	function get_data_form(){
		//Compruebo si los valores vienen por _GET o _POST, ya que en el SHOWCURRENT paso parametros para mostrar la entidad debil
		if($_GET){
			$DNI = $_GET['DNI'];
			$CODTITULACION="";
			$ANHOACADEMICO="";
			$action=$_GET['action'];
		}else{

		$DNI = $_POST['DNI'];
		$CODTITULACION = $_POST['CODTITULACION'];
		$ANHOACADEMICO = $_POST['ANHOACADEMICO'];
		$action = $_POST['action'];
	}
		
		$prof_titulacion = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO); // Esta variable representa el objeto prof_titulacion
		return $prof_titulacion;
		
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

//En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ //Se invoca la vista de add de usuarios
					$TITULACION = new TITULACION_Model('','','',''); //creamos el objeto edificio 
					$TITULACIONES = $TITULACION->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					$PROFESOR = new PROFESOR_Model('','','','',''); //creamos el objeto edificio 
					$PROFESORES = $PROFESOR->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					new PROF_TITULACION_ADD($TITULACIONES,$PROFESORES);
				}
				else{
					$prof_titulacion = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $prof_titulacion->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el DNI y CODTITULACION para eliminar
					$prof_titulacion = new  PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); //Se crea el objeto
					$valores = $prof_titulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new  PROF_TITULACION_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //LLegan los datos confirmados por post y se eliminan
					$prof_titulacion = get_data_form();
					$respuesta = $prof_titulacion->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega la PROF_TITULACION a editar por get
					$prof_titulacion = new  PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); // Creo el objeto
					$valores = $prof_titulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					$TITULACION = new TITULACION_Model('','','',''); //creamos el objeto edificio 
					$TITULACIONES = $TITULACION->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					if (is_array($valores))
					{
						new  PROF_TITULACION_EDIT($valores,$TITULACIONES); //Invoco la vista de edit con los datos ya cargados

					}else
					{
						new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$prof_titulacion = get_data_form(); //Recojo los valores del formulario

					$respuesta = $prof_titulacion->EDIT(); //  Update de la tabla PROF_TITULACION en la base de datos
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  PROF_TITULACION_SEARCH();
				}
				else{
					$prof_titulacion = get_data_form(); //Recojo los valores del formulario
					$datos = $prof_titulacion->SEARCH(); // Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					//Instancio el ShowAll
					$lista = array('DNI','CODTITULACION','ANHOACADEMICO');

					new  PROF_TITULACION_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$prof_titulacion = new  PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); //Nos llega el PROF_TITULACION a mostrar por get y creamos el objeto
				$valores = $prof_titulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new  PROF_TITULACION_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$prof_titulacion = new PROF_TITULACION_Model('','','');
				}
				else{
					$prof_titulacion = get_data_form(); //Recojo los valores del formulario
				}
				$datos = $prof_titulacion->SEARCH(); //Busca según los parametros especificados
				$lista = array('DNI','CODTITULACION','ANHOACADEMICO');
				new PROF_TITULACION_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>