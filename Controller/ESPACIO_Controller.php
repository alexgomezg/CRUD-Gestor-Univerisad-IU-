<?php

//Script : ESPACIO_Controller
//Creado el : 08-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

//Incluyo las vistas y el modelo de ESPACIO
	include '../Model/ESPACIO_Model.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';
	include '../Model/EDIFICIO_Model.php';
	include '../Model/CENTRO_Model.php';



//La función get_data_form() recoge los valores del modelo ESPACIO que vienen del formulario por medio de post y la action a realizar, crea una instancia ESPACIO y la devuelve.
	function get_data_form(){
		//Compruebo si los valores vienen por _GET o _POST, ya que en el SHOWCURRENT paso parametros para mostrar la entidad debil
		if($_GET){
		$CODESPACIO = "";
		if(!empty($_GET['CODEDIFICIO'])){
			$CODEDIFICIO = $_GET['CODEDIFICIO'];
		}else{
			$CODEDIFICIO="";
		}
		if(!empty($_GET['CODCENTRO'])){
			$CODCENTRO = $_GET['CODCENTRO'];
		}else{
			$CODCENTRO="";
		}
		$TIPO = "";
		$SUPERFICIEESPACIO = "";
		$NUMINVENTARIOESPACIO = "";
		$action = $_GET['action'];
		}else{
		$CODESPACIO = $_POST['CODESPACIO'];
		$CODEDIFICIO = $_POST['CODEDIFICIO'];
		$CODCENTRO = $_POST['CODCENTRO'];
		$TIPO = $_POST['TIPO'];
		$SUPERFICIEESPACIO = $_POST['SUPERFICIEESPACIO'];
		$NUMINVENTARIOESPACIO = $_POST['NUMINVENTARIOESPACIO'];
		$action = $_POST['action'];
		}

		
		$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
		return $espacio;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // Se invoca la vista de add de usuarios
					$EDIFICIO = new EDIFICIO_Model('','','',''); //creamos el objeto edificio 
					$EDIFICIOS = $EDIFICIO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					$CENTRO = new CENTRO_Model('','','','',''); //creamos el objeto edificio 
					$CENTROS = $CENTRO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					new ESPACIO_ADD($CENTROS,$EDIFICIOS);
				}
				else{
					$espacio = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $espacio->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el CODESPACIO a eliminar por get
					$espacio = new  ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); //Se crea el objeto
					$valores = $espacio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new  ESPACIO_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // Llegan los datos confirmados por post y se eliminan
					$espacio = get_data_form();
					$respuesta = $espacio->DELETE();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Llega el ESPACIO a editar por get
					$espacio = new  ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); // Creo el objeto
					$valores = $espacio->RellenaDatos(); /// Se rellenan los datos de la tupla que viene del objeto creado
					$EDIFICIO = new EDIFICIO_Model('','','',''); //creamos el objeto edificio 
					$EDIFICIOS = $EDIFICIO->SEARCH();
					$CENTRO = new CENTRO_Model('','','','',''); //creamos el objeto edificio 
					$CENTROS = $CENTRO->SEARCH();
					if (is_array($valores))
					{
						new  ESPACIO_EDIT($valores,$EDIFICIOS,$CENTROS); //Invoco la vista de edit con los datos ya cargados
							
					}else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$espacio = get_data_form(); //Recojo los valores del formulario

					$respuesta = $espacio->EDIT(); //Update de la tabla EDIFICIO en la base de datos
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  ESPACIO_SEARCH();
				}
				else{
					$espacio = get_data_form();//Recojo los valores del formulario
					$datos = $espacio->SEARCH();// Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					//Instancio el ShowAll
					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');

					new  ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$espacio = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); //Nos llega el ESPACIO a mostrar por get y creamos el objeto
				$valores = $espacio->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new  ESPACIO_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$espacio = new ESPACIO_Model('','','','','','');
				}
				else{
					$espacio = get_data_form(); //Recojo los valores del formulario
				}
				$datos = $espacio->SEARCH(); //Busca según los parametros especificados
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');
				new ESPACIO_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>