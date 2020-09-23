//Script : JavaScript
//Creado el : 28-10-2019
//Creado por: Alejandro Gómez González
  
  //Este script define todas las funciones JS que necesita la web para validaciones y alertas


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////Comprobaciones sobre campos de formularios/////////////////////////////////////

   
    //Valida si el campo es vacio o no
  
    function comprobarVacio(idelemento){
      var correcto = false; //Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      valor = document.getElementById(idelemento).value; //Valor extraido del input
      nombre = document.getElementById(idelemento).name; //Nombre del input
      longitud = document.getElementById(idelemento).value.length; //Longitud del input
      //Compruebo si el valor es null o no es vacio`
      if ((valor == null) || (longitud == 0)){
        abrirModal(idelemento, "El "+ nombre +" no puede ser vacio");
        correcto = false;
      } 
      else{
        correcto = true;
      }

      //Si es vacio muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
      
    }


    //Valida la longitud de un campo
   function comprobarLongitud(idelemento, size){
      var correcto = false;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      longitud = document.getElementById(idelemento).value.length;//Longitud del input
      //Compruebo si la longitud es mayor al limite que pasamos como parametro
      if (longitud > size){
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede superar los " + size + " caracteres");
        correcto = false;
      } 
      else{
        correcto = true;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo.

      if (correcto){
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
      
    }

    //Comprueba si el campo contiene SOLO letras y dígitos
    function comprobarTexto(idelemento,size) {
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if ((document.getElementById(idelemento).value.length>size)||(document.getElementById(idelemento).value.length<3)) {
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede tener menos de 3 caracteres o más de "+ size);
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9]+$/; //Esta expresión regular valida si contiene digitos o letras.
      //Compruebo la expresión regular
      if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" solo debe contener letras y digitos");
        correcto = false;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){
        document.getElementById(idelemento).style.borderColor = "green"; 
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }

    }

      //Comprueba que los codigos de EDIFICIO,CENTRO Y ESPACIO SIGUEN el formato correcto
      function comprobarCodigo(idelemento,size) {
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if ((document.getElementById(idelemento).value.length>size)||(document.getElementById(idelemento).value.length<3)) {
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede tener menos de 3 caracteres o más de "+ size);
        correcto = false;
      }
      
      var patron = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d-]+$/; //Esta expresión regular valida si contiene digitos o letras.
      //Compruebo la expresión regular
      if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+"solo permitide alfabéticos, números y el “-”");
        correcto = false;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){
        document.getElementById(idelemento).style.borderColor = "green"; 
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }

    }

    //Comprueba que las direcciones tengan el formato correcto
      function comprobarDireccion(idelemento,size) {
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if ((document.getElementById(idelemento).value.length>size)||(document.getElementById(idelemento).value.length<3)) {
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede tener menos de 3 caracteres o más de "+ size);
        correcto = false;
      }
      
      var patron = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\dªº/-]+$/; //Esta expresión regular valida si contiene digitos o letras.
      //Compruebo la expresión regular
      if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+"Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”");
        correcto = false;
      }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){
        document.getElementById(idelemento).style.borderColor = "green"; 
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }

    }


    //Comprueba si un campo cumple una expresion regular
    function comprobarExpresionRegular(idelemento, exprreg, size){
      valor = document.getElementById(idelemento).value;//Valor extraido del input
      longitud = document.getElementById(idelemento).value.length;//Longitud del input
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Compruebo si supera el tamaño
      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño");
        correcto = false;
      }
        //Compruebo si es null o vacio
       if ((valor == null) || (longitud == 0)){
        correcto=true;
       }else{
        //Compruebo la expresioón regular
      if (!exprreg.test(document.getElementById(idelemento).value)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+"no cumple las condiciones");
        correcto = false;
      }
     }
      //Si contiene otros caracteres muestra el mensaje de error y cambia el borde del campo a rojo.
      if (correcto){      
        return true;
      }else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //Valida si el campo tiene SOLO letras, no puede contener números
    function comprobarAlfabetico(idelemento,size) {
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      //Comprueba si supera la longitud
       if ((document.getElementById(idelemento).value.length>size)||(document.getElementById(idelemento).value.length<3)) {
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede tener menos de 3 caracteres o más de "+ size);
        correcto = false;
      }
      //Expresión regular que comprueba letras y también letras con acentos
      var patron = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
       //Comprueba la expresión regular
      if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" solo admite letras");
        correcto = false;
      }
