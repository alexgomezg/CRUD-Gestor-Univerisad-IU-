<?php
//include '../Functions/validaciones.php';
include '../Model/USUARIOS_Model.php';
include '../Model/PROFESOR_Model.php';
include '../Model/CENTRO_Model.php';
include '../Model/EDIFICIO_Model.php';
include '../Model/ESPACIO_Model.php';
include '../Model/TITULACION_Model.php';
include '../Model/PROF_TITULACION_Model.php';
include '../Model/PROF_ESPACIO_Model.php';
include '../View/MESSAGE_View.php';

	echo ("<br><br><br>");
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$dni='16947922G';
	$apellidos = 'miapellido';
	$email = 'miemail@uvigo.es';
	$telefono='603774249';
	$FechaNacimiento='2019-11-12';
	$fotopersonal="foto.png";
	$sexo="1";
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
	$eo=$usuarios->comprobar_atributos();
	var_dump($eo);
	//$usuarios->ADD();

	//$centro=new Espacio_Model('','aad888´´','`´àda','1','Calle Otero Pedrayo Nº 7{{{{','0');
	///$dni,$nombre,$apellidos,$area,$departamento
	//$CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO
	//$login,$password,$dni,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo
	/*$usuarios = new USUARIOS_Model('76734153N','pass','76734153N','nom','apel','603774249','cas@gmail.com','2019-11-12','una.jpg','1');*/
	
	/*$errores[]=$usuarios->comprobar_dni();
	$errores[]=$usuarios->comprobar_NOMBREPROFESOR();
	$errores[]=$usuarios->comprobar_APELLIDOSPROFESOR();
	$errores[]=$usuarios->comprobar_AREAPROFESOR();
	$errores[]=$usuarios->comprobar_DEPARTAMENTOPROFESOR();*/
	//new MESSAGE($usuarios->comprobar_login(), '../Controller/USUARIOS_Controller.php');













	/*a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº-]+$/","Calle La Bella Otero Co nº 4 4b")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}
	if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº-]+$/","Calle La Bella Otero nº 4 4b{{{{´{{")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}

	if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/","Calle La Bella Otero nº 4 4b{{{{´{{")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}

	if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/","COD-36")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}


	if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]+$/","Calle La Bella Otero nº 4 4b{{{{´{{")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}

	if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]+$/","COD36")){
		echo "Correcto";
	}else{
		echo "incorrecto";
	}*/
	
?>