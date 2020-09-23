<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//Fichero de test de validaciones de la entidad USUARIOS, saca por pantalla el resultado de los test.

function PROFESOR_ATRIBUTOS_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS2_array_test;
	$ENTIDAD='PROFESOR'; //Variable que guarda la entidad que se esta testeando
  //Creo array de almacen de test individual
	$array_test1 = array();

	//Creo un modelo vacio
	$profesor = new PROFESOR_Model('','','','','');

	/////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<DNI>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$profesor->comprobar_DNI();

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
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('77','','','','');
	$error=$profesor->comprobar_DNI();

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

	//Mayor de 9
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('1234567899','','','','');
	$error=$profesor->comprobar_DNI();

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


	//Formato de DNI erroneo
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Formato dni erróneo'; //Error testeado
	$array_test1['error_esperado'] = '00010'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('7673aa65','','','','');
	$error=$profesor->comprobar_DNI();

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


	//DNI no válido
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'DNI no válido'; //Error testeado
	$array_test1['error_esperado'] = '00011'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('76734153A','','','','');
	$error=$profesor->comprobar_DNI();

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

	//DNI correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('76734153N','','','','');
	$error=$profesor->comprobar_DNI();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<NOMBREPROFESOR>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBREPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$profesor->comprobar_NOMBREPROFESOR();

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
	$array_test1['metodo'] = 'NOMBREPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','aa','','','');
	$error=$profesor->comprobar_NOMBREPROFESOR();

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

	//Mayor de 15
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBREPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','');
	$error=$profesor->comprobar_NOMBREPROFESOR();

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
	$array_test1['metodo'] = 'NOMBREPROFESOR';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','a+´+´´+aa','','','');
	$error=$profesor->comprobar_NOMBREPROFESOR();

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
	$array_test1['metodo'] = 'NOMBREPROFESOR';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','Alex','','','');
	$error=$profesor->comprobar_NOMBREPROFESOR();

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
///////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<APELLIDOSPROFESOR>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'APELLIDOSPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$profesor->comprobar_APELLIDOSPROFESOR();

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
	$array_test1['metodo'] = 'APELLIDOSPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','aa','','');
	 $error=$profesor->comprobar_APELLIDOSPROFESOR();

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

	//Mayor de 30
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'APELLIDOSPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','');
	$error=$profesor->comprobar_APELLIDOSPROFESOR();

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
	$array_test1['metodo'] = 'APELLIDOSPROFESOR';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','aaaa[]aa','','');
	$error=$profesor->comprobar_APELLIDOSPROFESOR();

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
	$array_test1['metodo'] = 'APELLIDOSPROFESOR';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','Gómez González','','');
	$error=$profesor->comprobar_APELLIDOSPROFESOR();

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
///////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<AREAPROFESOR>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'AREAPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$profesor->comprobar_AREAPROFESOR();

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
	$array_test1['metodo'] = 'AREAPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	 $profesor = new PROFESOR_Model('','','','AA','');
	 $error=$profesor->comprobar_AREAPROFESOR();

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
	$array_test1['metodo'] = 'AREAPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','');
	$error=$profesor->comprobar_AREAPROFESOR();

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
	$array_test1['metodo'] = 'AREAPROFESOR';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','a[][]aa','');
	$error=$profesor->comprobar_AREAPROFESOR();


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
	$array_test1['metodo'] = 'AREAPROFESOR';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','Informática','');
	$error=$profesor->comprobar_AREAPROFESOR();

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
///////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<DEPARTAMENTOPROFESOR>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$profesor->comprobar_DEPARTAMENTOPROFESOR();

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
	$array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	 $profesor = new PROFESOR_Model('','','','','Aa');
	 $error=$profesor->comprobar_DEPARTAMENTOPROFESOR();

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
	$array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
	$error=$profesor->comprobar_DEPARTAMENTOPROFESOR();

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
	$array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','','aaa[][[]');
	$error=$profesor->comprobar_DEPARTAMENTOPROFESOR();


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
	$array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$profesor = new PROFESOR_Model('','','','','Programación en JAVA');
	$error=$profesor->comprobar_DEPARTAMENTOPROFESOR();

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

	$profesor = new PROFESOR_Model('aa','aa','aa','aa','aa');
	$error=$profesor->comprobar_atributos();

    $numErrores=0; //Número de errores que he encontrado en el array de errores
    $numAtributos=5; //Número de atributos de la entidad
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

	$profesor = new PROFESOR_Model('76734153n','Alejandro','Gómez González','Informática','Programación');
	$error=$profesor->comprobar_atributos();

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
PROFESOR_ATRIBUTOS_test();
?>