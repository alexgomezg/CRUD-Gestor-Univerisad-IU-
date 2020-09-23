<?php
//Script : Validaciones.php
//Creado el : 28-10-2019
//Creado por: Alejandro Gómez González
  
  //Este script define todas las funciones PHP que necesitan los modelos para hacer validaciones en BACK


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////Comprobaciones sobre campos de formularios/////////////////////////////////////

   
    //Valida si el campo es vacio o no



    function comprobarVacio($nombre,$atributo){
      $errores = array();
      $correcto = FALSE; //Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      $valor = $atributo; //Valor extraido del input
      $longitud = strlen($atributo); //Longitud del input
      //Compruebo si el valor es null o no es vacio`
      if (($valor == null) || ($longitud == 0)){
        $correcto = FALSE;
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00001",
              "mensajeerror" => "Atributo Vacio"
                );
         $errores[]=$mensajeError;
      } 
      else{
        $correcto = TRUE;
      }
      //Si es vacio muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
    }


    //Valida la longitud de un campo
   function comprobarLongitud($nombre,$atributo,$size){
      $errores = array();
      $correcto = FALSE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      $longitud = strlen($atributo);//Longitud del input
      //Compruebo si la longitud es mayor al limite que pasamos como parametro
      if ($longitud > $size){
        $correcto = FALSE;
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
        $errores[]=$mensajeError;
      } 
      else{
        $correcto = TRUE;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo.

      if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
      
    }

    //Comprueba si el campo contiene SOLO letras y dígitos
    function comprobarTexto($nombre,$atributo,$size) {
      $errores = array();
      $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if (strlen($atributo)>$size){
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
        $errores[]=$mensajeError;
        $correcto = FALSE;
      }
      
      $patron = "/^[a-zA-Z0-9]+$/"; //Esta expresión regular valida si contiene digitos o letras.
      //Compruebo la expresión regular
      if (!preg_match($patron,$atributo)){ 
         $mensajeError = array (
              'nombreatributo' => $nombre,
              'codigoincidencia' => '00040',
              'mensajeerror' => 'Solo están permitidas alfabéticos, números y el -'
                );
        $errores[]=$mensajeError;
        $correcto = FALSE;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }

    }
    //Comprueba si un campo cumple una expresion regular
    function comprobarExpresionRegular($nombre,$atributo,$exprreg,$size){
      $errores = array();
      $valor=$atributo;
      $longitud =strlen($atributo);//Longitud del input
      $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if ($longitud>size) {
         $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
          $errores[]=$mensajeError;
        $correcto = FALSE;
      }
        //Compruebo si es null o vacio
       if (($valor == null) || ($longitud == 0)){
        $correcto=TRUE;
       }else{
        //Compruebo la expresioón regular
      if (!preg_match($exprreg,$valor)){
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00120",
              "mensajeerror" => "No se verifica la expresión regular"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
      }
     }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo.
      if ($correcto==true){      
        return TRUE;
      }else{
        return $errores;
      }
      
    }

    //Valida si el campo tiene SOLO letras, no puede contener números
    function comprobarAlfabetico($nombre, $atributo,$size) {
      $errores = array();
      $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Comprueba si supera la longitud
      if (strlen($atributo)>$size) {
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
      }
      //Expresión regular que comprueba letras y también letras con acentos
      // $patron = "/^[a-zA-Z0-9]+$/";
     $patron = "/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/";
       //Comprueba la expresión regular
      if (!preg_match($patron,$atributo)){
         $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00030",
              "mensajeerror" => "Solo están permitidas alfabéticos"
                );
        $errores[]=$mensajeError;
        $correcto = FALSE;
      }
//Si no contiene exclusivamente letras muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if ($correcto==TRUE){      
        return TRUE;
      }
      else{
        return $errores;
      }
      
    }

   
    //Comprueba si el DNI o el NIE tiene el formato correcto
    function comprobarDni($nombre,$atributo) {
      $errores = array();
      $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      $validChars = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Conjunto de letras para calcular la letra del DNI
      $nifRexp = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"; //Expresion regular NIF
      $nieRexp = "/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"; //Expresion regular NIE
      $str = strtoupper($atributo);//Valor extraido del input
      if(strlen($str)<8){
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00010",
              "mensajeerror" => "Formato dni erróneo"
                );
         $errores[]=$mensajeError;
         return $errores;
      }
      //Compruebo si se cumplen los faormatos de NIE y NIF
      if (!preg_match($nifRexp,$atributo) && !!preg_match($nieRexp,$atributo)){
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00010",
              "mensajeerror" => "Formato dni erróneo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;        
      } 
      else{
        /*$nie = $str
            .str_replace("/^[X]/", '0')
            .replace(/^[Y]/, '1')
            .replace(/^[Z]/, '2');*/

        $letter = $str{8};
        $charIndex = ((int)(substr($str,0,8))) % 23;
         //echo $letter." ".$charIndex."   ".$validChars{$charIndex}." ".(substr($str,0, 8))."<br>";
        //Compruebo si hay coherencia entre números y letra
        if ($validChars{$charIndex}=== $letter){
          $correcto = TRUE;
        }
        else{
          $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00010",
              "mensajeerror" => "Formato dni erróneo"
                );
           $errores[]=$mensajeError;
          $correcto =  FALSE;

        }
      }
      //Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.

      if ($correcto==TRUE){
        return TRUE; 
      }
      else{
        return $errores;
      }
      
    }

    //Comprueba si el valor introducido es un email
    function comprobarEmail($nombre,$atributo,$size) {
      $errores=array();
      $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
        //Compruebo si supera el tamaño
      if (strlen($atributo)>$size) {
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
      }
      
              //Compruebo la expresion regular
      if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/",$atributo)){ 
         $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00120",
              "mensajeerror" => "Formato email erroneo"
                );
        $errores[]=$mensajeError;
        $correcto = FALSE;
      }

      //Si no tiene el formato correcto mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if ($correcto==TRUE){      
        return TRUE;
      }
      else{
        return $errores;
      }
      
    }

    //Comprueba que sea un telefono incluyendo si tiene extensión internacional
     function comprobarTelefono($nombre,$atributo) {
       $errores=array();
        $correcto = TRUE;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
        //Este comprueba todos los formatos +34,0034 y 34
        $patron = "/^(\+[0-9][0-9]|00[0-9][0-9]|[0-9][0-9])?[\s|\-|\.]?[6-9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/";
        //Compruebo la expresión regular
       if (!preg_match($patron,$atributo)){ 
        $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00130",
              "mensajeerror" => "Formato teléfono incorrecto"
                );
        $errores[]=$mensajeError;
        $correcto = FALSE;
      }
//Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
    if ($correcto==TRUE){
        return TRUE; 
      }
      else{
        return $errores;
      }

    }



//Comprueba si un valor es entero o no
function comprobarEntero($nombre,$atributo, $valormenor, $valormayor) {
    $errores=array();
    $correcto = FALSE; //Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
    //Lo primero que hago es hacer un cast de lo que me llega, de modo que si no es un numero me devuelve un NaN
    $entero =$atributo; // Valor del input
      //Compruebo si es entero
      //if($entero%1==0){
     if(is_int($entero)==TRUE){
     
        //Compruebo si esta en el rango de valores que se pasa como parametro
    if ($entero < $valormenor || $entero > $valormayor) {
      $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00140",
              "mensajeerror" => "El entero es menor a ".$valormenor." o mayor a ".$valormayor
                );
        $errores[]=$mensajeError;
      $correcto = FALSE;
      }else{
        $correcto=TRUE;
      }
    }else {
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00150",
              "mensajeerror" => "El atributo no es un entero"
                );
        $errores[]=$mensajeError;
      $correcto = FALSE;
  }
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

//Comprueba si un valor es real o no
function comprobarReal($nombre,$atributo, $valormenor, $valormayor) {
    $errores=array();
    $correcto = FALSE; //Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
    //Lo primero que hago es hacer un cast de lo que me llega, de modo que si no es un numero me devuelve un NaN
     $real =$atributo; // Valor del input
      //Compruebo si es entero
      //if($entero%1==0){
     if(is_float($real)==TRUE){
     
        //Compruebo si esta en el rango de valores que se pasa como parametro
    if ($real < $valormenor || $real > $valormayor) {
      $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00160",
              "mensajeerror" => "El real es menor a ".$valormenor." o mayor a ".$valormayor
                );
        $errores[]=$mensajeError;
      $correcto = FALSE;
      }else{
        $correcto=TRUE;
      }
    }else {
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00170",
              "mensajeerror" => "El atributo no es un número real"
                );
        $errores[]=$mensajeError;
      $correcto = FALSE;
  }
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

