<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//Fichero de test de validaciones de la entidad CENTRO, saca por pantalla el resultado de los test.

function CENTRO_ATRIBUTOS_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS2_array_test;
	$ENTIDAD='CENTRO'; //Variable que guarda la entidad que se esta testeando
  //Creo array de almacen de test individual
	$array_test1 = array();

	//Creo un modelo vacio
	$centro = new CENTRO_Model('','','','','');

////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CODCENTRO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$centro->comprobar_CODCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Menor de 3
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('aa','','','','');
	$error=$centro->comprobar_CODCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Mayor de 10
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('aaaaaaaaaaaaaaaaaaaaaaaaaa','','','','');
	$error=$centro->comprobar_CODCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//No cumple la expresión regular
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = "Solo están permitidas alfabéticos, números y el “-”"; //Error testeado
	$array_test1['error_esperado'] = '00040'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('COD/1','','','','');
	$error=$centro->comprobar_CODCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Nombre correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('COD-1','','','','');
	$error=$centro->comprobar_CODCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}

	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);
////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CODEDIFICIO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$centro->comprobar_CODEDIFICIO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Menor de 3
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','aa','','','');
	$error=$centro->comprobar_CODEDIFICIO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Mayor de 10
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','aaaaaaaaaaaaaaaaaaaaaaaaaaa','','','');
	$error=$centro->comprobar_CODEDIFICIO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//No cumple la expresión regular
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = "Solo están permitidas alfabéticos, números y el “-”"; //Error testeado
	$array_test1['error_esperado'] = '00040'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','aa++a','','','');
	$error=$centro->comprobar_CODEDIFICIO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Nombre correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','CE1','','','');
	$error=$centro->comprobar_CODEDIFICIO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}

	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<NOMBRECENTRO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$centro->comprobar_NOMBRECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Menor de 3
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','aa','','');
	$error=$centro->comprobar_NOMBRECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Mayor de 50
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','');
	$error=$centro->comprobar_NOMBRECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//No cumple la expresión regular
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRECENTRO';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $centro = new CENTRO_Model('','','aaa[]aa','','');
	$error=$centro->comprobar_NOMBRECENTRO();


	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Nombre correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRECENTRO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','Facultade de Ferro','','');
	$error=$centro->comprobar_NOMBRECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}

	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);
////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<DIRECCIONCENTRO>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$centro->comprobar_DIRECCIONCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Menor de 3
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','aa','');
	$error=$centro->comprobar_DIRECCIONCENTRO();
	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Mayor de 150
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','');
	$error=$centro->comprobar_DIRECCIONCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//No cumple la expresión regular
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONCENTRO';         //Método testeado
	$array_test1['error'] = "Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”"; //Error testeado
	$array_test1['error_esperado'] = '00050'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','aa<´´´´aaaaaaaaaaaaaaa','');
	$error=$centro->comprobar_DIRECCIONCENTRO();


	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Nombre correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONCENTRO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','Otero Pedrado Nº 5 bajo','');
	$error=$centro->comprobar_DIRECCIONCENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}

	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);
////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<RESPONSABLECENTRO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$centro->comprobar_RESPONSABLECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Menor de 3
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','','AA');
	$error=$centro->comprobar_RESPONSABLECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Mayor de 60
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLECENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
	$error=$centro->comprobar_RESPONSABLECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//No cumple la expresión regular
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLECENTRO';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','','aa[][]aaaaaaaaaa');
	$error=$centro->comprobar_RESPONSABLECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

	//Nombre correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLECENTRO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('','','','','Alejandro Gómez González');
	$error=$centro->comprobar_RESPONSABLECENTRO();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}

	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);

/////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<TODOS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////

	//Todos los atributos mal
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'TODOS';         //Método testeado
	$array_test1['error'] = "Todos Incorrectos"; //Error testeado
	$array_test1['error_esperado'] = 'FALSE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('aa','aa','aa','5126','Alejandro Gómez`[] González');
	$error=$centro->comprobar_atributos();

    $numErrores=0; //Número de errores que he encontrado en el array de errores
    $numAtributos=4; //Número de atributos de la entidad
    if($error===TRUE){

    }else{
    	//Compruebo que todos los atributos devuelve un error y por tanto todos fallan
    	for($i=0;$i<count($error,0);$i++){
        if(is_array($error[$i])){
       $numErrores++;
    }
      }

    }
	//Compruebo si la validacion devuelve o no error
	if($numErrores==$numAtributos){
		$array_test1['error_obtenido'] ='FALSE';
	}else{
		$array_test1['error_obtenido'] = 'TRUE';
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);


	//Solo permitido hombre y mujer
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'TODOS';         //Método testeado
	$array_test1['error'] = "Todos Correcto"; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$centro = new CENTRO_Model('CE-1','ED-1','ESEI','Calle Principe nª 7º','Abel Caballero');
	$error=$centro->comprobar_atributos();

	//Compruebo si la validacion devuelve o no error
	if($error===TRUE){
		$array_test1['error_obtenido'] ='TRUE';
	}else{
		$array_test1['error_obtenido'] = $error[0]['codigoincidencia'];
	}
	//Compruebo si el error obetenido es igual al error esperado
	if ($array_test1['error_obtenido'] === $array_test1['error_esperado'])
	{
		$array_test1['resultado'] = 'OK';
	}
	else
	{
		$array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS2_array_test, $array_test1);
}

CENTRO_ATRIBUTOS_test();

?>