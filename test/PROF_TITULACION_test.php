<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_TITULACION
include '../Model/PROF_TITULACION_Model.php';

//Tests sobre el ADD de la entidad
function PROF_TITULACION_ADD_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

//Comprobar el error en la inserción porque el elemento ya existe
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	 //Entidad testeada
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';         //Método testeado
	$PROF_TITULACION_array_test1['error'] = 'El prof_titulacion ya existe'; //Error testeado
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe'; //Error esperado
	$PROF_TITULACION_array_test1['error_obtenido'] = ''; //Error obtenido
	$PROF_TITULACION_array_test1['resultado'] = '';  //Resultado OK o FALSE


    //Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODTITULACION='TEST3';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';

	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	$titulacion->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
	// Relleno los datos de la entidad
	$ANHO= '2019-2020';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
    //Inserto la tupla
	$prof_titulacion->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();
	//$PROF_TITULACION_array_test1['error_obtenido'] =$profesor->DELETE()." ".$prof_titulacion->DELETE()." ".$titulacion->DELETE()." ".$centro->DELETE()." ".$edificio->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$profesor->DELETE();
	$prof_titulacion->DELETE();
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	$edificio->ADD();
	$centro->ADD();
	$titulacion->ADD();
	$profesor->ADD();


   // Comprobar insercción correcta
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
	//Hago el ADD
	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test

	$profesor->DELETE();
	$prof_titulacion->DELETE();
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}

function PROF_TITULACION_EDIT_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	// Comprobar edit correcto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'EDIT';
	$PROF_TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODTITULACION='TEST3';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';

	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	$titulacion->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
	// Relleno los datos de la entidad
	$ANHO= '2019-2020';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
    //Inserto la tupla
	$prof_titulacion->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->EDIT();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();
	$prof_titulacion->DELETE();
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

	
}

function PROF_TITULACION_SEARCH_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();


	// Comprobar search correcto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'object';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '00745362R';
	$CODTITULACION='TEST3';
	$ANHO='2020-2021';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
// inserto la tupla
	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($prof_titulacion->SEARCH());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$prof_titulacion->DELETE();	


	// Comprobar search incorrecto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
	$PROF_TITULACION_array_test1['error'] = 'Error en la búsqueda';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de la entidad
	$dni= '00745362R';
	$CODTITULACION='TEST3';
	$ANHO='2020-2021';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
	
	$prof_titulacion->CODTITULACION="' AND USUARI='loquesea";
	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->SEARCH();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$prof_titulacion->DELETE();	
}

function PROF_TITULACION_RellenaDatos_test(){
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();


	// Comprobar rellena datos correcto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve un array';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODTITULACION='TEST3';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';

	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	$titulacion->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
	// Relleno los datos de la entidad
	$ANHO= '2019-2020';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
    //Inserto la tupla
	$prof_titulacion->ADD();
// inserto la tupla
	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($prof_titulacion->RellenaDatos());
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$profesor->DELETE();
	$prof_titulacion->DELETE();
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}

function PROF_TITULACION_DELETE_test(){
	global $ERRORS_array_test;
//Creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	//Creo un edificio y lo añado para evitar problemas con la validaciones de integridad referencial
	$edificio = new EDIFICIO_Model('TEST1','minombre','minombre','campus');
	$edificio->ADD();
	// Comprobar delete correcto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'DELETE';
	$PROF_TITULACION_array_test1['error'] = 'Borrado Correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	//Creo un edificio,centro y una titulacion, los añado para evitar problemas con la validaciones de integridad referencial
    $CODEDIFICIO='TEST1';
	$CODCENTRO='TEST2';
	$CODTITULACION='TEST3';

	$edificio = new EDIFICIO_Model($CODEDIFICIO,'minombre','minombre','campus');
	$edificio->ADD();

	$centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,'minombre','minombre','minombre');
	$centro->ADD();

	$NOMBRETITULACION = 'NOMBRE';
	$RESPONSABLETITULACION = 'RESPONSABLE';

	$titulacion = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
	$titulacion->ADD();

	$dni= '00745362R';
	$nombre = 'minombre';
	$apellidos = 'miapellido';
	$area = 'miarea';
	$departamento = 'midepartamento'; 

	$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();
	
	// Relleno los datos de la entidad
	$ANHO= '2019-2020';
    //Creo el modelo y lo guardo en una variable
	$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTITULACION,$ANHO);
    //Inserto la tupla
	$prof_titulacion->ADD();
	$profesor->DELETE();//Borro el profesor para evitar el problema de integridad referencial
	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->DELETE();
	//Compruebo si el error obetenido es igual al error esperado
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	//Se inserta en el array de errores global el error que se acaba de testear
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
	//Borro para dejar la base de datos en el estado inicial al test
	$prof_titulacion->DELETE();
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
}
	//Invoco a los métodos para hacer los test
	PROF_TITULACION_ADD_test();
	PROF_TITULACION_EDIT_test();
	PROF_TITULACION_SEARCH_test();
	PROF_TITULACION_RellenaDatos_test();
	PROF_TITULACION_DELETE_test();
?>