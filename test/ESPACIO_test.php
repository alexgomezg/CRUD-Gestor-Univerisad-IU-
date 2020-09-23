<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad ESPACIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad ESPACIO
//include '../Model/EDIFICIO_Model.php';
	include '../Model/ESPACIO_Model.php';

//Tests sobre el ADD de la entidad
function ESPACIO_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	 //Entidad testeada
	$ESPACIO_array_test1['metodo'] = 'ADD';         //Método testeado
	$ESPACIO_array_test1['error'] = 'El espacio ya existe'; //Error testeado
	$ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$ESPACIO_array_test1['error_obtenido'] = ''; //Error obtenido
	$ESPACIO_array_test1['resultado'] = '';  //Resultado OK o FALSE


    //Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
    //Inserto la tupla
	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();	


   // Comprobar insercción correcta
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	//Hago el ADD
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}

function ESPACIO_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

	// Comprobar edit correcto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'EDIT';
	$ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
    //Inserto la tupla
	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	
}

function ESPACIO_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


	// Comprobar search correcto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SEARCH';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'object';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
// inserto la tupla
	$ESPACIO_array_test1['error_obtenido'] = gettype($espacio->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();	


	// Comprobar search incorrecto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SEARCH';
	$ESPACIO_array_test1['error'] = 'Error en la búsqueda';
	$ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$espacio->CODESPACIO="' AND USUARI='loquesea";
	$ESPACIO_array_test1['error_obtenido'] = $espacio->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();	
}

function ESPACIO_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


	// Comprobar rellena datos correcto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$ESPACIO_array_test1['error'] = 'Devuelve un array';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
    //Inserto la tupla
	$espacio->ADD();
// inserto la tupla
	$ESPACIO_array_test1['error_obtenido'] = gettype($espacio->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();	

}

function ESPACIO_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();
	// Comprobar delete correcto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'DELETE';
	$ESPACIO_array_test1['error'] = 'Borrado Correcto';
	$ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODESPACIO= 'PRUEBA1';
	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 
    //Creo el modelo y lo guardo en una variable
	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
    //Inserto la tupla
	$espacio->ADD();
// inserto la tupla
	$ESPACIO_array_test1['error_obtenido'] = $espacio->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}
	//Invoco a los métodos para hacer los test
	ESPACIO_ADD_test();
	ESPACIO_EDIT_test();
	ESPACIO_SEARCH_test();
	ESPACIO_RellenaDatos_test();
	ESPACIO_DELETE_test();
?>