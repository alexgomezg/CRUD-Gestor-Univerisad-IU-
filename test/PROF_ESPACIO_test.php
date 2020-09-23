<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_ESPACIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_ESPACIO
include '../Model/PROF_ESPACIO_Model.php';

//Tests sobre el ADD de la entidad
function PROF_ESPACIO_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	 //Entidad testeada
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';         //Método testeado
	$PROF_ESPACIO_array_test1['error'] = 'El PROF_ESPACIO ya existe'; //Error testeado
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$PROF_ESPACIO_array_test1['error_obtenido'] = ''; //Error obtenido
	$PROF_ESPACIO_array_test1['resultado'] = '';  //Resultado OK o FALSE


    //Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO='TEST4';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 

	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$espacio->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
    //Inserto la tupla
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
	//$PROF_ESPACIO_array_test1['error_obtenido'] =$profesor->DELETE()." ".$PROF_ESPACIO->DELETE()." ".$espacio->DELETE()." ".$centro->DELETE()." ".$edificio->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$profesor->DELETE();
	$PROF_ESPACIO->DELETE();
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	$edificio->ADD();
	$centro->ADD();
	$espacio->ADD();
	$profesor->ADD();


   // Comprobar insercción correcta
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
	//Hago el ADD
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test

	$profesor->DELETE();
	$PROF_ESPACIO->DELETE();
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}

function PROF_ESPACIO_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	// Comprobar edit correcto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'EDIT';
	$PROF_ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO='TEST4';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 

	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$espacio->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
    //Inserto la tupla
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();
	$PROF_ESPACIO->DELETE();
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	
}

function PROF_ESPACIO_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();


	// Comprobar search correcto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'object';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '00745362R';
	$CODESPACIO='TEST3';
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
// inserto la tupla
	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$PROF_ESPACIO->DELETE();	


	// Comprobar search incorrecto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
	$PROF_ESPACIO_array_test1['error'] = 'Error en la búsqueda';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '00745362R';
	$CODESPACIO='TEST3';
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
	
	$PROF_ESPACIO->CODESPACIO="' AND USUARI='loquesea";
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$PROF_ESPACIO->DELETE();	
}

function PROF_ESPACIO_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();


	// Comprobar rellena datos correcto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve un array';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO='TEST4';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 

	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$espacio->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
    //Inserto la tupla
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();
	$PROF_ESPACIO->DELETE();
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}

function PROF_ESPACIO_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();
	// Comprobar delete correcto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'DELETE';
	$PROF_ESPACIO_array_test1['error'] = 'Borrado Correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODESPACIO='TEST4';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$TIPO = 'PAS';
	$SUPERFICIEESPACIO = '100';
	$NUMINVENTARIOESPACIO = '101'; 

	$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$espacio->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
    //Creo el modelo y lo guardo en una variable
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$CODESPACIO);
    //Inserto la tupla
	$PROF_ESPACIO->ADD();
	$profesor->DELETE();//Borro el profesor para evitar el problema de integridad referencial
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$PROF_ESPACIO->DELETE();
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}
	//Invoco a los métodos para hacer los test
	PROF_ESPACIO_ADD_test();
	PROF_ESPACIO_EDIT_test();
	PROF_ESPACIO_SEARCH_test();
	PROF_ESPACIO_RellenaDatos_test();
	PROF_ESPACIO_DELETE_test();
?>