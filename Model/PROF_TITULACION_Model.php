<?php

//Clase : PROF_TITULACION_Modelo
//Creado el : 10-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class PROF_TITULACION_Model {

// Variables que representan los atributos del profesor y la titulación: dni del profesor, código de la titulación y año de la titulación. 
	var $DNI;
	var $CODTITULACION;
	var $ANHOACADEMICO;


//Constructor de la clase
function __construct($DNI,$CODTITULACION,$ANHOACADEMICO){
	$this->DNI = $DNI;
	$this->CODTITULACION= $CODTITULACION;
	$this->ANHOACADEMICO = $ANHOACADEMICO;
	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function verificar_existencia_profesor(){ //Esta funcion busca el dni del profesior en la tabla profesor para comprobar que exista, si existe deja insertar en la tabla prof_titulacion.

		$sql_verif= "SELECT * FROM 
   				PROFESOR
   			WHERE(
   				DNI = '$this->DNI'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}

function verificar_existencia_titulacion(){ //Esta funcion busca el código de la titulacion en la tabla titulacion para comprobar que exista, si existe deja insertar en la tabla prof_titulacion.

		$sql_verif= "SELECT * FROM 
   				TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}
// Function comprobar_DNI()
//Comprueba que el dato es mayor a 3 y menor a 9, si tiene el formato correcto y si es un DNI válido, si todo esta correcto devuelve true si no el array de errores
function comprobar_DNI()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->DNI == null) || (strlen($this->DNI) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "DNI",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->DNI)<3){
	 $mensajeError = array (
              "nombreatributo" => "DNI",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->DNI)>9){
	 $mensajeError = array (
              "nombreatributo" => 'DNI',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
      $validChars = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Conjunto de letras para calcular la letra del DNI
      $nifRexp = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"; //Expresion regular NIF
      $str = strtoupper($this->DNI);//Valor extraido del input
      //Compruebo si se cumplen los faormatos de NIE y NIF
      if (!preg_match($nifRexp,$this->DNI)){
        $mensajeError = array (
              "nombreatributo" => "DNI",
              "codigoincidencia" => "00010",
              "mensajeerror" => "Formato dni erróneo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;        
      } 
      else{
        $letter = $str{8};
        $charIndex = ((int)(substr($str,0,8))) % 23;
        //Compruebo si hay coherencia entre números y letra
        if ($validChars{$charIndex}=== $letter){
          $correcto = TRUE;
        }
        else{
          $mensajeError = array (
              "nombreatributo" => "DNI",
              "codigoincidencia" => "00011",
              "mensajeerror" => "Dni no válido"
                );
           $errores[]=$mensajeError;
          $correcto =  FALSE;

        }
      }
      //Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}
// Function comprobar_CODTITULACION()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CODTITULACION es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_CODTITULACION(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->CODTITULACION == null) || (strlen($this->CODTITULACION) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "CODTITULACION",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->CODTITULACION)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODTITULACION",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->CODTITULACION)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODTITULACION',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]+$/",$this->CODTITULACION)){
		 $mensajeError = array (
              "nombreatributo" => 'CODTITULACION',
              "codigoincidencia" => "00060",
              "mensajeerror" => "Solo se permiten alfabéticos y números"
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
// Function comprobar_CODESPACIO()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CODESPACIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_ANHOACADEMICO(){

	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->ANHOACADEMICO == null) || (strlen($this->ANHOACADEMICO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "ANHOACADEMICO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->ANHOACADEMICO)<3){
	 $mensajeError = array (
              "nombreatributo" => "ANHOACADEMICO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->ANHOACADEMICO)>9){
	 $mensajeError = array (
              "nombreatributo" => 'ANHOACADEMICO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/([12]\d{3}-[12]\d{3})/",$this->ANHOACADEMICO)){
		 $mensajeError = array (
              "nombreatributo" => 'ANHOACADEMICO',
              "codigoincidencia" => "00110",
              "mensajeerror" => "Solo se permiten dddd-dddd"
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

function comprobar_atributos(){
	$errores=array();
	$errores[]=$this->comprobar_DNI();
	$errores[]=$this->comprobar_CODTITULACION();
	$errores[]=$this->comprobar_ANHOACADEMICO();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;
}

function comprobar_atributos_clave(){
	$errores=array();
	$errores[]=$this->comprobar_DNI();
	$errores[]=$this->comprobar_CODTITULACION();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;
}
//Metodo ADD
//Inserta en la tabla EDIFICIO de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "select * from PROF_TITULACION WHERE (
				CODTITULACION LIKE '%".$this->CODTITULACION."%' AND
				DNI LIKE '%".$this->DNI."%')";

		if (!$result = $this->mysqli->query($sql)) 
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // Existe ya la titulación
				return 'Inserción fallida: el elemento ya existe';
			}

		if(!$this->verificar_existencia_profesor()){ // Compruebo si existe el PROFESOR

			return "Inserción fallida: no existe ese profesor";
		}

		if(!$this->verificar_existencia_titulacion()){ // Compruebo si existe la TITULACION

			return "Inserción fallida: no existe esa titulación";
		}

		$sql = "INSERT INTO PROF_TITULACION (
			DNI,
			CODTITULACION,
			ANHOACADEMICO) 
				VALUES (
					'".$this->DNI."',
					'".$this->CODTITULACION."',
					'".$this->ANHOACADEMICO."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
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
			FROM PROF_TITULACION
			WHERE (
				CODTITULACION LIKE '%".$this->CODTITULACION."%' AND
				DNI LIKE '%".$this->DNI."%' AND
				ANHOACADEMICO LIKE '%".$this->ANHOACADEMICO."%'
			)";

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
	$ctrl=$this->comprobar_atributos_clave();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_profesor()){ // Compruebo si existe el PROFESOR

			return "Borrado fallido: existe un profesor asignado a esta titulacion";
		}

   $sql = "	DELETE FROM 
   				PROF_TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION' AND
   				DNI = '$this->DNI'
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
	$ctrl=$this->comprobar_atributos_clave();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM PROF_TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION' AND
   				DNI = '$this->DNI'
   			)";
	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
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
	if(!$this->verificar_existencia_profesor()){ // Compruebo si existe el PROFESOR

			return "Inserción fallida: no existe ese profesor";
		}

		if(!$this->verificar_existencia_titulacion()){ // Compruebo si existe la TITULACION

			return "Inserción fallida: no existe esa titulación";
		}
		
	$sql = "UPDATE PROF_TITULACION
			SET 
				CODTITULACION = '$this->CODTITULACION',
				DNI = '$this->DNI',
				ANHOACADEMICO = '$this->ANHOACADEMICO'
			WHERE (
				CODTITULACION = '$this->CODTITULACION' AND
				DNI = '$this->DNI'
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