
<?php

//Clase : TITULACION_Modelo
//Creado el : 08-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class TITULACION_Model {

// Variables que representan los atributos del profesor: código de la titulacion, código del centro,  nombre de la titulación y responsable de la titulación. 
	var $CODTITULACION;
	var $CODCENTRO;
	var $NOMBRETITULACION;
	var $RESPONSABLETITULACION;


//Constructor de la clase
function __construct($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION){
	$this->CODTITULACION= $CODTITULACION;
	$this->CODCENTRO = $CODCENTRO;
	$this->NOMBRETITULACION = $NOMBRETITULACION;
	$this->RESPONSABLETITULACION = $RESPONSABLETITULACION;
	$this->erroresdatos = array(); 

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function verificar_existencia(){ //Esta funcion busca el código del centro en la tabla CENTRO para comprobar que exista, si existe deja insertar el centro.
		$sql_verif= "SELECT * FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->CODCENTRO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

	}

function verificar_existencia_profesor_titulacion(){ //Esta funcion busca si hay algun profesor asignado a una titulación
		$sql_verif= "SELECT * FROM 
   				PROF_TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows>=1;

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
      //Comprueba si es menor a 3
	if(strlen($this->CODTITULACION)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODTITULACION",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor a 10
if(strlen($this->CODTITULACION)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODTITULACION',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si cumple la expresión regular
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
     //Comprueba si es menor a 3
	if(strlen($this->CODCENTRO)<3){
	 $mensajeError = array (
              "nombreatributo" => "CODCENTRO",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor a 10
if(strlen($this->CODCENTRO)>10){
	 $mensajeError = array (
              "nombreatributo" => 'CODCENTRO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si cumple la expresión regular
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



// Function comprobar_NOMBRETITULACION()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de NOMBRETITULACION es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_NOMBRETITULACION()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->NOMBRETITULACION == null) || (strlen($this->NOMBRETITULACION) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "NOMBRETITULACION",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Comprueba si es menor a 3
	if(strlen($this->NOMBRETITULACION)<3){
	 $mensajeError = array (
              "nombreatributo" => "NOMBRETITULACION",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor a 10
if(strlen($this->NOMBRETITULACION)>50){
	 $mensajeError = array (
              "nombreatributo" => 'NOMBRETITULACION',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si cumple la expresión regular
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->NOMBRETITULACION)){
		 $mensajeError = array (
              "nombreatributo" => 'NOMBRETITULACION',
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
// Function comprobar_RESPONSABLETITULACION()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de RESPONSABLETITULACION es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_RESPONSABLETITULACION()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->RESPONSABLETITULACION == null) || (strlen($this->RESPONSABLETITULACION) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "RESPONSABLETITULACION",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Comprueba si es menor a 3
	if(strlen($this->RESPONSABLETITULACION)<3){
	 $mensajeError = array (
              "nombreatributo" => "RESPONSABLETITULACION",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor a 10
if(strlen($this->RESPONSABLETITULACION)>60){
	 $mensajeError = array (
              "nombreatributo" => 'RESPONSABLETITULACION',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si cumple la expresión regular
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->RESPONSABLETITULACION)){
		 $mensajeError = array (
              "nombreatributo" => 'RESPONSABLETITULACION',
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
	$errores[]=$this->comprobar_CODTITULACION();
	$errores[]=$this->comprobar_CODCENTRO();
	$errores[]=$this->comprobar_NOMBRETITULACION();
	$errores[]=$this->comprobar_RESPONSABLETITULACION();
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
		$sql = "select * from TITULACION where CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
		}

		if ($result->num_rows == 1){  // Existe ya la titulación
				return 'Inserción fallida: el elemento ya existe';
			}

		if(!$this->verificar_existencia()){ // Compruebo si existe el CENTRO donde se va a insertar la TITULACION

			return "Inserción fallida: no existe ese código de centro";
		}

		$sql = "INSERT INTO TITULACION (
			CODTITULACION,
			CODCENTRO,
			NOMBRETITULACION,
			RESPONSABLETITULACION) 
				VALUES (
					'".$this->CODTITULACION."',
					'".$this->CODCENTRO."',
					'".$this->NOMBRETITULACION."',
					'".$this->RESPONSABLETITULACION."'
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
			FROM TITULACION
			WHERE (
				CODTITULACION LIKE '%".$this->CODTITULACION."%' AND
				CODCENTRO LIKE '%".$this->CODCENTRO."%' AND
				NOMBRETITULACION LIKE '%".$this->NOMBRETITULACION."%' AND
				RESPONSABLETITULACION LIKE '%".$this->RESPONSABLETITULACION."%'
			)
	";
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
	$ctrl=$this->comprobar_CODTITULACION();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_profesor_titulacion()){ // Compruebo si existe el Edificio donde se va a insertar el espacio

			return "Borrado fallido: existe un profesor asignado a esta titulacion";
		}

   $sql = "	DELETE FROM 
   				TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION'
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
	$ctrl=$this->comprobar_CODTITULACION();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM TITULACION
			WHERE (
				(CODTITULACION = '$this->CODTITULACION') 
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
	if(!$this->verificar_existencia()){ // Compruebo si existe el CENTRO donde se va a insertar la TITULACION

			return "Inserción fallida: no existe ese código de centro";
		}

	$sql = "UPDATE TITULACION
			SET 
				CODTITULACION = '$this->CODTITULACION',
				CODCENTRO = '$this->CODCENTRO',
				NOMBRETITULACION = '$this->NOMBRETITULACION',
				RESPONSABLETITULACION = '$this->RESPONSABLETITULACION'
			WHERE (
				CODTITULACION = '$this->CODTITULACION'
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