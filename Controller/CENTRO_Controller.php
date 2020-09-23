<?php

//Script : CENTRO_Controller
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

	//Incluyo las vistas y el modelo de CENTRO
	include '../Model/CENTRO_Model.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';
	include '../Model/EDIFICIO_Model.php';

//La función get_data_form() recoge los valores del modelo CENTRO que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve.
	function get_data_form(){
		//Compruebo si los valores vienen por _GET o _POST, ya que en el SHOWCURRENT paso parametros para mostrar la entidad debil
		if($_GET){
		$CODCENTRO = ""; 
		$CODEDIFICIO = $_GET['CODEDIFICIO'];
		$NOMBRECENTRO =  ""; 
		$DIRECCIONCENTRO =  ""; 
		$RESPONSABLECENTRO =  ""; 
		$action = $_GET['action'];
		}else{
		$CODCENTRO = $_POST['CODCENTRO']; 
		$CODEDIFICIO = $_POST['CODEDIFICIO'];
		$NOMBRECENTRO = $_POST['NOMBRECENTRO'];
		$DIRECCIONCENTRO = $_POST['DIRECCIONCENTRO'];
		$RESPONSABLECENTRO = $_POST['RESPONSABLECENTRO'];
		$action = $_POST['action'];
	}
		
		$centros = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
		return $centros;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // Se invoca la vista de add de CENTRO
					$EDIFICIO = new EDIFICIO_Model('','','',''); //creamos el objeto edificio 
					$EDIFICIOS = $EDIFICIO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					new CENTRO_ADD($EDIFICIOS);
				}
				else{
					$centros = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $centros->ADD(); //Se pasan el modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el CODCENTRO a eliminar por get
					$centros = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); //Se crea el objeto
					$valores = $centros->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					new CENTRO_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //LLegan los datos confirmados por post y se eliminan
					$centros = get_data_form();
					$respuesta = $centros->DELETE();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //Nos llega el CENTRO a editar por get
					$centros = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); // Creo el objeto
					$valores = $centros->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
					$EDIFICIO = new EDIFICIO_Model('','','',''); //creamos el objeto edificio 
					$EDIFICIOS = $EDIFICIO->SEARCH(); //Devuelve los datos para seleccionar el CODEDIFICIO en la vista.
					if (is_array($valores))
					{
						new CENTRO_EDIT($valores,$EDIFICIOS); //Invoco la vista de edit con los datos ya cargados
					}else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$centros = get_data_form(); //Recojo los valores del formulario

					$respuesta = $centros->EDIT(); // Update de la tabla CENTRO en la base de datos
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new CENTRO_SEARCH();
				}
				else{
					$centros = get_data_form(); //Recojo los valores del formulario
					$datos = $centros->SEARCH(); // Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');
					//Instancio el ShowAll
					new CENTRO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$centros = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); //Nos llega el CENTRO a mostrar por get y creamos el objeto
				$valores = $centros->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new CENTRO_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$centros = new CENTRO_Model('','','','','');
				}
				else{
					$centros = get_data_form(); //Recojo los valores del formulariot
				}
				$datos = $centros->SEARCH(); //Busca según los parametros especificados
				$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');
				new CENTRO_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>
