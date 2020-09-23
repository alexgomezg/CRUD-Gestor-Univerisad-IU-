
<?php

//Clase : PROFESOR_Modelo
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class PROFESOR_Model {

// Variables que representan los atributos del profesor: dni, nombre, apellidos, area y departamento.
	var $dni; 
	var $nombre;
	var $apellidos;
	var $area;
	var $departamento;

//Constructor de la clase

function __construct($dni,$nombre,$apellidos,$area,$departamento){
	$this->dni = $dni;
	$this->departamento= $departamento;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->area = $area;
	$this->erroresdatos = array(); 
	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}


// Function comprobar_DNI()
//Comprueba que el dato es mayor a 3 y menor a 9, si tiene el formato correcto y si es un DNI válido, si todo esta correcto devuelve true si no el array de errores
function comprobar_DNI()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->dni == null) || (strlen($this->dni) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "dni",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->dni)<3){
	 $mensajeError = array (
              "nombreatributo" => "dni",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->dni)>9){
	 $mensajeError = array (
              "nombreatributo" => 'dni',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
      $validChars = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Conjunto de letras para calcular la letra del DNI
      $nifRexp = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"; //Expresion regular NIF
      $str = strtoupper($this->dni);//Valor extraido del input
      //Compruebo si se cumplen los faormatos de NIE y NIF
      if (!preg_match($nifRexp,$this->dni)){
        $mensajeError = array (
              "nombreatributo" => "dni",
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
              "nombreatributo" => "dni",
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

// Function comprobar_NOMBREPROFESOR()
//Comprueba que el dato es mayor a 3,menor a 15 y si el formato de NOMBREPROFESOR es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_NOMBREPROFESOR()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->nombre == null) || (strlen($this->nombre) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "NOMBREPROFESOR",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->nombre)<3){
	 $mensajeError = array (
              "nombreatributo" => "NOMBREPROFESOR",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->nombre)>15){
	 $mensajeError = array (
              "nombreatributo" => 'NOMBREPROFESOR',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->nombre)){
		 $mensajeError = array (
              "nombreatributo" => 'NOMBREPROFESOR',
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
// Function comprobar_APELLIDOSPROFESOR()
//Comprueba que el dato es mayor a 3,menor a 30 y si el formato de APELLIDOSPROFESOR es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_APELLIDOSPROFESOR()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->apellidos == null) || (strlen($this->apellidos) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "APELLIDOSPROFESOR",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->apellidos)<3){
	 $mensajeError = array (
              "nombreatributo" => "APELLIDOSPROFESOR",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->apellidos)>30){
	 $mensajeError = array (
              "nombreatributo" => 'APELLIDOSPROFESOR',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->apellidos)){
		 $mensajeError = array (
              "nombreatributo" => 'APELLIDOSPROFESOR',
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

// Function comprobar_AREAPROFESOR()
//Comprueba que el dato es mayor a 3,menor a 60 y si el formato de AREAPROFESOR es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_AREAPROFESOR()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->area == null) || (strlen($this->area) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "AREAPROFESOR",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->area)<3){
	 $mensajeError = array (
              "nombreatributo" => "AREAPROFESOR",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->area)>60){
	 $mensajeError = array (
              "nombreatributo" => 'AREAPROFESOR',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->area)){
		 $mensajeError = array (
              "nombreatributo" => 'AREAPROFESOR',
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
// Function comprobar_DEPARTAMENTOPROFESOR()
//Comprueba que el dato es mayor a 3,menor a 60 y si el formato de DEPARTAMENTOPROFESOR es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_DEPARTAMENTOPROFESOR()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->departamento == null) || (strlen($this->departamento) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "DEPARTAMENTOPROFESOR",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
	if(strlen($this->departamento)<3){
	 $mensajeError = array (
              "nombreatributo" => "DEPARTAMENTOPROFESOR",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	
if(strlen($this->departamento)>60){
	 $mensajeError = array (
              "nombreatributo" => 'DEPARTAMENTOPROFESOR',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->departamento)){
		 $mensajeError = array (
              "nombreatributo" => 'DEPARTAMENTOPROFESOR',
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
	$errores[]=$this->comprobar_DNI();
	$errores[]=$this->comprobar_NOMBREPROFESOR();
	$errores[]=$this->comprobar_APELLIDOSPROFESOR();
	$errores[]=$this->comprobar_AREAPROFESOR();
	$errores[]=$this->comprobar_DEPARTAMENTOPROFESOR();
	for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;

}

//Metodo ADD
//Inserta en la tabla PROFESOR de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
		$ctrl=$this->comprobar_atributos();
		if(!is_array($ctrl)){
		$sql = "select * from PROFESOR where dni = '".$this->dni."'";

		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}


		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
		
		$sql = "INSERT INTO PROFESOR (
			DNI,
			NOMBREPROFESOR,
			APELLIDOSPROFESOR,
			AREAPROFESOR,
			DEPARTAMENTOPROFESOR) 
				VALUES (
					'".$this->dni."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->area."',
					'".$this->departamento."'
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
    

//Funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{

	$sql = "SELECT *
			FROM PROFESOR
			WHERE (
				DNI LIKE '%".$this->dni."%' AND
				NOMBREPROFESOR LIKE '%".$this->nombre."%' AND
				APELLIDOSPROFESOR LIKE '%".$this->apellidos."%' AND
				AREAPROFESOR LIKE '%".$this->area."%' AND
				DEPARTAMENTOPROFESOR LIKE '%".$this->departamento."%'
			)
	";
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos'; //Error en la construcción de la sentencia SQL
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
$ctrl=$this->comprobar_dni();
		if(!is_array($ctrl)){
   $sql = "	DELETE FROM 
   				PROFESOR
   			WHERE(
   				DNI = '$this->dni'
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

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$ctrl=$this->comprobar_dni();
		if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM PROFESOR
			WHERE (
				(DNI = '$this->dni') 
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

}
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
$ctrl=$this->comprobar_atributos();
		if(!is_array($ctrl)){
	$sql = "UPDATE PROFESOR
			SET 
				DNI = '$this->dni',
				NOMBREPROFESOR = '$this->nombre',
				APELLIDOSPROFESOR = '$this->apellidos',
				AREAPROFESOR = '$this->area',
				DEPARTAMENTOPROFESOR = '$this->departamento'
			WHERE (
				DNI = '$this->dni'
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