//Si no contiene exclusivamente letras muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //Es la misma función que la anterior pero permitiendo que el campo sea vacio, porque en las busquedas pueden ser vacias
    function comprobarAlfabetico_busq(idelemento,size) {
      valor = document.getElementById(idelemento).value;//Valor extraido del input
      longitud = document.getElementById(idelemento).value.length;//Longitud del input
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
       //Comprueba si supera la longitud
       if ((document.getElementById(idelemento).value.length>size)) {
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede tener menos de 3 caracteres o más de "+ size);
        correcto = false;
      }
       //Comprueba si es null o vacio
       if ((valor == null) || (longitud == 0)){
        correcto=true;
       }else{
      var patron = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g; //Expresión regular para verificar
      //Comprueba si supera la expresión regular
      if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" solo admite letras");
        correcto = false;
      }
     }
//Si no contiene exclusivamente letras muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){      
        return true;
      }else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }




    //Comprueba si el DNI o el NIE tiene el formato correcto
    function comprobarDni(idelemento) { 
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
      var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Conjunto de letras para calcular la letra del DNI
      var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i; //Expresion regular NIF
      var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i; //Expresion regular NIE
      var str = document.getElementById(idelemento).value.toString().toUpperCase();//Valor extraido del input
      //Compruebo si se cumplen los faormatos de NIE y NIF
      if (!nifRexp.test(str) && !nieRexp.test(str)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" tiene formato incorrecto");
        correcto = false;        
      } 
      else{
        var nie = str
            .replace(/^[X]/, '0')
            .replace(/^[Y]/, '1')
            .replace(/^[Z]/, '2');

        var letter = str.substr(-1);
        var charIndex = parseInt(nie.substr(0, 8)) % 23;
        //Compruebo si hay coherencia entre números y letra
        if (validChars.charAt(charIndex) === letter){
          correcto = true;
        }
        else{
          abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" tiene formato incorrecto");
          correcto =  false;
        }
      }
      //Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; 
        return true; 
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }


//Esta funcion comprueba que el login y el dni son iguales
     function comprobarDNI_Login_iguales(idelemento, idelemento2) {
        var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
        //Compruebo si los dos son iguales
       if (document.getElementById(idelemento).value!==document.getElementById(idelemento2).value){
       abrirModal(idelemento, "El login y el DNI deben ser idénticos");
        correcto = false;
      }
      //Si no son iguales muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
        if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; 
        return true; 
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
}

    //Comprueba si el valor introducido es un email
    function comprobarEmail(idelemento,size) {
      var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
        //Compruebo si supera el tamaño
      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño");
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/; 
              //Compruebo la expresion regular
      if (!patron.test(document.getElementById(idelemento).value)){ 
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" no tiene formato correcto");
        correcto = false;
      }

      //Si no tiene el formato correcto mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
      if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green'; 
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //Comprueba que sea un telefono incluyendo si tiene extensión internacional
     function comprobarTelefono(idelemento) {
        var correcto = true;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
        //Este comprueba todos los formatos +34,0034 y 34
        var patron = /^(\+[0-9][0-9]|00[0-9][0-9]|[0-9][0-9])?[\s|\-|\.]?[6-9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/;
        //Compruebo la expresión regular
       if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" no tiene el formato correcto");
        correcto = false;
      }
//Si no tiene el formato correcto muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
    if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; 
        return true; 
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }

    }



//Comprueba si un valor es entero o no
function comprobarEntero(idelemento, valormenor, valormayor) {
  correcto = false; //Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
    //Lo primero que hago es hacer un cast de lo que me llega, de modo que si no es un numero me devuelve un NaN
     var entero = new Number(document.getElementById(idelemento).value); // Valor del input
      //Compruebo si es entero
      if(entero%1==0){
        //Compruebo si esta en el rango de valores que se pasa como parametro
    if (entero < valormenor || entero > valormayor) {
      abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede ser menor a "+
        valormenor+" o mayor a "+valormayor);
      correcto = false;
      }else{
        correcto=true;
      }
    }else {
    abrirModal(idelemento, "El atributo no es un numero entero");
      correcto = false;
  }
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
}
//Hace lo mismo que la anterior pero sin verificar rango de valores
function comprobarEntero_busq(idelemento) {
  correcto = false;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)         
     var entero = new Number(document.getElementById(idelemento).value); //Valor extraido del input
    if(entero%1==0){
      correcto=true;
    }else {
    abrirModal(idelemento, "El atributo no es un numero entero");
      correcto = false;
  }
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if (correcto){
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
}

