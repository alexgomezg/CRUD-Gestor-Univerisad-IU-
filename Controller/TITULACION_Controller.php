<?php

//Script : TITULACION_Controller
//Creado el : 08-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}
	

//Incluyo las vistas y el modelo de TITULACION
	include '../Model/TITULACION_Model.php';
	include '../Model/CENTRO_Model.php';
	include '../View/TITULACION_SHOWALL_View.php';
	include '../View/TITULACION_SEARCH_View.php';
	include '../View/TITULACION_ADD_View.php';
	include '../View/TITULACION_EDIT_View.php';
	include '../View/TITULACION_DELETE_View.php';
	include '../View/TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

//La función get_data_form() recoge los valores del modelo PROF_TITULACION que vienen del formulario por medio de post y la action a realizar, crea una instancia TITULACION y la devuelve.
	function get_data_form(){
		//Compruebo si los valores vienen por _GET o _POST, ya que en el SHOWCURRENT paso parametros para mostrar la entidad debil
		if($_GET){
		$CODTITULACION = "";
		$CODCENTRO = $_GET['CODCENTRO'];
		$NOMBRETITULACION ="";
		$RESPONSABLETITULACION = "";
		$action = $_GET['action'];
		}else{
		$CODTITULACION = $_POST['CODTITULACION'];
		$CODCENTRO = $_POST['CODCENTRO'];
		$NOMBRETITULACION = $_POST['NOMBRETITULACION'];
		$RESPONSABLETITULACION = $_POST['RESPONSABLETITULACION'];
		$action = $_POST['action'];
		}
		

		
		$tiulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
		return $tiulacion;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

//En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ //Se invoca la vista de add de usuarios
					$CENTRO = new CENTRO_Model('','','','',''); //creamos el objeto edificio 
					$CENTROS = $CENTRO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					new TITULACION_ADD($CENTROS);
				}
				else{
					$tiulacion = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $tiulacion->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el CODTITULACION a eliminar por get
					$tiulacion = new  TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); //Se crea el objeto
					$valores = $tiulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new  TITULACION_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //LLegan los datos confirmados por post y se eliminan
					$tiulacion = get_data_form();
					$respuesta = $tiulacion->DELETE();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega la TITULACION a editar por get
					$tiulacion = new  TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); // Creo el objeto
					$valores = $tiulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					$CENTRO = new CENTRO_Model('','','','',''); //creamos el objeto edificio 
					$CENTROS = $CENTRO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					if (is_array($valores))
					{
						new  TITULACION_EDIT($valores,$CENTROS); //Invoco la vista de edit con los datos ya cargados

					}else
					{
						new MESSAGE($valores, '../Controller/TITULACION_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$tiulacion = get_data_form(); //Recojo los valores del formulario

					$respuesta = $tiulacion->EDIT(); //  Update de la tabla TITULACION en la base de datos
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  TITULACION_SEARCH();
				}
				else{
					$tiulacion = get_data_form(); //Recojo los valores del formulario
					$datos = $tiulacion->SEARCH(); // Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					//Instancio el ShowAll
					$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');

					new  TITULACION_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$tiulacion = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','',''); //Nos llega el EDIFICIO a mostrar por get y creamos el objeto
				$valores = $tiulacion->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new  TITULACION_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$tiulacion = new TITULACION_Model('','','','','');
				}
				else{
					$tiulacion = get_data_form(); //Recojo los valores del formulario
				}
				$datos = $tiulacion->SEARCH(); //Busca según los parametros especificados
				$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');
				new TITULACION_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>