<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//Fichero de test de validaciones de la entidad EDIFICIO, saca por pantalla el resultado de los test.

function EDIFICIO_ATRIBUTOS_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS2_array_test;
	$ENTIDAD='EDIFICIO'; //Variable que guarda la entidad que se esta testeando
  //Creo array de almacen de test individual
	$array_test1 = array();

	//Creo un modelo vacio
	$edificio = new EDIFICIO_Model('','','','');

////////////////////////////////////////////////////////////////////////////////
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CODEDIFICIO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CODEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$edificio->comprobar_CODEDIFICIO();

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

	$edificio = new EDIFICIO_Model('aa','','','');
	$error=$edificio->comprobar_CODEDIFICIO();

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

	$edificio = new EDIFICIO_Model('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','');
	$error=$edificio->comprobar_CODEDIFICIO();

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

	$edificio = new EDIFICIO_Model('+++aa','','','');
	$error=$edificio->comprobar_CODEDIFICIO();

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

	$edificio = new EDIFICIO_Model('COD-1','','','');
	$error=$edificio->comprobar_CODEDIFICIO();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<NOMBREEDIFICIO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'NOMBREEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$edificio->comprobar_NOMBREEDIFICIO();

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
	$array_test1['metodo'] = 'NOMBREEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','aa','','');
	$error=$edificio->comprobar_NOMBREEDIFICIO();

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
	$array_test1['metodo'] = 'NOMBREEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','aaaaavaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','');
	$error=$edificio->comprobar_NOMBREEDIFICIO();

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
	$array_test1['metodo'] = 'NOMBREEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','aa{{{a','','');
	$error=$edificio->comprobar_NOMBREEDIFICIO();

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
	$array_test1['metodo'] = 'NOMBREEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','ESEI','','');
	$error=$edificio->comprobar_NOMBREEDIFICIO();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<DIRECCIONEDIFICIO>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DIRECCIONEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$edificio->comprobar_DIRECCIONEDIFICIO();

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
	$array_test1['metodo'] = 'DIRECCIONEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','AA','');
	$error=$edificio->comprobar_DIRECCIONEDIFICIO();
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
	$array_test1['metodo'] = 'DIRECCIONEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','aaaaavaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','');
	$error=$edificio->comprobar_DIRECCIONEDIFICIO();

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
	$array_test1['metodo'] = 'DIRECCIONEDIFICIO';         //Método testeado
	$array_test1['error'] = "Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”"; //Error testeado
	$array_test1['error_esperado'] = '00050'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','aa{{{a','');
	$error=$edificio->comprobar_DIRECCIONEDIFICIO();

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
	$array_test1['metodo'] = 'DIRECCIONEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','Otero Pedrado Nº 5 bajo','');
	$error=$edificio->comprobar_DIRECCIONEDIFICIO();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<CAMPUSEDIFICIO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'CAMPUSEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$edificio->comprobar_CAMPUSEDIFICIO();

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
	$array_test1['metodo'] = 'CAMPUSEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','','aa');
	$error=$edificio->comprobar_CAMPUSEDIFICIO();

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
	$array_test1['metodo'] = 'CAMPUSEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
	$error=$edificio->comprobar_CAMPUSEDIFICIO();

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
	$array_test1['metodo'] = 'CAMPUSEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','','aa{{{a');
	$error=$edificio->comprobar_CAMPUSEDIFICIO();

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
	$array_test1['metodo'] = 'CAMPUSEDIFICIO';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$edificio = new EDIFICIO_Model('','','','Ourense');
	$error=$edificio->comprobar_CAMPUSEDIFICIO();

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

	$edificio = new EDIFICIO_Model('aa','aa','aa','AA');
	$error=$edificio->comprobar_atributos();

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

	$edificio = new EDIFICIO_Model('COD-1','ESEI','Otero Pedrayo s/n','Ourense');
	$error=$edificio->comprobar_atributos();

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

EDIFICIO_ATRIBUTOS_test();
?>
