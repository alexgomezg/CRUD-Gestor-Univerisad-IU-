<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad EDIFICIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad EDIFICIO
	include '../Model/EDIFICIO_Model.php';

//Tests sobre el ADD de la entidad
function EDIFICIO_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	 //Entidad testeada
	$EDIFICIO_array_test1['metodo'] = 'ADD';         //Método testeado
	$EDIFICIO_array_test1['error'] = 'El edificio ya existe'; //Error testeado
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$EDIFICIO_array_test1['error_obtenido'] = ''; //Error obtenido
	$EDIFICIO_array_test1['resultado'] = '';  //Resultado OK o FALSE

	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
    //Inserto la tupla
	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	


   // Comprobar insercción correcta
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	//Hago el ADD
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	
}

function EDIFICIO_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

	// Comprobar edit correcto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'EDIT';
	$EDIFICIO_array_test1['error'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	
}

function EDIFICIO_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


	// Comprobar search correcto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'SEARCH';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'object';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$edificio->ADD();
// inserto la tupla
	$EDIFICIO_array_test1['error_obtenido'] = gettype($edificio->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	


	// Comprobar search incorrecto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'SEARCH';
	$EDIFICIO_array_test1['error'] = 'Error en la búsqueda';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$edificio->CODEDIFICIO="' AND USUARI='loquesea";
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	
}

function EDIFICIO_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


	// Comprobar rellena datos correcto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'Devuelve un array';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$edificio->ADD();
// inserto la tupla
	$EDIFICIO_array_test1['error_obtenido'] = gettype($edificio->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	
}

function EDIFICIO_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


	// Comprobar delete correcto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'DELETE';
	$EDIFICIO_array_test1['error'] = 'Borrado Correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODEDIFICIO= 'COD1';
	$NOMBREEDIFICIO = 'minombre';
	$DIRECCIONEDIFICIO = 'midir';
	$CAMPUSEDIFICIO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$edificio = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$edificio->ADD();
// inserto la tupla
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$edificio->DELETE();	
}
	//Invoco a los métodos para hacer los test
	EDIFICIO_ADD_test();
	EDIFICIO_EDIT_test();
	EDIFICIO_SEARCH_test();
	EDIFICIO_RellenaDatos_test();
	EDIFICIO_DELETE_test();
?>

