
<?php

//Clase : USUARIOS_Modelo
//Creado el : 05-10-2017
//Creado por: Alejandro Gómez González
//-------------------------------------------------------

class USUARIOS_Model {
// Variables que representan los atributos del profesor: login de usuario, contraseña, nombre del usuario, apellidos, email, telefono, fecha de nacimiento, foto personal y sexo.
	var $login;
	var $password;
	var $dni;
	var $nombre;
	var $apellidos;
	var $email;
	var $telefono;
	var $FechaNacimiento;
	var $fotopersonal;
	var $sexo;
	var $mysqli;

//Constructor de la clase
//

function __construct($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo){
	$this->login = $login;
	$this->password = $password;
	$this->dni = $dni;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->telefono = $telefono;
	$this->FechaNacimiento = $FechaNacimiento;
	$this->fotopersonal = $fotopersonal;
	$this->sexo = $sexo;
	$this->errores = array(); 
	include_once '../Functions/validaciones.php';
	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

// Function comprobar_login()
//Comprueba que el dato es mayor a 3 y menor a 15 y que solo contiene texto, si todo esta correcto devuelve true si no el array de errores
function comprobar_login()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->login == null) || (strlen($this->login) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "login",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
      //Compruebo si es menor que 3
	if(strlen($this->login)<3){
	 $mensajeError = array (
              "nombreatributo" => "login",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
 //Compruebo si es mayor que 15
if(strlen($this->login)>15){
	 $mensajeError = array (
              "nombreatributo" => 'login',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si solo son alfabeticos
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/",$this->login)){
		 $mensajeError = array (
              "nombreatributo" => 'login',
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

// Function comprobar_password()
//Comprueba que el dato es mayor a 3 y menor a 128 y que solo contiene alfabeticos, si todo esta correcto devuelve true si no el array de errores
function comprobar_password()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->password == null) || (strlen($this->password) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "password",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Compruebo si es menor que 3
	if(strlen($this->password)<3){
	 $mensajeError = array (
              "nombreatributo" => "password",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
 //Compruebo si es mayor que 128
if(strlen($this->password)>128){
	 $mensajeError = array (
              "nombreatributo" => 'password',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si solo son alfabeticos
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/",$this->password)){
		 $mensajeError = array (
              "nombreatributo" => 'password',
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
     //Compruebo si es menor que tres
	if(strlen($this->dni)<3){
	 $mensajeError = array (
              "nombreatributo" => "dni",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 9
if(strlen($this->dni)>9){
	 $mensajeError = array (
              "nombreatributo" => 'dni',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
	//Compruebo si el formato del DNI es el correcto
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
      	//Compruebo si es un DNI válido
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
         return $errores;
        }
      }
      //Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
	if($correcto==TRUE){
		return TRUE;
	}else{
		return $errores;
	}
}

// Function comprobar_nombre()
//Comprueba que el dato es mayor a 3,menor a 30, si solo contiene alfabeticos, si todo esta correcto devuelve true si no el array de errores
function comprobar_nombre()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->nombre == null) || (strlen($this->nombre) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "nombre",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Compruebo si es menor que tres
	if(strlen($this->nombre)<3){
	 $mensajeError = array (
              "nombreatributo" => "nombre",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 30
if(strlen($this->nombre)>30){
	 $mensajeError = array (
              "nombreatributo" => 'nombre',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si solo son alfabeticos
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->nombre)){
		 $mensajeError = array (
              "nombreatributo" => 'nombre',
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
// Function comprobar_apellidos()
//Comprueba que el dato es mayor a 3,menor a 50, si solo contiene alfabeticos y espacios, si todo esta correcto devuelve true si no el array de errores
function comprobar_apellidos()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->apellidos == null) || (strlen($this->apellidos) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "apellidos",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Compruebo si es menor que tres
	if(strlen($this->apellidos)<3){
	 $mensajeError = array (
              "nombreatributo" => "apellidos",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 50
if(strlen($this->apellidos)>50){
	 $mensajeError = array (
              "nombreatributo" => 'apellidos',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si solo son alfabeticos
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$this->apellidos)){
		 $mensajeError = array (
              "nombreatributo" => 'apellidos',
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


// Function comprobar_telefono()
//Comprueba que el dato es mayor a 3,menor a 11 y si el formato del teléfono es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_telefono()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->telefono == null) || (strlen($this->telefono) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "telefono",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
     //Compruebo si es menor que 9
	if(strlen($this->telefono)<9){
	 $mensajeError = array (
              "nombreatributo" => "telefono",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 11
if(strlen($this->telefono)>11){
	 $mensajeError = array (
              "nombreatributo" => 'telefono',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si solo son dígitos
if (!preg_match("/^[\d]+$/",$this->telefono)){
		 $mensajeError = array (
              "nombreatributo" => 'telefono',
              "codigoincidencia" => "00070",
              "mensajeerror" => "Solo se permiten números"
                );
		$errores[]=$mensajeError;
		return $errores;
	}


//Compruebo que el formato del telefono sea el correcto
	if (preg_match("/^([0-9][0-9])?[\s|\-|\.]?[6-9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/",$this->telefono)){
		if(strlen($this->telefono)==11){
		$str=$this->telefono{0}.$this->telefono{1};
		$str1=$this->telefono{2};
		$prefijo=(int)$str;
		$primer_numero=(int)$str1;
		if(($prefijo==34)&&($primer_numero>=6)&&($primer_numero<=9)){
	}else{
		$mensajeError = array (
              "nombreatributo" => 'telefono',
              "codigoincidencia" => "00006",
              "mensajeerror" => "Teléfono no válido"
                );
		
		$errores[]=$mensajeError;
		return $errores;
	}
	}else{
		$str1=$this->telefono{0};
		$primer_numero=(int)$str1;
		if(($primer_numero>=6)&&($primer_numero<=9)){
	}else{
		$mensajeError = array (
              "nombreatributo" => 'telefono',
              "codigoincidencia" => "00006",
              "mensajeerror" => "Teléfono no válido"
                );
		
		$errores[]=$mensajeError;
		return $errores;
	}
	}


	}else{
		 $mensajeError = array (
              "nombreatributo" => 'telefono',
              "codigoincidencia" => "00006",
              "mensajeerror" => "Teléfono no válido"
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

// Function comprobar_email()
//Comprueba que el dato es mayor a 3,menor a 60 y si el formato del email es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_email()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->email == null) || (strlen($this->email) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "email",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
      //Compruebo si es menor que 3
	if(strlen($this->email)<3){
	 $mensajeError = array (
              "nombreatributo" => "email",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 60
if(strlen($this->email)>60){
	 $mensajeError = array (
              "nombreatributo" => 'email',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo que el formato del email sea el correcto
	if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/",$this->email)){
		 $mensajeError = array (
              "nombreatributo" => 'email',
              "codigoincidencia" => "00120",
              "mensajeerror" => "Formato email erroneo"
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
// Function comprobar_FechaNacimiento()
//Comprueba que el dato es mayor a 3,menor a 10 y si el formato de fecha es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_FechaNacimiento()
{
	$errores = array();
	$correcto=true;
      //Compruebo si el valor es null o no es vacio
      if (($this->FechaNacimiento == null) || (strlen($this->FechaNacimiento) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "FechaNacimiento",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
      //Compruebo si es menor que 3
	if(strlen($this->FechaNacimiento)<3){
	 $mensajeError = array (
              "nombreatributo" => "FechaNacimiento",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 10
if(strlen($this->FechaNacimiento)>10){
	 $mensajeError = array (
              "nombreatributo" => 'FechaNacimiento',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Comprueba que el formato de fecha sea el correcto
	if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/",$this->FechaNacimiento)){
		 $mensajeError = array (
              "nombreatributo" => 'FechaNacimiento',
              "codigoincidencia" => "00020",
              "mensajeerror" => "Formato fecha erróneo"
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
// Function comprobar_fotopersonal()
//Comprueba que el dato es mayor a 3,menor a 50 y si el formato de fotopersonal es correcto, si todo esta correcto devuelve true si no el array de errores
function comprobar_fotopersonal(){

	$errores = array();
	$correcto=true;
	//Compruebo si es nulo o vacio
   if (($this->fotopersonal == null) || (strlen($this->fotopersonal) == 0)){

      	$mensajeError = array (
              "nombreatributo" => "fotopersonal",
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo vacío"
                );
	$errores[]=$mensajeError;
	return $errores;
      }
      //Compruebo si es menor que 3
	if(strlen($this->fotopersonal)<3){
	 $mensajeError = array (
              "nombreatributo" => "fotopersonal",
              "codigoincidencia" => "00003",
              "mensajeerror" => "Valor de atributo no numérico demasiado corto"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo si es mayor que 50
if(strlen($this->fotopersonal)>50){
	 $mensajeError = array (
              "nombreatributo" => 'fotopersonal',
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
	$errores[]=$mensajeError;
	return $errores;
}
//Compruebo que el formato de la fotopersonal sea el correcto
	if (preg_match("/([\/:*?\"<>|])/",$this->fotopersonal)){
		 $mensajeError = array (
              "nombreatributo" => 'fotopersonal',
              "codigoincidencia" => "000130",
              "mensajeerror" => "Nombre del archivo no válido"
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
// Function comprobar_sexo()
//Comprueba si el sexo, es HOMBRE O MUJER
function comprobar_sexo(){
	$errores = array();
	$correcto=true;
	//Compruebo que el sexo sea solo HOMBRE o Mujer
	if(($this->sexo=="1")||($this->sexo=="2")||($this->sexo=="HOMBRE")||($this->sexo=="MUJER")){
	}else{
		$mensajeError = array (
              "nombreatributo" => 'sexo',
              "codigoincidencia" => "00100",
              "mensajeerror" => "Solo se permiten los valores 'hombre','mujer'"
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

	$errores[]=$this->comprobar_login();
	$errores[]=$this->comprobar_password();
	$errores[]=$this->comprobar_DNI();
	$errores[]=$this->comprobar_nombre();
	$errores[]=$this->comprobar_apellidos();
	$errores[]=$this->comprobar_telefono();
	$errores[]=$this->comprobar_email();
	$errores[]=$this->comprobar_FechaNacimiento();
	$errores[]=$this->comprobar_fotopersonal();
	$errores[]=$this->comprobar_sexo();

  for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;

}
//Comprueba el login y la password, devuelve true si estan bien si no el array de errores
function comprobar_login_password(){
	$errores=array();
	$errores[]=$this->comprobar_login();
	$errores[]=$this->comprobar_password();
	 for($i=0;$i<count($errores,0);$i++){
        if(is_array($errores[$i])){
       return $errores;
    }
      }
return TRUE;
}


//Esta función formatea el telefono en caso de exceder los 11 caracteres permitidos por la BD, casos
//+34 o en el caso de 0034
function formatear_telefono(){
	$longitud = strlen($this->telefono);
	if(strlen($this->telefono)>11){
	$this->telefono=substr($this->telefono,strlen($this->telefono)-11);
	}
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$this->formatear_telefono();
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "select * from USUARIOS where login = '".$this->login."'";
		if (!$result = $this->mysqli->query($sql)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}


		$sql1 = "select * from USUARIOS where email = '".$this->email."'";
		if (!$result1 = $this->mysqli->query($sql1)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}
		if ($result1->num_rows == 1){  // existe el email
				echo "entro<br>";
				return 'Inserción fallida: el email ya existe';
			}


		$sql2 = "select * from USUARIOS where DNI = '".$this->dni."'";
		if (!$result2 = $this->mysqli->query($sql2)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}
		if ($result2->num_rows == 1){  // existe el email
				return 'Inserción fallida: el DNI ya existe';
			}


		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}

		$sql = "INSERT INTO USUARIOS (
			login,
			DNI,
			password,
			nombre,
			apellidos,
			email,
			telefono,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->dni."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."',
					'".$this->telefono."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
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
    

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				login LIKE '%".$this->login."%' AND
				password LIKE '%".$this->password."%' AND
				DNI LIKE '%".$this->dni."%' AND
				nombre LIKE '%".$this->nombre."%' AND
				apellidos LIKE '%".$this->apellidos."%' AND
				email LIKE '%".$this->email."%' AND
				telefono LIKE '%".$this->telefono."%' AND
				FechaNacimiento LIKE '%".$this->FechaNacimiento."%' AND
				fotopersonal LIKE '%".$this->fotopersonal."%' AND
				sexo LIKE '%".$this->sexo."%'
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
	$ctrl=$this->comprobar_login();
	if(!is_array($ctrl)){
   $sql = "	DELETE FROM 
   				USUARIOS
   			WHERE(
   				login = '$this->login'
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
	$ctrl=$this->comprobar_login();

	if(!is_array($ctrl)){
    $sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
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

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
	//Añado una opcion vacia en el select que devuelve un 0 en el sexo, de modo que cuando el usuario se esta editando y no se quiere cambiar el sexo, exista por defecto la opción de dejarlo como esta sin tener que escoger la opción necesaria
	/*if($this->sexo==0){  
		$sql="SELECT sexo
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";
		$resultado = $this->mysqli->query($sql);
		$tupla = $resultado->fetch_array();
		$this->sexo=$tupla['sexo'];
	}*/
	$this->formatear_telefono();
	$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){



		$sql1 = "select * from USUARIOS where login = '".$this->login."'";
		if (!$result1 = $this->mysqli->query($sql1)) //Error en la construcción de la sentencia SQL
		{
			return 'Error de gestor de base de datos';
		}
		$result2=$result1->fetch_array();
		
		if ($result2['DNI'] != $this->dni){  // existe el dni
				return 'Inserción fallida: el dni ya existe';
			}

		if($result2['email'] != $this->email){  // existe el email
				return 'Inserción fallida: el email ya existe';
			}



	 if($this->fotopersonal==""){

	 	$sql = "UPDATE USUARIOS
			SET 
				password = '$this->password',
				nombre = '$this->nombre',
				apellidos = '$this->apellidos',
				email = '$this->email',
				DNI = '$this->dni',
				telefono = '$this->telefono',
				FechaNacimiento = '$this->FechaNacimiento',
				sexo = '$this->sexo'
			WHERE (
				login = '$this->login'
			)
			";
	 }else{
	$sql = "UPDATE USUARIOS
			SET 
				password = '$this->password',
				nombre = '$this->nombre',
				apellidos = '$this->apellidos',
				email = '$this->email',
				DNI = '$this->dni',
				telefono = '$this->telefono',
				FechaNacimiento = '$this->FechaNacimiento',
				fotopersonal = '$this->fotopersonal',
				sexo = '$this->sexo'
			WHERE (
				login = '$this->login'
			)
			";
		}	
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

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){
	$ctrl=$this->comprobar_login_password();
	if(!is_array($ctrl)){
	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	//return $this->
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
	}else{
		return $ctrl;
	}
}//fin metodo login

//
function Register(){
		$ctrl=$this->comprobar_login();
	if(!is_array($ctrl)){
		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //TEST : El usuario no existe

	}
}else{
		return $ctrl;
	}
}

function devolverError(){
return $this->login=="null";
}

function registrar(){

		$ctrl=$this->comprobar_atributos();
	if(!is_array($ctrl)){
		$sql = "INSERT INTO USUARIOS (
			login,
			DNI,
			password,
			nombre,
			apellidos,
			email,
			telefono,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->dni."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."',
					'".$this->telefono."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
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

}//fin de clase

?> 