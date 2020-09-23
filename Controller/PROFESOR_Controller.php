<?php

//Script : PROFESOR_Controller
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González

	session_start(); //Solicito trabajar con la session

	include '../Functions/Authentication.php'; //Incluyo el script de autenticación

	if (!IsAuthenticated()){
		header('Location:../index.php'); // Si no esta autenticado lo redirijo a index.php
	}

//Incluyo las vistas y el modelo de PROFESOR
	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

//La función get_data_form() recoge los valores del modelo PROFESOR que vienen del formulario por medio de post y la action a realizar, crea una instancia PROFESOR y la devuelve.
	function get_data_form(){

		$dni = $_POST['dni'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$area = $_POST['area'];
		$departamento = $_POST['departamento'];
		$action = $_POST['action'];

		
		$profesores = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
		return $profesores;
	}

	
//Si no existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

//En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // Se invoca la vista de add de usuarios
					new PROFESOR_ADD();
				}
				else{
					$profesores = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $profesores->ADD(); //Se pasan al modelo y se hace el add en la base de datos
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'DELETE':
				if (!$_POST){ //LLega el DNI a eliminar por get
					$profesores = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); //Se crea el objeto
					$valores = $profesores->RellenaDatos(); // Se rellenan los datos del objeto con los datos de la tupla
					new PROFESOR_DELETE($valores); //Se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ //Llegan los datos confirmados por post y se eliminan
					$profesores = get_data_form(); //Se recogen los datos del formulario
					$respuesta = $profesores->DELETE(); // Se hace el DELETE en la base de datos
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); // Muestra el resultado de la operación
				}
				break;
			case 'EDIT':
				if (!$_POST){ //LLega el PROFESOR a editar por get
					$profesores = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); // Creo el objeto
					$valores = $profesores->RellenaDatos(); // Se rellenan los datos del objeto con los datos de la tupla leida de la bd
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //Invoco la vista de edit con los datos ya cargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php'); // Muestra el resultado de la operación
					}
				}
				else{

					$profesores = get_data_form(); //Se recogen los datos del formulario

					$respuesta = $profesores->EDIT(); // Update de la tabla PROFESOR en la base de datos
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); // Muestra el resultado de la operación
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROFESOR_SEARCH();
				}
				else{
					$profesores = get_data_form(); //Se recogen los datos del formulario
					$datos = $profesores->SEARCH();// Hago la busqueda en la base de datos y devuelvo las tuplas correspondientes
					//Valores que se van a mostrar en el ShowALL
					$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
					//Instancio el ShowAll
					new PROFESOR_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$profesores = new PROFESOR_Model($_REQUEST['DNI'],'','','','');//Nos llega el PROFESOR a mostrar por get y creamos el objeto
				$valores = $profesores->RellenaDatos(); // Se rellenan los datos de la tupla que viene del objeto creado
				new PROFESOR_SHOWCURRENT($valores); //Instancio al vista con los valores de la tupla correspondiente
				break;
			default:
				if (!$_POST){
					$profesores = new PROFESOR_Model('','','','','');
				}
				else{
					$profesores = get_data_form(); //Se recogen los datos del formulario
				}
				$datos = $profesores->SEARCH(); //Busca según los parametros especificados
				$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
				new PROFESOR_SHOWALL($lista, $datos); //Se instancia el ShowALL con los valores pasados
		}

?>
