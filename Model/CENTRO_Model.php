
<?php

//Clase : CENTRO_Modelo
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class CENTRO_Model {

// Variables que representan los atributos del profesor: código del centro, código del edificio, nombre del centro, dirección del centro y responsable del centro.
	var $CODCENTRO; 
	var $CODEDIFICIO;
	var $NOMBRECENTRO;
	var $DIRECCIONCENTRO;
	var $RESPONSABLECENTRO;

//Constructor de la clase

function __construct($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO){
	$this->CODCENTRO = $CODCENTRO;
	$this->CODEDIFICIO= $CODEDIFICIO;
	$this->NOMBRECENTRO = $NOMBRECENTRO;
	$this->DIRECCIONCENTRO = $DIRECCIONCENTRO;
	$this->RESPONSABLECENTRO = $RESPONSABLECENTRO;
	$this->erroresdatos = array(); 
	
	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function verificar_existencia_edificio(){ //Esta funcion busca el código del edificio en la tabla EDIFICIO para comprobar que exista, si existe deja insertar el centro.
		$sql_verif= "SELECT * FROM 
   				EDIFICIO
   			WHERE(
   				CODEDIFICIO = '$this->CODEDIFICIO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}

function verificar_existencia_titulacion(){ //Esta funcion busca si existe alguna titulación asignada a este CENTRO
		$sql_verif= "SELECT * FROM 
   				TITULACION
   			WHERE(
   				CODCENTRO = '$this->CODCENTRO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows>=1;

	}
// Function comprobar_CODCENTRO()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CODCENTRO es correcto, si todo esta correcto devuelve true si no el array de errores
	function comprobar_CODCENTRO(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->CODCENTRO == null) || (strlen($this->CODCENTRO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "CODCENTRO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->CODCENTRO)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODCENTRO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->CODCENTRO)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODCENTRO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/",$this->CODCENTRO)){
		 $mensajeError = array (
              "nombreatributo" => 'CODCENTRO',
              "codigoincidencia" => "00040",
              "mensajeerror" => "Solo están permitidas alfabéticos, números y el “-”"
                );
		$errores[]=$mensajeError;
		return $errores;
	}
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
// Function comprobar_CODEDIFICIO()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CODEDIFICIO es correcto, si todo esta correcto devuelve true si no el array de errores
	function comprobar_CODEDIFICIO(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->CODEDIFICIO == null) || (strlen($this->CODEDIFICIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "CODEDIFICIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->CODEDIFICIO)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODEDIFICIO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->CODEDIFICIO)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODEDIFICIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/",$this->CODEDIFICIO)){
		 $mensajeError = array (
              "nombreatributo" => 'CODEDIFICIO',
              "codigoincidencia" => "00040",
              "mensajeerror" => "Solo están permitidas alfabéticos, números y el “-”"
                );
		$errores[]=$mensajeError;
		return $errores;
	}
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
// Function comprobar_NOMBRECENTRO()
//Comprueba que el dato es mayor a 3,menor a 50 y si el formato de NOMBRECENTRO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_NOMBRECENTRO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->NOMBRECENTRO == null) || (strlen($this->NOMBRECENTRO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "NOMBRECENTRO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->NOMBRECENTRO)<3){
	 $mensajeError = array (
              "nombreatributo" => "NOMBRECENTRO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->NOMBRECENTRO)>50){
	 $mensajeError = array (
              "nombreatributo" => 'NOMBRECENTRO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->NOMBRECENTRO)){
		 $mensajeError = array (
              "nombreatributo" => 'NOMBRECENTRO',
              "codigoincidencia" => "00090",
              "mensajeerror" => "Solo se permiten alfabéticos"
                );
		$errores[]=$mensajeError;
		return $errores;
	}
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
// Function comprobar_DIRECCIONCENTRO()
//Comprueba que el dato es mayor a 3,menor a 150 y si el formato de DIRECCIONCENTRO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_DIRECCIONCENTRO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->DIRECCIONCENTRO == null) || (strlen($this->DIRECCIONCENTRO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "DIRECCIONCENTRO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->DIRECCIONCENTRO)<3){
	 $mensajeError = array (
              "nombreatributo" => "DIRECCIONCENTRO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->DIRECCIONCENTRO)>150){
	 $mensajeError = array (
              "nombreatributo" => 'DIRECCIONCENTRO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº\/-]+$/",$this->DIRECCIONCENTRO)){
		 $mensajeError = array (
              "nombreatributo" => 'DIRECCIONCENTRO',
              "codigoincidencia" => "00050",
              "mensajeerror" => "Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”"
                );
		$errores[]=$mensajeError;
		return $errores;
	}
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
// Function comprobar_RESPONSABLECENTRO()
//Comprueba que el dato es mayor a 3,menor a 60 y si el formato de RESPONSABLECENTRO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_RESPONSABLECENTRO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->RESPONSABLECENTRO == null) || (strlen($this->RESPONSABLECENTRO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "RESPONSABLECENTRO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->RESPONSABLECENTRO)<3){
	 $mensajeError = array (
              "nombreatributo" => "RESPONSABLECENTRO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->RESPONSABLECENTRO)>60){
	 $mensajeError = array (
              "nombreatributo" => 'RESPONSABLECENTRO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->RESPONSABLECENTRO)){
		 $mensajeError = array (
              "nombreatributo" => 'RESPONSABLECENTRO',
              "codigoincidencia" => "00090",
              "mensajeerror" => "Solo se permiten alfabéticos"
                );
		$errores[]=$mensajeError;
		return $errores;
	}
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
//comprobar_atributos comprueba todos los atributos de la entidad, si todos son correctos devuelve true si no el array de errores
function comprobar_atributos(){
	$errores=array();
	$errores[]=$this->comprobar_CODCENTRO();
	$errores[]=$this->comprobar_CODEDIFICIO();
	$errores[]=$this->comprobar_NOMBRECENTRO();
	$errores[]=$this->comprobar_DIRECCIONCENTRO();
	$errores[]=$this->comprobar_RESPONSABLECENTRO();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;

}

//Metodo ADD
//Inserta en la tabla CENTRO de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "select * from CENTRO where CODCENTRO = '".$this->CODCENTRO."'";

		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // Compruebo si existe el CODCENTRO, si existe no se puede insertar de nuevo
				return 'Inserción fallida: el elemento ya existe';
			}

		if(!$this->verificar_existencia_edificio()){ // Compruebo si existe el EDIFICIO donde se va a insertar el CENTRO

			return "Inserción fallida: no existe ese código de edificio";
		}


		
		$sql = "INSERT INTO CENTRO (
			CODCENTRO,
			CODEDIFICIO,
			NOMBRECENTRO,
			DIRECCIONCENTRO,
			RESPONSABLECENTRO) 
				VALUES (
					'".$this->CODCENTRO."',
					'".$this->CODEDIFICIO."',
					'".$this->NOMBRECENTRO."',
					'".$this->DIRECCIONCENTRO."',
					'".$this->RESPONSABLECENTRO."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}
	}else{
		return $ctrl;
	}

}
    

//Función de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//Función SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos los datos de la tabla
function SEARCH()
{

	$sql = "SELECT *
			FROM CENTRO
			WHERE (
				CODCENTRO LIKE '%".$this->CODCENTRO."%' AND
				CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%' AND
				NOMBRECENTRO LIKE '%".$this->NOMBRECENTRO."%' AND
				DIRECCIONCENTRO LIKE '%".$this->DIRECCIONCENTRO."%' AND
				RESPONSABLECENTRO LIKE '%".$this->RESPONSABLECENTRO."%'
			)
	";
	if (!$resultado = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}

//Función DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra.
function DELETE()
{
	$ctrl=$this->comprobar_CODCENTRO();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_titulacion()){ // Compruebo si el centro tiene titulaciones asignadas

			return "Borrado fallido: existen titulaciones asignadas a ese centro";
		}

   $sql = "	DELETE FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->CODCENTRO'
   			)
   			";

   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else
	{
		$resultado = 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
	}
	return $resultado;
}else{
	return $ctrl;
}
}

// Función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$ctrl=$this->comprobar_CODCENTRO();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM CENTRO
			WHERE (
				(CODCENTRO = '$this->CODCENTRO') 
			)";

	if (!$resultado = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
	{
			return 'Error de gestor de base de datos';
	}else
	{
		$tupla = $resultado->fetch_array();
	}
	return $tupla;
}else{
	return $ctrl;
}
}

//Función Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

		$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		if(!$this->verificar_existencia_edificio()){ // Compruebo si existe el EDIFICIO donde se va a insertar el CENTRO

			return "Inserción fallida: no existe ese código de edificio";
		}

	$sql = "UPDATE CENTRO
			SET 
				CODCENTRO = '$this->CODCENTRO',
				CODEDIFICIO = '$this->CODEDIFICIO',
				NOMBRECENTRO = '$this->NOMBRECENTRO',
				DIRECCIONCENTRO = '$this->DIRECCIONCENTRO',
				RESPONSABLECENTRO = '$this->RESPONSABLECENTRO'
			WHERE (
				CODCENTRO = '$this->CODCENTRO'
			)
			";
	if ($this->mysqli->query($sql))
	{
		$resultado = 'Actualización realizada con éxito';
	}
	else
	{
		$resultado = 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
	}
	return $resultado;
}else{
	return $ctrl;
}
}

}//Fin de clase

?> 