<?php
//testing funcionalidades globales
include '../Model/config.php';

function ExisteBD()
{

	global $ERRORS1_array_test;

// creo array de almacen de test individual
	$global_array_test = array();

// Prueba de conexión
//-------------------------------------------------------------------------------
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Conexión correcta';
	$global_array_test['error_esperado'] = "Correcto";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	if (!$mysqli = new mysqli(host, user, pass , BD))
	{

	}
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    	 //echo $mysqli->connect_error;
    }else{
    	$global_array_test['error_obtenido'] = 'Correcto';
    }


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS1_array_test, $global_array_test);

// Prueba de conexión fallida
//-------------------------------------------------------------------------------
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Conexión incorrecta';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	if (!$mysqli = new mysqli(host, user, 'aaa' , BD))
	{

	}

    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    	 //echo $mysqli->connect_error;
    }


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS1_array_test, $global_array_test);

	//Existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe la bd';
	$global_array_test['error_esperado'] = "Correcto";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }else{
    	$global_array_test['error_obtenido'] = 'Correcto';
    }


   	if ($global_array_test['error_esperado']==$global_array_test['error_obtenido'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS1_array_test, $global_array_test);


	//NO existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'No existe la bd';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' to database ";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , 'oo');
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) !== false)
	{
		$global_array_test['resultado'] = 'FALSE';
	}
	else
	{
		$global_array_test['resultado'] = 'OK';
	}

	array_push($ERRORS1_array_test, $global_array_test);

    

	if ((strpos($mysqli->connect_error,"Name or service not known")) !== false)
    {
    	//la direccion no existe
    }

    if ((strpos($mysqli->connect_error,"Connection refused")) !== false)
    {
    	//el gestor no esta levantado
    }


}




function ExistenTablas()
{
	global $ERRORS1_array_test;
	$tablas[]='USUARIOS';
	$tablas[]='PROFESOR';
	$tablas[]='EDIFICIO';
	$tablas[]='CENTRO';
	$tablas[]='ESPACIO';
	$tablas[]='PROF_ESPACIO';
	$tablas[]='PROF_TITULACION';
	$tablas[]='TITULACION';
	
	for($i=0;$i<8;$i++){
    $global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$texto='Existe '.$tablas[$i];
	$global_array_test['error'] = $texto;
	$global_array_test['error_esperado'] = "Correcto";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    $sql="Select * from ".$tablas[$i]." where 1";
    if ($mysqli->query($sql))
	{
		$global_array_test['error_obtenido'] ="Correcto";
	}


   	if ($global_array_test['error_esperado']==$global_array_test['error_obtenido'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS1_array_test, $global_array_test);
}


}

ExisteBD();
ExistenTablas();

?>