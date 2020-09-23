<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad CENTRO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad CENTRO
//include '../Model/EDIFICIO_Model.php';
	include '../Model/CENTRO_Model.php';

//Tests sobre el ADD de la entidad
function CENTRO_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$CENTRO_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$CENTRO_array_test1['entidad'] = 'CENTRO';	 //Entidad testeada
	$CENTRO_array_test1['metodo'] = 'ADD';         //Método testeado
	$CENTRO_array_test1['error'] = 'El centro ya existe'; //Error testeado
	$CENTRO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$CENTRO_array_test1['error_obtenido'] = ''; //Error obtenido
	$CENTRO_array_test1['resultado'] = '';  //Resultado OK o FALSE

	
    //Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();

	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
    //Inserto la tupla
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();	


   // Comprobar insercción correcta
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	//Hago el ADD
	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();
	$edificio->DELETE();
}

function CENTRO_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	// Comprobar edit correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'EDIT';
	$CENTRO_array_test1['error'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();

	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();
	$edificio->DELETE();

	
}

function CENTRO_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


	// Comprobar search correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'SEARCH';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'object';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
// inserto la tupla
	$CENTRO_array_test1['error_obtenido'] = gettype($centro->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();	


	// Comprobar search incorrecto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'SEARCH';
	$CENTRO_array_test1['error'] = 'Error en la búsqueda';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	$centro->CODCENTRO="' AND USUARI='loquesea";
	$CENTRO_array_test1['error_obtenido'] = $centro->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();	
}

function CENTRO_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


	// Comprobar rellena datos correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'Devuelve un array';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();

	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	$centro->ADD();
// inserto la tupla
	$CENTRO_array_test1['error_obtenido'] = gettype($centro->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();
	$edificio->DELETE();	

}

function CENTRO_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();
	// Comprobar delete correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'DELETE';
	$CENTRO_array_test1['error'] = 'Borrado Correcto';
	$CENTRO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODCENTRO= 'PRUEBA1';
	$CODEDIFICIO='TEST1';
	$NOMBRECENTRO = 'minombre';
	$DIRECCIONCENTRO = 'midir';
	$RESPONSABLECENTRO = 'campus'; 
    //Creo el modelo y lo guardo en una variable
	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	$centro->ADD();
// inserto la tupla
	$CENTRO_array_test1['error_obtenido'] = $centro->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $CENTRO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$centro->DELETE();
	$edificio->DELETE();
}
	//Invoco a los métodos para hacer los test
	CENTRO_ADD_test();
	CENTRO_EDIT_test();
	CENTRO_SEARCH_test();
	CENTRO_RellenaDatos_test();
	CENTRO_DELETE_test();
?>