function comprobarFecha($nombre,$atributo){
    $errores=array();
    $correcto=TRUE;
   if(!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/",$atributo)){
       $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00020",
              "mensajeerror" => "Formato fecha erróneo"
                );
        $errores[]=$mensajeError;

        $correcto=FALSE;
   }

    if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

function comprobarAnhoAcademico($nombre,$atributo){
  $errores=array();
  $correcto=TRUE;
  $patron="/([12]\d{3}-[12]\d{3})/";

  if(!preg_match($patron,$atributo)){

     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00110",
              "mensajeerror" => "Solo se permiten dddd-dddd (año académico) donde d es un dígito"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

function comprobarSexo($nombre,$atributo){
  $errores=array();
  $correcto=TRUE;
  //1 Es el valor del enumerado para hombre y 2 es el valor para mujer
  if(($atributo==1)||($atributo==2)){
  }else{
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00100",
              "mensajeerror" => "Solo se permiten los valores 'hombre','mujer' (sexo)"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
  
}

function comprobarTipoEspacio($nombre,$atributo){
  $errores=array();
  $correcto=TRUE;
  //1 Es el valor del enumerado para Despacho, 2 es el valor para laboratorio y 3 para PAS
  if(($atributo==1)||($atributo==2)||($atributo==3)){
  }else{
     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00080",
              "mensajeerror" => "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS' (tipo)"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

function comprobarDireccion($nombre,$atributo,$size){
  $errores=array();
  $correcto=TRUE;
  $patron="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº\/-]+$/";
   if (strlen($atributo)>$size) {
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
   }
  if(!preg_match($patron,$atributo)){

     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00050",
              "mensajeerror" => "Solo están permitidas alfabéticos, números y los símbolos- / º ª"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }

   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }

}

function comprobarCodigo($nombre,$atributo,$size){
  $errores=array();
  $correcto=TRUE;
  $patron="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/";
   if (strlen($atributo)>$size) {
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
   }
  if(!preg_match($patron,$atributo)){

     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00040",
              "mensajeerror" => "Solo están permitidas alfabéticos, números y el “-” (códigos de edificio, espacio, centro)"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}
function comprobarCodigoTitulacion($nombre,$atributo,$size){
  $errores=array();
  $correcto=TRUE;
  $patron="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]+$/";
   if (strlen($atributo)>$size) {
    $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00002",
              "mensajeerror" => "Valor de atributo demasiado largo"
                );
         $errores[]=$mensajeError;
        $correcto = FALSE;
   }
  if(!preg_match($patron,$atributo)){

     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00060",
              "mensajeerror" => "Solo se permiten alfabéticos y números (codigo titulacion)"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
}

function comprobarNumero($nombre,$atributo,$valormenor,$valormayor){

  $errores=array();
  $correcto=TRUE;
  $patron="/^[\d]+$/";

  if(!preg_match($patron,$atributo)){

     $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00070",
              "mensajeerror" => "Solo se permiten números (código de inventario, teléfono, superficieespacio)"
                );
        $errores[]=$mensajeError;
        $correcto=FALSE;
  }else{

    if ($atributo < $valormenor || $atributo > $valormayor) {
      $mensajeError = array (
              "nombreatributo" => $nombre,
              "codigoincidencia" => "00140",
              "mensajeerror" => "El numero es menor a ".$valormenor." o mayor a ".$valormayor
                );
        $errores[]=$mensajeError;
      $correcto = FALSE;
      }else{
        $correcto=TRUE;
      }

  }
   if ($correcto==TRUE){
        return TRUE;
      }
      else{
        return $errores;
      }
  }



 function prueba($nombre,$atributo){
      $error=array();
      $error[]=comprobarVacio($nombre,'aaaa');
      $error[]=comprobarVacio($nombre,'aaaa');
      $error[]=comprobarVacio($nombre,'');
      return validarTotal($error);
      
    }


function entradaUsuarios($login,$password,$dni,$nombre,$apellidos,$email,$telefono,$FechaNacimiento,$fotopersonal,$sexo){
  $errores = array();
  $errores[]=comprobarVacio('login',$login);
  $errores[]=comprobarTexto('login',$login,9);
  $errores[]=comprobarVacio('password',$password);
  $errores[]=comprobarTexto('password',$password,15);
  $errores[]=comprobarVacio('DNI',$dni);
  $errores[]=comprobarDni('DNI',$dni);
  $errores[]=comprobarVacio('nombre',$nombre);
  $errores[]=comprobarAlfabetico('nombre',$nombre,30);
  $errores[]=comprobarVacio('apellidos',$apellidos);
  $errores[]=comprobarAlfabetico('apellidos',$apellidos,50);
  $errores[]=comprobarEmail('email',$email,40);
  $errores[]=comprobarTelefono('telefono',$telefono);
  $errores[]=comprobarFecha('FechaNacimiento',$FechaNacimiento);
  $errores[]=comprobarVacio('fotopersonal',$fotopersonal);
  $errores[]=comprobarSexo('sexo',$sexo);
  return validarTotal($errores);
}

function deleteShowUsuarios($login){
  $errores = array();
  $errores[]=comprobarVacio('login',$login);
  $errores[]=comprobarTexto('login',$login,9);
  return validarTotal($errores);
}

function entradaProfesores($dni,$nombre,$apellidos,$area,$departamento){
  $errores = array();
  $errores[]=comprobarVacio('DNI',$dni);
  $errores[]=comprobarDni('DNI',$dni);
  $errores[]=comprobarVacio('nombre',$nombre);
  $errores[]=comprobarAlfabetico('nombre',$nombre,30);
  $errores[]=comprobarVacio('apellidos',$apellidos);
  $errores[]=comprobarAlfabetico('apellidos',$apellidos,50);
  $errores[]=comprobarVacio('area',$area);
  $errores[]=comprobarAlfabetico('area',$area,60);
  $errores[]=comprobarVacio('departamento',$departamento);
  $errores[]=comprobarAlfabetico('departamento',$departamento,60);
  return validarTotal($errores);
}

function deleteShowProfesores($dni){
  $errores = array();
  $errores[]=comprobarVacio('DNI',$dni);
  $errores[]=comprobarDni('DNI',$dni);
  return validarTotal($errores);
}

function entradaEdificios($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO){
  $errores = array();
  $errores[]=comprobarVacio('CODEDIFICIO',$CODEDIFICIO);
  $errores[]=comprobarCodigo('CODEDIFICIO',$CODEDIFICIO,10);
  $errores[]=comprobarVacio('NOMBREEDIFICIO',$NOMBREEDIFICIO);
  $errores[]=comprobarAlfabetico('NOMBREEDIFICIO',$NOMBREEDIFICIO,50);
  $errores[]=comprobarVacio('DIRECCIONEDIFICIO',$DIRECCIONEDIFICIO);
  $errores[]=comprobarDireccion('DIRECCIONEDIFICIO',$DIRECCIONEDIFICIO,150);
  $errores[]=comprobarVacio('CAMPUSEDIFICIO',$CAMPUSEDIFICIO);
  $errores[]=comprobarAlfabetico('CAMPUSEDIFICIO',$CAMPUSEDIFICIO,10);
  return validarTotal($errores);
}

function deleteShowEdificios($CODEDIFICIO){
  $errores = array();
  $errores[]=comprobarVacio('CODEDIFICIO',$CODEDIFICIO);
  $errores[]=comprobarCodigo('CODEDIFICIO',$CODEDIFICIO,10);
  return validarTotal($errores);
}


function entradaCentros($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO){
  $errores = array();
  $errores[]=comprobarVacio('CODCENTRO',$CODCENTRO);
  $errores[]=comprobarCodigo('CODCENTRO',$CODCENTRO,10);
  $errores[]=comprobarVacio('CODEDIFICIO',$CODEDIFICIO);
  $errores[]=comprobarCodigo('CODEDIFICIO',$CODEDIFICIO,10);
  $errores[]=comprobarVacio('NOMBRECENTRO',$NOMBRECENTRO);
  $errores[]=comprobarAlfabetico('NOMBRECENTRO',$NOMBRECENTRO,50);
  $errores[]=comprobarVacio('DIRECCIONCENTRO',$DIRECCIONCENTRO);
  $errores[]=comprobarDireccion('DIRECCIONCENTRO',$DIRECCIONCENTRO,150);
  $errores[]=comprobarVacio('RESPONSABLECENTRO',$RESPONSABLECENTRO);
  $errores[]=comprobarAlfabetico('RESPONSABLECENTRO',$RESPONSABLECENTRO,60);
  return validarTotal($errores);
}

function deleteShowCentros($CODCENTRO){
  $errores = array();
  $errores[]=comprobarVacio('CODCENTRO',$CODCENTRO);
  $errores[]=comprobarCodigo('CODCENTRO',$CODCENTRO,10);
  return validarTotal($errores);
}

function entradaEspacios($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO){
  $errores = array();
  $errores[]=comprobarVacio('CODESPACIO',$CODESPACIO);
  $errores[]=comprobarCodigo('CODESPACIO',$CODESPACIO,10);
  $errores[]=comprobarVacio('CODCENTRO',$CODCENTRO);
  $errores[]=comprobarCodigo('CODCENTRO',$CODCENTRO,10);
  $errores[]=comprobarVacio('CODEDIFICIO',$CODEDIFICIO);
  $errores[]=comprobarCodigo('CODEDIFICIO',$CODEDIFICIO,10);
  $errores[]=comprobarVacio('TIPO',$TIPO);
  $errores[]=comprobarTipoEspacio('TIPO',$TIPO);
  $errores[]=comprobarVacio('SUPERFICIEESPACIO',$SUPERFICIEESPACIO);
  $errores[]=comprobarNumero('SUPERFICIEESPACIO',$SUPERFICIEESPACIO,1,2147483647);
  $errores[]=comprobarVacio('NUMINVENTARIOESPACIO',$NUMINVENTARIOESPACIO);
  $errores[]=comprobarNumero('NUMINVENTARIOESPACIO',$NUMINVENTARIOESPACIO,1,2147483647);
  return validarTotal($errores);
}

function deleteShowEspacios($CODESPACIO){
  $errores = array();
  $errores[]=comprobarVacio('CODESPACIO',$CODESPACIO);
  $errores[]=comprobarCodigo('CODESPACIO',$CODESPACIO,10);
  return validarTotal($errores);
}

function entradaTitulaciones($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION){
  $errores = array();
  $errores[]=comprobarVacio('CODTITULACION',$CODTITULACION);
  $errores[]=comprobarCodigoTitulacion('CODTITULACION',$CODTITULACION,10);
  $errores[]=comprobarVacio('CODCENTRO',$CODCENTRO);
  $errores[]=comprobarCodigo('CODCENTRO',$CODCENTRO,10);
  $errores[]=comprobarVacio('NOMBRETITULACION',$NOMBRETITULACION);
  $errores[]=comprobarAlfabetico('NOMBRETITULACION',$NOMBRETITULACION,50);
  $errores[]=comprobarVacio('RESPONSABLETITULACION',$RESPONSABLETITULACION);
  $errores[]=comprobarAlfabetico('RESPONSABLETITULACION',$RESPONSABLETITULACION,60);
  return validarTotal($errores);
}

function deleteShowTitulaciones($CODTITULACION){
  $errores = array();
  $errores[]=comprobarVacio('CODTITULACION',$CODTITULACION);
  $errores[]=comprobarCodigoTitulacion('CODTITULACION',$CODTITULACION,10);
  return validarTotal($errores);
}

function validarTotal($error){
  for($i=0;$i<count($error,0);$i++){
        if(is_array($error[$i])){
       return $error;
    }
      }
return TRUE;
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////Comprobaciones sobre formularios onsubmit/////////////////////////////////////
/*
    //Comprueba antes de hacer el submit que los parametros del formualario de registro son correctos
    function comprobar_registro(){
      //Compruebo las condiciones de cada input
      if(
        esNoVacio('login') && comprobarDni('login') &&
        esNoVacio('password') && comprobarLetrasNumeros('password',16) &&
        esNoVacio('nombre')  && comprobarSoloLetras('nombre',30) &&
        esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50) &&
        esNoVacio('email') && comprobarEmail('email')
      ){
        return true; //Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false; //Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de login son correctos
    function comprobar_entrada_usuarios(){
       //Compruebo las condiciones de cada input
      if(
        comprobarVacio('login') && comprobarDni('login') &&
        comprobarVacio('DNI') && comprobarDni('DNI') &&
        comprobarVacio('password') && comprobarTexto('password',128) &&
        comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30) &&
        comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50) &&
        comprobarVacio('telefono')  && comprobarTelefono('telefono') 
         && comprobarVacio('fotopersonal') && comprobarLongitud('fotopersonal',50)
         && comprobarDNI_Login_iguales('DNI','login')&&
         comprobarVacio('email') && comprobarEmail('email')
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false; //Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario del edit de usuarios son correctos
    function comprobar_edit_usuarios(){
       //Compruebo las condiciones de cada input
      if(
        comprobarVacio('login') && comprobarDni('login') &&
        comprobarVacio('DNI') && comprobarDni('DNI') &&
        comprobarVacio('password') && comprobarTexto('password',128) &&
        comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30) &&
        comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50) &&
        comprobarVacio('telefono')  && comprobarTelefono('telefono') 
         && comprobarLongitud('fotopersonal',50)
         && comprobarDNI_Login_iguales('DNI','login')&&
         comprobarVacio('email') && comprobarEmail('email')
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de la búsqueda de usuarios son correctos
     function comprobar_busq_usuarios(){
       //Compruebo las condiciones de cada input
      if(
        comprobarLongitud('login',15)&& comprobarLongitud('password',128)&&
        comprobarLongitud('DNI',15)&&comprobarAlfabetico_busq('nombre',30)&&comprobarAlfabetico_busq('apellidos',50)
        &&comprobarLongitud('email',60)&&comprobarLongitud('telefono',11)&&comprobarLongitud('fotopersonal',50)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }

    //Comprueba antes de hacer el submit que los parametros del formualario de entrada de profesores son correctos
    function comprobar_entrada_profesores(){
       //Compruebo las condiciones de cada input
      if(
        comprobarVacio('dni') && comprobarDni('dni') &&
        comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30) &&
        comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50) &&
        comprobarVacio('area')  && comprobarAlfabetico('area',50)
         && comprobarVacio('departamento') && comprobarAlfabetico('departamento',50)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de entrada de edificios son correctos
    function comprobar_entrada_edificios(){
       //Compruebo las condiciones de cada input
      if(
       comprobarVacio('CODEDIFICIO') && comprobarTexto('CODEDIFICIO',10) &&
      comprobarVacio('NOMBREEDIFICIO')  && comprobarAlfabetico('NOMBREEDIFICIO',50) &&
       comprobarVacio('DIRECCIONEDIFICIO')  && comprobarLongitud('DIRECCIONEDIFICIO',150) &&
       comprobarVacio('CAMPUSEDIFICIO')  && comprobarAlfabetico('CAMPUSEDIFICIO',50)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de entrada de centros son correctos
    function comprobar_entrada_centros(){
       //Compruebo las condiciones de cada input
      if(
       comprobarVacio('CODCENTRO') && comprobarTexto('CODCENTRO',10) &&
       comprobarVacio('NOMBRECENTRO')  && comprobarAlfabetico('NOMBRECENTRO',50) &&
       comprobarVacio('DIRECCIONCENTRO')  && comprobarLongitud('DIRECCIONCENTRO',150) &&
       comprobarVacio('RESPONSABLECENTRO')  && comprobarAlfabetico('RESPONSABLECENTRO',60)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de entrada de espacios son correctos
    function comprobar_entrada_espacios(){
       //Compruebo las condiciones de cada input
      if(
       comprobarVacio('CODESPACIO') && comprobarTexto('CODESPACIO',10) &&
       comprobarVacio('SUPERFICIEESPACIO')  && comprobarEntero('SUPERFICIEESPACIO',1,2147483647) &&
       comprobarVacio('NUMINVENTARIOESPACIO')  && comprobarEntero('NUMINVENTARIOESPACIO',1,2147483647)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
    //Comprueba antes de hacer el submit que los parametros del formualario de entrada de titulaciones son correctos
     function comprobar_entrada_titulaciones(){
       //Compruebo las condiciones de cada input
      if(
       comprobarVacio('CODTITULACION') && comprobarTexto('CODTITULACION',10) &&
       comprobarVacio('NOMBRETITULACION')  && comprobarAlfabetico('NOMBRETITULACION',50) &&
       comprobarVacio('RESPONSABLETITULACION')  && comprobarAlfabetico('RESPONSABLETITULACION',60)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }


    //Comprueba antes de hacer el submit que los parametros del formualario de login de profesores son correctos
    function comprobar_login(){
       //Compruebo las condiciones de cada input
      if(
        comprobarVacio('login') && comprobarDni('login') &&
        comprobarVacio('password') && comprobarTexto('password',16)
      ){
        return true;//Devuelvo true si se cumplen todas las condiciones y se hace el submit
      }
      else{
        return false;//Si alguna falla devuelvo false
      }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////Funcionalidades////////////////////////////////////////////////////////////////
 
 //Estas dos funciones lo que hacen es mandar por post los parametros necesarios para hacer busquedas en entidades, de modo que
 // le paso la dirección a la entidad que quiero buscar el atributo por el que bucar por ejemplo DNI y le paso ese valor
 // Cuando pinchs te lleva a esa busqueda, es una forma de poder hacer diferentes submits en un mismo formulario 
function ir_a_option1(enlace,tipo_atrb,atrb){
    document.show_debil.action=enlace+tipo_atrb+"="+atrb;
    //document.show_debil.action="../Controller/PROF_TITULACION_Controller.php?action=SEARCH&DNI="+dni;
    document.show_debil.submit();
}

function ir_a_option2(enlace,tipo_atrb,atrb){
    document.show_debil.action=enlace+tipo_atrb+"="+atrb; 
    //document.show_debil.action="../Controller/PROF_ESPACIO_Controller.php?action=SEARCH&DNI="+dni;
    document.show_debil.reset();
    document.show_debil.submit();
}


//Devuelve el año actual
function devolverAnhoActual(){
var fecha = new Date();
var anho = fecha.getFullYear();
return anho;
}

//Cierra la ventana modal
    function cerrarModal(){
      document.getElementById("modal").style.display = "none"; 
    }

//Abre la ventana modal con los parametros pasados previamente, el texto de error a mostrar y el id del campo del formulario
    function abrirModal(idelemento, texto){
      document.getElementById("modal").style.display = "block";   
      document.getElementById("mensajeError").innerHTML = texto;
      document.getElementById("mensajeError").style.margin = "30px 0 0 160px";
      document.getElementById("cerrar").focus();
    } 



function cambioidioma(idioma)
  {
    strings_idioma = 
    { 
      'es' : {
  'Portal de Gestión'  :  'Portal de Gestión',
  'Usuario no autenticado'  :  'Usuario no autenticado',
  'Registro':'Registro',
  'Login':'Login',
  'Creado por Alejandro Gómez González el 28/10/2019':'Creado por Alejandro Gómez González el 28/10/2019'
      },
      'en' : {
        'Portal de Gestión'  :  'Management website',
  'Usuario no autenticado'  :  'User not logged',
  'Registro':'Register',
  'Login':'Login',
  'Creado por Alejandro Gómez González el 28/10/2019':'Creado por Alejandro Gómez González el 28/10/2019'
      },
      'ga' : {
  'Portal de Gestión'  :  'Portal de Xestión',
  'Usuario no autenticado'  :  'Usuario non autenticado',
  'Registro':'Rexistro',
  'Login':'Login',
  'Creado por Alejandro Gómez González el 28/10/2019':'Creado por Alejandro Gómez González el 28/10/2019'

      } 
    };

  
    
     var cont=0;
    for(var id in strings_idioma[idioma]) {
      //alert(strings_idioma[idioma][id]);
        //alert(id);
      try{
        document.getElementsByTag()
         document.getElementById(id).innerHTML = strings_idioma[idioma][id];
       //alert(document.getElementById(id)+" "+id);
      }catch(err){
        //alert(id);
      }
     
      //cont++;
    }

//alert(cont);
  }

 */
 ?>




