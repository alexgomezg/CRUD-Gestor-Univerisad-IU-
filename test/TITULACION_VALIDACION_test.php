<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//Fichero de test de validaciones de la entidad TITULACION, saca por pantalla el resultado de los test.

function TITULACION_ATRIBUTOS_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS2_array_test;
	$ENTIDAD='TITULACION'; //Variable que guarda la entidad que se esta testeando
  //Creo array de almacen de test individual
	$array_test1 = array();

	//Creo un modelo vacio
	$titulacion = new TITULACION_Model('','','','');

////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CODTITULACION>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODTITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$titulacion->comprobar_CODTITULACION();

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
	$array_test1['metodo'] = 'CODTITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('aa','','','');
	$error=$titulacion->comprobar_CODTITULACION();


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
	$array_test1['metodo'] = 'CODTITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','');
	$error=$titulacion->comprobar_CODTITULACION();

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
	$array_test1['metodo'] = 'CODTITULACION';         //Método testeado
	$array_test1['error'] = "Solo se permiten alfabéticos y números"; //Error testeado
	$array_test1['error_esperado'] = '00060'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('aaa[][aa','','','');
	$error=$titulacion->comprobar_CODTITULACION();

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
	$array_test1['metodo'] = 'CODTITULACION';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('IU2019','','','');
	$error=$titulacion->comprobar_CODTITULACION();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CODCENTRO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODCENTRO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$titulacion->comprobar_CODCENTRO();

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

	$titulacion = new TITULACION_Model('','aa','','');
	$error=$titulacion->comprobar_CODCENTRO();

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

	$titulacion = new TITULACION_Model('','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','');
	$error=$titulacion->comprobar_CODCENTRO();

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

	$titulacion = new TITULACION_Model('','aaa//a','','');
	$error=$titulacion->comprobar_CODCENTRO();


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

	$titulacion = new TITULACION_Model('','CE1','','');
	$error=$titulacion->comprobar_CODCENTRO();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<NOMBRETITULACION>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBRETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$titulacion->comprobar_NOMBRETITULACION();

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
	$array_test1['metodo'] = 'NOMBRETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','AA','');
	$error=$titulacion->comprobar_NOMBRETITULACION();

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
	$array_test1['metodo'] = 'NOMBRETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','');
	$error=$titulacion->comprobar_NOMBRETITULACION();

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
	$array_test1['metodo'] = 'NOMBRETITULACION';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','a[][][aa','');
	$error=$titulacion->comprobar_NOMBRETITULACION();

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
	$array_test1['metodo'] = 'NOMBRETITULACION';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','Grao en Ing Informática','');
	$error=$titulacion->comprobar_NOMBRETITULACION();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<RESPONSABLETITULACION>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'RESPONSABLETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$titulacion->comprobar_RESPONSABLETITULACION();

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
	$array_test1['metodo'] = 'RESPONSABLETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','','aa');
	$error=$titulacion->comprobar_RESPONSABLETITULACION();

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
	$array_test1['metodo'] = 'RESPONSABLETITULACION';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
	$error=$titulacion->comprobar_RESPONSABLETITULACION();

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
	$array_test1['metodo'] = 'RESPONSABLETITULACION';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','','aaaa``');
	$error=$titulacion->comprobar_RESPONSABLETITULACION();

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
	$array_test1['metodo'] = 'RESPONSABLETITULACION';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$titulacion = new TITULACION_Model('','','','Alejandro Gómez González');
	$error=$titulacion->comprobar_RESPONSABLETITULACION();
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

	$titulacion = new TITULACION_Model('aa','aa','aa','Al<-<ñejandro Gómez González');
	$error=$titulacion->comprobar_atributos();

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

	$titulacion = new TITULACION_Model('TITU5','CE-1','GRAO','Alejandro Gómez González');
	$error=$titulacion->comprobar_atributos();

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
TITULACION_ATRIBUTOS_test();
?>