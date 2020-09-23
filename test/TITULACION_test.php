<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad TITULACION
//include '../Model/EDIFICIO_Model.php';
	include '../Model/TITULACION_Model.php';

//Tests sobre el ADD de la entidad
function TITULACION_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$TITULACION_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$TITULACION_array_test1['entidad'] = 'TITULACION';	 //Entidad testeada
	$TITULACION_array_test1['metodo'] = 'ADD';         //Método testeado
	$TITULACION_array_test1['error'] = 'El titulacion ya existe'; //Error testeado
	$TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$TITULACION_array_test1['error_obtenido'] = ''; //Error obtenido
	$TITULACION_array_test1['resultado'] = '';  //Resultado OK o FALSE


    //Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
    //Inserto la tupla
	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();	


   // Comprobar insercción correcta
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	//Hago el ADD
	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}

function TITULACION_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	// Comprobar edit correcto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'EDIT';
	$TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
    //Inserto la tupla
	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	
}

function TITULACION_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();


	// Comprobar search correcto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'SEARCH';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'object';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
	$CODCENTRO='COD1';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
// inserto la tupla
	$TITULACION_array_test1['error_obtenido'] = gettype($titulacion->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();	


	// Comprobar search incorrecto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'SEARCH';
	$TITULACION_array_test1['error'] = 'Error en la búsqueda';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
	$CODCENTRO='COD1';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	
	$titulacion->CODTITULACION="' AND USUARI='loquesea";
	$TITULACION_array_test1['error_obtenido'] = $titulacion->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();	
}

function TITULACION_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();


	// Comprobar rellena datos correcto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'Devuelve un array';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
    //Inserto la tupla
	$titulacion->ADD();
// inserto la tupla
	$TITULACION_array_test1['error_obtenido'] = gettype($titulacion->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();	

}

function TITULACION_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();
	// Comprobar delete correcto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'DELETE';
	$TITULACION_array_test1['error'] = 'Borrado Correcto';
	$TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	//Creo un edificio y un centro, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();
	
	// Relleno los datos de la entidad
	$CODTITULACION= 'PRUEBA1';
	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';
    //Creo el modelo y lo guardo en una variable
	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
    //Inserto la tupla
	$titulacion->ADD();
// inserto la tupla
	$TITULACION_array_test1['error_obtenido'] = $titulacion->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}
	//Invoco a los métodos para hacer los test
	TITULACION_ADD_test();
	TITULACION_EDIT_test();
	TITULACION_SEARCH_test();
	TITULACION_RellenaDatos_test();
	TITULACION_DELETE_test();
?>