//Comprueba si un valor es real o no
function comprobarReal(idelemento, valormenor, valormayor) {
  correcto = false;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
    //Lo primero que hago es hacer un cast de lo que me llega, de modo que si no es un numero me devuelve un NaN
     var real = new Number(document.getElementById(idelemento).value); //Valor extraido del input
      //Compruebo si es entero
      if(!isNaN(real)){
        //Compruebo si es real
      if(real%1!==0){
        //Compruebo si esta en el rango de valores que se pasa como parametro
    if (real < valormenor || real > valormayor) {
      abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede ser menor a "+
        valormenor+" o mayor a "+valormayor);
      correcto = false;
      }else{
        correcto=true;
      }
    }
}else {
    abrirModal(idelemento, "El atributo no es un numero real");
      correcto = false;
  }
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
}

function comprobarAnhoAcademico(idelemento, valormenor, valormayor) {
  correcto = false;//Variable de control para pintar los border del inputr verde(correcto) o rojo(incorrecto)
    //Lo primero que hago es hacer un cast de lo que me llega, de modo que si no es un numero me devuelve un NaN
     var real = document.getElementById(idelemento).value;//Valor extraido del input
     var longitud = document.getElementById(idelemento).value.length;
     var patron = /([12]\d{3}-[12]\d{3})/;
        //Compruebo la expresión regular
       if (!patron.test(document.getElementById(idelemento).value)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" no tiene el formato correcto debe ser dddd-dddd");
        correcto = false;
      }else{
     
    if (longitud < valormenor || longitud > valormayor) {
      abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede ser menor a "+
        valormenor+" o mayor a "+valormayor);
      correcto = false;
      }else{
        correcto=true;
      }
    
}
//Si no es un entero muestra el mensaje de error y cambia el borde del campo a rojo, si no lo pone en verde.
   if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////Comprobaciones sobre formularios onsubmit/////////////////////////////////////

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
        comprobarVacio('login') && comprobarTexto('login',15) &&
        comprobarVacio('DNI') && comprobarDni('DNI') &&
        comprobarVacio('password') && comprobarTexto('password',128) &&
        comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30) &&
        comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50) &&
        comprobarVacio('telefono')  && comprobarTelefono('telefono') 
         && comprobarVacio('fotopersonal') && comprobarLongitud('fotopersonal',50)&&
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
        comprobarVacio('login') && comprobarTexto('login',15) &&
        comprobarVacio('DNI') && comprobarDni('DNI') &&
        comprobarVacio('password') && comprobarTexto('password',128) &&
        comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30) &&
        comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50) &&
        comprobarVacio('telefono')  && comprobarTelefono('telefono') 
         && comprobarLongitud('fotopersonal',50)&&
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
       comprobarVacio('CODEDIFICIO') && comprobarCodigo('CODEDIFICIO',10) &&
      comprobarVacio('NOMBREEDIFICIO')  && comprobarAlfabetico('NOMBREEDIFICIO',50) &&
       comprobarVacio('DIRECCIONEDIFICIO')  && comprobarDireccion('DIRECCIONEDIFICIO',150) &&
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
       comprobarVacio('CODCENTRO') && comprobarCodigo('CODCENTRO',10) &&
       comprobarVacio('NOMBRECENTRO')  && comprobarAlfabetico('NOMBRECENTRO',50) &&
       comprobarVacio('DIRECCIONCENTRO')  && comprobarDireccion('DIRECCIONCENTRO',150) &&
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
       comprobarVacio('CODESPACIO') && comprobarCodigo('CODESPACIO',10) &&
       comprobarVacio('SUPERFICIEESPACIO')  && comprobarEntero('SUPERFICIEESPACIO',1, 9999) &&
       comprobarVacio('NUMINVENTARIOESPACIO')  && comprobarEntero('NUMINVENTARIOESPACIO',1,99999999)
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
        comprobarVacio('login') && comprobarAlfabetico('login',15) &&
        comprobarVacio('password') && comprobarAlfabetico('password',128)
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

  function cambioidioma2(idioma,id)
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
    
      //alert(strings_idioma[idioma][id]);
      try{
         document.getElementById(id).innerHTML = strings_idioma[idioma][id];
         alert(id);
       //alert(document.getElementById(id)+" "+id);
      }catch(err){
        //alert(id);
      }
     
      //cont++;
    

//alert(cont);
  }




