
<?php

//Clase : EDIFICIO_Modelo
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class EDIFICIO_Model {

// Variables que representan los atributos del profesor: código del edificio, nombre del edificio, dirección del edificio y campus del edificio. 
	var $CODEDIFICIO;
	var $NOMBREEDIFICIO;
	var $DIRECCIONEDIFICIO;
	var $CAMPUSEDIFICIO;


//Constructor de la clase
function __construct($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO){
	$this->CODEDIFICIO= $CODEDIFICIO;
	$this->NOMBREEDIFICIO = $NOMBREEDIFICIO;
	$this->DIRECCIONEDIFICIO = $DIRECCIONEDIFICIO;
	$this->CAMPUSEDIFICIO = $CAMPUSEDIFICIO;
	$this->erroresdatos = array(); 

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}


function verificar_existencia_centro(){ //Esta funcion busca si existe algun centro asignado a este edificio
		$sql_verif= "SELECT * FROM 
   				CENTRO
   			WHERE(
   				CODEDIFICIO = '$this->CODEDIFICIO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows>=1;

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

// Function comprobar_NOMBREEDIFICIO()
//Comprueba que el dato es mayor a 3,menor a 50 y si el formato de NOMBREEDIFICIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_NOMBREEDIFICIO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->NOMBREEDIFICIO == null) || (strlen($this->NOMBREEDIFICIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "NOMBREEDIFICIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->NOMBREEDIFICIO)<3){
	 $mensajeError = array (
              "nombreatributo" => "NOMBREEDIFICIO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->NOMBREEDIFICIO)>50){
	 $mensajeError = array (
              "nombreatributo" => 'NOMBREEDIFICIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->NOMBREEDIFICIO)){
		 $mensajeError = array (
              "nombreatributo" => 'NOMBREEDIFICIO',
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
// Function comprobar_DIRECCIONEDIFICIO()
//Comprueba que el dato es mayor a 3,menor a 150 y si el formato de DIRECCIONEDIFICIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_DIRECCIONEDIFICIO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->DIRECCIONEDIFICIO == null) || (strlen($this->DIRECCIONEDIFICIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "DIRECCIONEDIFICIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->DIRECCIONEDIFICIO)<3){
	 $mensajeError = array (
              "nombreatributo" => "DIRECCIONEDIFICIO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->DIRECCIONEDIFICIO)>150){
	 $mensajeError = array (
              "nombreatributo" => 'DIRECCIONEDIFICIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº\/-]+$/",$this->DIRECCIONEDIFICIO)){
		 $mensajeError = array (
              "nombreatributo" => 'DIRECCIONEDIFICIO',
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
// Function comprobar_CAMPUSEDIFICIO()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de CAMPUSEDIFICIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_CAMPUSEDIFICIO()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->CAMPUSEDIFICIO == null) || (strlen($this->CAMPUSEDIFICIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "CAMPUSEDIFICIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->CAMPUSEDIFICIO)<3){
	 $mensajeError = array (
              "nombreatributo" => "CAMPUSEDIFICIO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->CAMPUSEDIFICIO)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CAMPUSEDIFICIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->CAMPUSEDIFICIO)){
		 $mensajeError = array (
              "nombreatributo" => 'CAMPUSEDIFICIO',
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
	$errores[]=$this->comprobar_CODEDIFICIO();
	$errores[]=$this->comprobar_NOMBREEDIFICIO();
	$errores[]=$this->comprobar_DIRECCIONEDIFICIO();
	$errores[]=$this->comprobar_CAMPUSEDIFICIO();
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
		$sql = "select * from EDIFICIO where CODEDIFICIO = '".$this->CODEDIFICIO."'";

		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // Existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
		$sql = "INSERT INTO EDIFICIO (
			CODEDIFICIO,
			NOMBREEDIFICIO,
			DIRECCIONEDIFICIO,
			CAMPUSEDIFICIO) 
				VALUES (
					'".$this->CODEDIFICIO."',
					'".$this->NOMBREEDIFICIO."',
					'".$this->DIRECCIONEDIFICIO."',
					'".$this->CAMPUSEDIFICIO."'
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
			FROM EDIFICIO
			WHERE (
				CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%' AND
				NOMBREEDIFICIO LIKE '%".$this->NOMBREEDIFICIO."%' AND
				DIRECCIONEDIFICIO LIKE '%".$this->DIRECCIONEDIFICIO."%' AND
				CAMPUSEDIFICIO LIKE '%".$this->CAMPUSEDIFICIO."%'
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

	$ctrl=$this->comprobar_CODEDIFICIO();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_centro()){ // Compruebo si el edificio tiene centros asignados

			return "Borrado fallido: existen centros asignados a ese edificio";
		}


   $sql = "	DELETE FROM 
   				EDIFICIO
   			WHERE(
   				CODEDIFICIO = '$this->CODEDIFICIO'
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
	$ctrl=$this->comprobar_CODEDIFICIO();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM EDIFICIO
			WHERE (
				(CODEDIFICIO = '$this->CODEDIFICIO') 
			)";

	if (!$resultado = $this->mysqli->query($sql))
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
	$sql = "UPDATE EDIFICIO
			SET 
				CODEDIFICIO = '$this->CODEDIFICIO',
				NOMBREEDIFICIO = '$this->NOMBREEDIFICIO',
				DIRECCIONEDIFICIO = '$this->DIRECCIONEDIFICIO',
				CAMPUSEDIFICIO = '$this->CAMPUSEDIFICIO'
			WHERE (
				CODEDIFICIO = '$this->CODEDIFICIO'
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