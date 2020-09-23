
<?php

//Clase : ESPACIO_Modelo
//Creado el : 08-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class ESPACIO_Model {

// Variables que representan los atributos del profesor: código del espacio, código del edificio, código del centro, tipo de espacio, superficio que tiene el espacio y el número de inventario de dicho espacio. 
	var $CODESPACIO;
	var $CODEDIFICIO;
	var $CODCENTRO;
	var $TIPO;
	var $SUPERFICIEESPACIO;
	var $NUMINVENTARIOESPACIO;


//Constructor de la clase
function __construct($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO){
	$this->CODESPACIO= $CODESPACIO;
	$this->CODEDIFICIO= $CODEDIFICIO;
	$this->CODCENTRO= $CODCENTRO;
	$this->TIPO = $TIPO;
	$this->SUPERFICIEESPACIO = $SUPERFICIEESPACIO;
	$this->NUMINVENTARIOESPACIO = $NUMINVENTARIOESPACIO;
	$this->erroresdatos = array(); 

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function verificar_existencia_centro(){ //Esta funcion busca el código del centro en la tabla CENTRO para comprobar que exista, si existe deja insertar el centro.
		$sql_verif= "SELECT * FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->CODCENTRO'
   			)
   			";

   	return $this->mysqli->query($sql_verif)->num_rows==1;

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

function verificar_existencia_profesor_espacio(){ //Esta funcion busca si hay algun profesor asignado a un espacio
		$sql_verif= "SELECT * FROM 
   				PROF_ESPACIO
   			WHERE(
   				CODESPACIO = '$this->CODESPACIO'
   			)
   			";

return $this->mysqli->query($sql_verif)->num_rows>=1;

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
// Function comprobar_CODECENTRO()
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

function comprobar_TIPO(){
	$errores = array();
	$correcto=true;
	if(($this->TIPO=="1")||($this->TIPO=="2")||($this->TIPO=="3")||($this->TIPO=="DESPACHO")||($this->TIPO=="LABORATORIO")||($this->TIPO=="PAS")){
	}else{
		$mensajeError = array (
              "nombreatributo" => 'TIPO',
              "codigoincidencia" => "00080",
              "mensajeerror" => "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS'"
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
// Function comprobar_SUPERFICIEESPACIO()
//Comprueba que el dato es mayor a 3,menor a 9999 y si el formato de SUPERFICIEESPACIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_SUPERFICIEESPACIO(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->SUPERFICIEESPACIO == null) || (strlen($this->SUPERFICIEESPACIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "SUPERFICIEESPACIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if((int)$this->SUPERFICIEESPACIO<0){
	 $mensajeError = array (
              "nombreatributo" => "SUPERFICIEESPACIO",
              "codigoincidencia" => "00004",
              "mensajeerror" => "Valor de atributo numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if((int)$this->SUPERFICIEESPACIO>9999){
	 $mensajeError = array (
              "nombreatributo" => 'SUPERFICIEESPACIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[\d]+$/",$this->SUPERFICIEESPACIO)){
		 $mensajeError = array (
              "nombreatributo" => 'SUPERFICIEESPACIO',
              "codigoincidencia" => "00070",
              "mensajeerror" => "Solo se permiten números"
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
// Function comprobar_NUMINVENTARIOESPACIO()
//Comprueba que el dato es mayor a 3,menor a 99999999 y si el formato de NUMINVENTARIOESPACIO es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_NUMINVENTARIOESPACIO(){
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->NUMINVENTARIOESPACIO == null) || (strlen($this->NUMINVENTARIOESPACIO) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "NUMINVENTARIOESPACIO",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if((int)$this->NUMINVENTARIOESPACIO<=0){
	 $mensajeError = array (
              "nombreatributo" => "NUMINVENTARIOESPACIO",
              "codigoincidencia" => "00004",
              "mensajeerror" => "Valor de atributo numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if((int)$this->NUMINVENTARIOESPACIO>=99999999){
	 $mensajeError = array (
              "nombreatributo" => 'NUMINVENTARIOESPACIO',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[\d]+$/",$this->NUMINVENTARIOESPACIO)){
		 $mensajeError = array (
              "nombreatributo" => 'NUMINVENTARIOESPACIO',
              "codigoincidencia" => "00070",
              "mensajeerror" => "Solo se permiten números"
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
	$errores[]=$this->comprobar_CODESPACIO();
	$errores[]=$this->comprobar_CODCENTRO();
	$errores[]=$this->comprobar_CODEDIFICIO();
	$errores[]=$this->comprobar_TIPO();
	$errores[]=$this->comprobar_SUPERFICIEESPACIO();
	$errores[]=$this->comprobar_NUMINVENTARIOESPACIO();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;

}


//Metodo ADD
//Inserta en la tabla ESPACIO de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "select * from ESPACIO where CODESPACIO = '".$this->CODESPACIO."'";

		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}

		if(!$this->verificar_existencia_edificio()){ // Compruebo si existe el Edificio donde se va a insertar el espacio

			return "Inserción fallida: no existe ese código de edificio";
		}

		if(!$this->verificar_existencia_centro()){ // Compruebo si existe el centro donde se va a insertar el espacio

			return "Inserción fallida: no existe ese código de centro";
		}

		$sql = "INSERT INTO ESPACIO (
			CODESPACIO,
			CODEDIFICIO,
			CODCENTRO,
			TIPO,
			SUPERFICIEESPACIO,
			NUMINVENTARIOESPACIO) 
				VALUES (
					'".$this->CODESPACIO."',
					'".$this->CODEDIFICIO."',
					'".$this->CODCENTRO."',
					'".$this->TIPO."',
					'".$this->SUPERFICIEESPACIO."',
					'".$this->NUMINVENTARIOESPACIO."'
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


///Función SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos los datos de la tabla
function SEARCH()
{

	$sql = "SELECT *
			FROM ESPACIO
			WHERE (
				CODESPACIO LIKE '%".$this->CODESPACIO."%' AND
				CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%' AND
				CODCENTRO LIKE '%".$this->CODCENTRO."%' AND
				TIPO LIKE '%".$this->TIPO."%' AND
				SUPERFICIEESPACIO LIKE '%".$this->SUPERFICIEESPACIO."%' AND
				NUMINVENTARIOESPACIO LIKE '%".$this->NUMINVENTARIOESPACIO."%'
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
	$ctrl=$this->comprobar_CODESPACIO();
	if(!is_array($ctrl)){
	if($this->verificar_existencia_profesor_espacio()){ // Compruebo si hay algun PROFESOR asignado a este espacio, si lo hay no deja borrar

			return "Borrado fallido: existe un profesor asignado a este espacio";
		}

   $sql = "	DELETE FROM 
   				ESPACIO
   			WHERE(
   				CODESPACIO = '$this->CODESPACIO'
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
	$ctrl=$this->comprobar_CODESPACIO();
	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM ESPACIO
			WHERE (
				(CODESPACIO = '$this->CODESPACIO') 
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
	if(!$this->verificar_existencia_edificio()){ // Compruebo si existe el Edificio donde se va a insertar el espacio

			return "Inserción fallida: no existe ese código de edificio";
		}

		if(!$this->verificar_existencia_centro()){ // Compruebo si existe el centro donde se va a insertar el espacio

			return "Inserción fallida: no existe ese código de centro";
		}
	
	$sql = "UPDATE ESPACIO
			SET 
				CODESPACIO = '$this->CODESPACIO',
				CODEDIFICIO = '$this->CODEDIFICIO',
				CODCENTRO = '$this->CODCENTRO',
				TIPO = '$this->TIPO',
				SUPERFICIEESPACIO = '$this->SUPERFICIEESPACIO',
				NUMINVENTARIOESPACIO = '$this->NUMINVENTARIOESPACIO'
			WHERE (
				CODESPACIO = '$this->CODESPACIO'
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