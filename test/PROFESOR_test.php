<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROFESOR
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROFESOR
	include '../Model/PROFESOR_Model.php';

//Tests sobre el ADD de la entidad
function PROFESOR_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	 //Entidad testeada
	$PROFESOR_array_test1['metodo'] = 'ADD';         //Método testeado
	$PROFESOR_array_test1['error'] = 'El profesor ya existe'; //Error testeado
	$PROFESOR_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$PROFESOR_array_test1['error_obtenido'] = ''; //Error obtenido
	$PROFESOR_array_test1['resultado'] = '';  //Resultado OK o FALSE
	
	// Relleno los datos de la entidad
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
    //Creo el modelo y lo guardo en una variable
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
    //Inserto la tupla
	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	


   // Comprobar insercción correcta
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
// creo el modelo
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	//Hago el ADD
	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	
}

function PROFESOR_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

	// Comprobar edit correcto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'EDIT';
	$PROFESOR_array_test1['error'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
// creo el modelo e inserto la tupla en la base de datos
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	
}

function PROFESOR_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();


	// Comprobar search correcto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'SEARCH';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'object';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
// creo el modelo
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
// inserto la tupla
	$PROFESOR_array_test1['error_obtenido'] = gettype($profesor->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	


	// Comprobar search incorrecto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'SEARCH';
	$PROFESOR_array_test1['error'] = 'Error en la búsqueda';
	$PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad	
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
//Creo el modelo
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->dni="' AND usuario='loquesea";
	$PROFESOR_array_test1['error_obtenido'] = $profesor->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	
}

function PROFESOR_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();


	// Comprobar rellena datos correcto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'RellenaDatos';
	$PROFESOR_array_test1['error'] = 'Devuelve un array';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
// creo el modelo
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
// inserto la tupla
	$PROFESOR_array_test1['error_obtenido'] = gettype($profesor->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	
}

function PROFESOR_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROFESOR_array_test1 = array();


	// Comprobar delete correcto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'DELETE';
	$PROFESOR_array_test1['error'] = 'Borrado Correcto';
	$PROFESOR_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad	
	$dni= '09777185T';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 
//Creo el modelo
	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
// inserto la tupla
	$PROFESOR_array_test1['error_obtenido'] = $profesor->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();	
}
	//Invoco a los métodos para hacer los test
	PROFESOR_ADD_test();
	PROFESOR_EDIT_test();
	PROFESOR_SEARCH_test();
	PROFESOR_RellenaDatos_test();
	PROFESOR_DELETE_test();
?>


