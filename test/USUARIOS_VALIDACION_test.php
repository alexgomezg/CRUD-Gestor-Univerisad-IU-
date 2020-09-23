<?php
// Autor : aggonzalez
// Fecha : 12/12/2019
// Descripción : 
//Fichero de test de validaciones de la entidad USUARIOS, saca por pantalla el resultado de los test.

function USUARIOS_ATRIBUTOS_test()
{
//Se accede a la variable global que almacena todos los test
	global $ERRORS2_array_test;
	$ENTIDAD='USUARIO'; //Variable que guarda la entidad que se esta testeando
  //Creo array de almacen de test individual
	$array_test1 = array();

	//Creo un modelo vacio
	$usuarios = new USUARIOS_Model('','','','','','','','','','');

//<<<<<<<<<<<<<<<<<<<<<<<LOGIN>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'login';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_login();

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
	$array_test1['metodo'] = 'login';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('aa','','','','','','','','','');
	$error=$usuarios->comprobar_login();

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
	$array_test1['metodo'] = 'login';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('aaaaaaaaaaaaaaaaaaa','','','','','','','','','');
	$error=$usuarios->comprobar_login();

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
	$array_test1['metodo'] = 'login';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('aaa{','','','','','','','','','');
	$error=$usuarios->comprobar_login();

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

	//Login correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'login';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('alex','','','','','','','','','');
	$error=$usuarios->comprobar_login();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<PASSWORD>>>>>>>>>>>>>>>>>>>>>>>>///////////

	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'password';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_password();

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
	$array_test1['metodo'] = 'password';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','aa','','','','','','','','');
	$error=$usuarios->comprobar_password();

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

	//Mayor de 128 
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'password';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','aapppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp','','','','','','','','');
	$error=$usuarios->comprobar_password();

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
	$array_test1['metodo'] = 'password';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','aa{{p','','','','','','','','');
	$error=$usuarios->comprobar_password();

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

	//Password correcto
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'password';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','aappp','','','','','','','','');
	$error=$usuarios->comprobar_password();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<DNI>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'DNI';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_DNI();

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

	$usuarios = new USUARIOS_Model('','','77','','','','','','','');
	$error=$usuarios->comprobar_DNI();

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

	$usuarios = new USUARIOS_Model('','','1234567899','','','','','','','');
	$error=$usuarios->comprobar_DNI();

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

	$usuarios = new USUARIOS_Model('','','7673aa65','','','','','','','');
	$error=$usuarios->comprobar_DNI();

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

	$usuarios = new USUARIOS_Model('','','76734153A','','','','','','','');
	$error=$usuarios->comprobar_DNI();

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

	$usuarios = new USUARIOS_Model('','','76734153N','','','','','','','');
	$error=$usuarios->comprobar_DNI();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<NOMBRE>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'nombre';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_nombre();

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
	$array_test1['metodo'] = 'nombre';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','aa','','','','','','');
	$error=$usuarios->comprobar_nombre();

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
	$array_test1['metodo'] = 'nombre';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE
	$usuarios = new USUARIOS_Model('','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','','','','');
	$error=$usuarios->comprobar_nombre();

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
	$array_test1['metodo'] = 'nombre';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','aa{{{','','','','','','');
	$error=$usuarios->comprobar_nombre();

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
	$array_test1['metodo'] = 'nombre';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','Alex','','','','','','');
	$error=$usuarios->comprobar_nombre();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<APELLIDOS>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'apellidos';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_apellidos();

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
	$array_test1['metodo'] = 'apellidos';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','aa','','','','','');
	$error=$usuarios->comprobar_apellidos();

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
	$array_test1['metodo'] = 'apellidos';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','','','');
	$error=$usuarios->comprobar_apellidos();

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
	$array_test1['metodo'] = 'apellidos';         //Método testeado
	$array_test1['error'] = 'Solo se permiten alfabéticos'; //Error testeado
	$array_test1['error_esperado'] = '00090'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','aaa{{','','','','','');
	$error=$usuarios->comprobar_apellidos();

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
	$array_test1['metodo'] = 'apellidos';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','Gómez González','','','','','');
	$error=$usuarios->comprobar_apellidos();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<Telefono>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_telefono();

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
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','60','','','','');
	$error=$usuarios->comprobar_telefono();

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

	//Mayor de 11
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','603774242451','','','','');
	$error=$usuarios->comprobar_telefono();

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


	//No cumple el formato de telefono
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Teléfono no válido'; //Error testeado
	$array_test1['error_esperado'] = '00006'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','33602704249','','','','');
	$error=$usuarios->comprobar_telefono();

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

	//Solo se permiten numeros
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Solo se permiten números'; //Error testeado
	$array_test1['error_esperado'] = '00070'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','603771415k','','','','');
	$error=$usuarios->comprobar_telefono();

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
	$array_test1['metodo'] = 'telefono';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','988475932','','','','');
	$error=$usuarios->comprobar_telefono();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<EMAIL>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'email';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_email();

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
	$array_test1['metodo'] = 'email';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','aa','','','');
	$error=$usuarios->comprobar_email();

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
	$array_test1['metodo'] = 'email';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','','','');
	$error=$usuarios->comprobar_email();

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
	$array_test1['metodo'] = 'email';         //Método testeado
	$array_test1['error'] = 'Formato email erroneo'; //Error testeado
	$array_test1['error_esperado'] = '00120'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','aa#gmail.com','','','');
	$error=$usuarios->comprobar_email();

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
	$array_test1['metodo'] = 'email';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','cas@gmail.com','','','');
	$error=$usuarios->comprobar_email();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<FECHA NACIMIENTO>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'fecha nacimiento';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_FechaNacimiento();

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
	$array_test1['metodo'] = 'fecha nacimiento';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','aa','','');
	$error=$usuarios->comprobar_FechaNacimiento();

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
	$array_test1['metodo'] = 'fecha nacimiento';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','2020-2121-2020','','');
	$error=$usuarios->comprobar_FechaNacimiento();

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
	$array_test1['metodo'] = 'fecha nacimiento';         //Método testeado
	$array_test1['error'] = 'Formato fecha erróneo'; //Error testeado
	$array_test1['error_esperado'] = '00020'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','2019/20/21','','');
	$error=$usuarios->comprobar_FechaNacimiento();

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
	$array_test1['metodo'] = 'fecha nacimiento';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	 $usuarios = new USUARIOS_Model('','','','','','','','2019-12-21','','');
	 $error=$usuarios->comprobar_FechaNacimiento();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<FOTO PERSONAL>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Vacio
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'foto personal';         //Método testeado
	$array_test1['error'] = 'Atributo Vacio'; //Error testeado
	$array_test1['error_esperado'] = '00001'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

    $error=$usuarios->comprobar_fotopersonal();

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
	$array_test1['metodo'] = 'foto personal';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado corto'; //Error testeado
	$array_test1['error_esperado'] = '00003'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','aa','');
	 $error=$usuarios->comprobar_fotopersonal();

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
	$array_test1['metodo'] = 'foto personal';         //Método testeado
	$array_test1['error'] = 'Atributo demasiado largo'; //Error testeado
	$array_test1['error_esperado'] = '00002'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','');
	 $error=$usuarios->comprobar_fotopersonal();
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
	$array_test1['metodo'] = 'foto personal';         //Método testeado
	$array_test1['error'] = 'Nombre del archivo no válido'; //Error testeado
	$array_test1['error_esperado'] = '000130'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','foto??.png','');
	 $error=$usuarios->comprobar_fotopersonal();

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
	$array_test1['metodo'] = 'foto personal';         //Método testeado
	$array_test1['error'] = 'Correcto'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','imagen.png','');
	 $error=$usuarios->comprobar_fotopersonal();

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
//<<<<<<<<<<<<<<<<<<<<<<<<<SEXO>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
	//Permitido hombre
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'sexo';         //Método testeado
	$array_test1['error'] = 'Permitido HOMBRE'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','','HOMBRE');
    $error=$usuarios->comprobar_sexo();

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

	//Permitido mujer
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'sexo';         //Método testeado
	$array_test1['error'] = 'Permitido MUJER'; //Error testeado
	$array_test1['error_esperado'] = 'TRUE'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','','MUJER');
    $error=$usuarios->comprobar_sexo();

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

	//Solo permitido hombre y mujer
	$array_test1['entidad'] = $ENTIDAD;	 //Entidad testeada
	$array_test1['metodo'] = 'sexo';         //Método testeado
	$array_test1['error'] = "Solo se permiten los valores 'hombre','mujer'"; //Error testeado
	$array_test1['error_esperado'] = '00100'; //Error esperado
	$array_test1['error_obtenido'] = ''; //Error obtenido
	$array_test1['resultado'] = '';  //Resultado OK o FALSE

	$usuarios = new USUARIOS_Model('','','','','','','','','','esto');
    $error=$usuarios->comprobar_sexo();

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

	$usuarios = new USUARIOS_Model('ll','ll','ll','ll','ll','ll','ll','','','');
    $error=$usuarios->comprobar_atributos();

    $numErrores=0; //Número de errores que he encontrado en el array de errores
    $numAtributos=10; //Número de atributos de la entidad
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

	$usuarios = new USUARIOS_Model('login','pass','76734153N','Alex','Gómez González','600774488','emai@gmail.com','1997-07-02','imagen.jpg','HOMBRE');
    $error=$usuarios->comprobar_atributos();
    

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

	//Invoco a los métodos para hacer los test
	USUARIOS_ATRIBUTOS_test();
?>