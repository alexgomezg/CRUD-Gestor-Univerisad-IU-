<?php

//Clase : PROF_ESPACIO_Modelo
//Creado el : 10-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class PROF_ESPACIO_Model {

// Variables que representan los atributos del profesor y del espacio: dni del profesor y código del espacio.
	var $DNI;
	var $CODESPACIO;


//Constructor de la clase
function __construct($DNI,$CODESPACIO){
	$this->DNI = $DNI;
	$this->CODESPACIO= $CODESPACIO;
	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function verificar_existencia_profesor(){ //Esta funcion busca el dni del profesior en la tabla profesor para comprobar que exista, si existe deja insertar en la tabla prof_espacio.

		$sql_verif= "SELECT * FROM 
   				PROFESOR
   			WHERE(
   				DNI = '$this->DNI'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}

function verificar_existencia_espacio(){ //Esta funcion busca el código del espacio en la tabla espacio para comprobar que exista, si existe deja insertar en la tabla prof_espacio.

		$sql_verif= "SELECT * FROM 
   				ESPACIO
   			WHERE(
   				CODESPACIO = '$this->CODESPACIO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}
// Function comprobar_DNI()
//Comprueba que el dato es mayor a 3 y menor a 9, si tiene el formato correcto y si es un DNI válido, si todo esta correcto devuelve true si no el array de errores
function comprobar_DNI()
{
	$errores = array();
	$correcto=TRUE;
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
// Function comprobar_CODESPACIO()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CODESPACIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_CODESPACIO(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->CODESPACIO == null) || (strlen($this->CODESPACIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "CODESPACIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->CODESPACIO)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODESPACIO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->CODESPACIO)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODESPACIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/",$this->CODESPACIO)){
		 $mensajeError = array (
              "nombreatributo" => 'CODESPACIO',
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
//comprobar_atributos comprueba todos los atributos de la entidad, si todos son correctos devuelve true si no el array de errores
function comprobar_atributos(){
	$errores=array();
	$errores[]=$this->comprobar_DNI();
	$errores[]=$this->comprobar_CODESPACIO();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;

}

//Metodo ADD
//Inserta en la tabla PROF_ESPACIO de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
		$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "select * from PROF_ESPACIO WHERE (
				CODESPACIO LIKE '%".$this->CODESPACIO."%' AND
				DNI LIKE '%".$this->DNI."%')";

		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // Existe ya la titulación
				return 'Inserción fallida: el elemento ya existe';
			}

		if(!$this->verificar_existencia_profesor()){ // Compruebo si existe el PROFESOR

			return "Inserción fallida: no existe ese profesor";
		}

		if(!$this->verificar_existencia_espacio()){ // Compruebo si existe la TITULACION

			return "Inserción fallida: no existe ese espacio";
		}

		$sql = "INSERT INTO PROF_ESPACIO (
			DNI,
			CODESPACIO) 
				VALUES (
					'".$this->DNI."',
					'".$this->CODESPACIO."'
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
			FROM PROF_ESPACIO
			WHERE (
				CODESPACIO LIKE '%".$this->CODESPACIO."%' AND
				DNI LIKE '%".$this->DNI."%'
			)";

	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
		}
	return $resultado;
    
}

//Función DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra.
function DELETE()
{
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_profesor()){ // Compruebo si existe el PROFESOR

			return "Borrado fallido: existe un profesor asignado a este espacio";
		}

   $sql = "	DELETE FROM 
   				PROF_ESPACIO
   			WHERE(
   				CODESPACIO = '$this->CODESPACIO' AND
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
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM PROF_ESPACIO
   			WHERE(
   				CODESPACIO = '$this->CODESPACIO' AND
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

		if(!$this->verificar_existencia_espacio()){ // Compruebo si existe la TITULACION

			return "Inserción fallida: no existe ese espacio";
		}
	
	$sql = "UPDATE PROF_ESPACIO
			SET 
				CODESPACIO = '$this->CODESPACIO',
				DNI = '$this->DNI'
			WHERE (
				CODESPACIO = '$this->CODESPACIO' AND
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