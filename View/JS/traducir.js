//Script : traducir.js
//Creado el : 10-12-2019
//Creado por: Alejandro Gómez González
  
  //Este script se encarga de hacer la tradución en front de la página


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Defino el array que contiene las traduciones del español
 var esp = [];
  esp[0]='Portal de Gestión=>Portal Gestión';
  esp[1]='Usuario no autenticado=>Usuario no autenticado';
  esp[2]='Creado por Alejandro Gómez González el 28/10/2019=>Creado por Alejandro Gómez González el 28/10/2019';
  esp[3]='Login=>Login';
  esp[4]='Registrar=>Registrar';
  esp[5]='Nombre=>Nombre';
  esp[6]='Password=>Password';
  esp[7]='Apellidos=>Apellidos';
  esp[8]='DNI=>DNI';
  esp[9]='Email=>Email';
  esp[10]='Teléfono=>Teléfono';
  esp[11]='Foto Personal=>Foto Personal';
  esp[12]='Fecha Nacimiento=>Fecha Nacimiento';
  esp[13]='Sexo=>Sexo';
  esp[14]='Seleccionar Archivo=>Seleccionar Archivo';
  esp[15]='Usuarios=>Usuarios';
  esp[16]='Profesores=>Profesores';
  esp[17]='Centros=>Centros';
  esp[18]='Edificios=>Edificios';
  esp[19]='Espacios=>Espacios';
  esp[20]='Titulaciones=>Titulaciones';
  esp[21]='Prof_Titulaciones=>Prof_Titulaciones';
  esp[22]='Prof_Espacios=>Prof_Espacios';
  esp[23]='SEARCH=>BUSCAR';
  esp[24]='Registro=>Registro';
  esp[25]='Usuario=>Usuario';
  esp[26]='BIENVENIDO A PORTAL DE GESTIÓN=>BIENVENIDO A PORTAL DE GESTIÓN';
  esp[27]='Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad=>Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad';
  esp[28]='login=>login';
  esp[29]='nombre=>nombre';
  esp[30]='password=>password';
  esp[31]='apellidos=>apellidos';
  esp[32]='DNI=>DNI';
  esp[34]='email=>email';
  esp[35]='telefono=>telefono';
  esp[36]='fotopersonal=>fotopersonal';
  esp[37]='FechaNacimiento=>FechaNacimiento';
  esp[38]='sexo=>sexo';
  esp[39]='ADD=>AÑADIR';
  esp[40]='SHOWALL=>VER TODOS';
  esp[41]='SHOWCURRENT=>DETALLES';
  esp[42]='DETALLE=>DETALLE';
  esp[43]='EDITAR=>EDITAR';
  esp[44]='EDIT=>EDITAR';
  esp[45]='BORRAR=>BORRAR';
  esp[46]='HOMBRE=>HOMBRE';
  esp[47]='MUJER=>MUJER';
  esp[48]='TODOS=>TODOS';
  esp[49]='Actualizacióon realizada con éxito=><img src=../View/Images/success1.png width=25> Actualización realizada con éxito';
  esp[50]='Inicio=>Inicio';
  esp[51]='Área=>Área';
  esp[52]='Departamento=>Departamento';
  esp[53]='NOMBREPROFESOR=>NOMBREPROFESOR';
  esp[54]='APELLIDOSPROFESOR=>APELLIDOSPROFESOR';
  esp[55]='AREAPROFESOR=>AREAPROFESOR';
  esp[56]='DEPARTAMENTOPROFESOR=>DEPARTAMENTOPROFESOR';
  esp[57]='Ver espacios asignados=>Ver espacios asignados';
  esp[58]='Ver titulaciones asignadas=>Ver titulaciones asignadas';
  esp[59]='Ver centros asignados=>Ver centros asignados';
  esp[60]='Ver profesores asignados=>Ver profesores asignados';
  esp[61]='Código del Edificio=>Código del Edificio';
  esp[62]='Nombre del Edificio=>Nombre del Edificio';
  esp[63]='Dirección del Edificio=>Dirección del Edificio';
  esp[64]='Campus del Edificio=>Campus del Edificio';
  esp[65]='Código del Centro=>Código del Centro';
  esp[66]='Nombre del Centro=>Nombre del Centro';
  esp[67]='Dirección del Centro=>Dirección del Centro';
  esp[68]='Responsable del Centro=>Responsable del Centro';
  esp[69]='CODEDIFICIO=>CODEDIFICIO';
  esp[70]='NOMBREEDIFICIO=>NOMBREEDIFICIO';
  esp[71]='DIRECCIONEDIFICIO=>DIRECCIONEDIFICIO';
  esp[72]='CAMPUSEDIFICIO=>CAMPUSEDIFICIO';
  esp[73]='CODCENTRO=>CODCENTRO';
  esp[74]='NOMBRECENTRO=>NOMBRECENTRO';
  esp[75]='DIRECCIONCENTRO=>DIRECCIONCENTRO';
  esp[76]='RESPONSABLECENTRO=>RESPONSABLECENTRO';
  esp[77]='Código del Espacio=>Código del Espacio';
  esp[78]='Tipo=>Tipo';
  esp[79]='Superficie del Espacio=>Superficie del Espacio';
  esp[80]='Núm. inventario del Espacio=>Núm. inventario del Espacio';
  esp[81]='CODESPACIO=>CODESPACIO';
  esp[82]='TIPO=>TIPO';
  esp[83]='SUPERFICIEESPACIO=>SUPERFICIEESPACIO';
  esp[84]='NUMINVENTARIOESPACIO=>NUMINVENTARIOESPACIO';
  esp[85]='Código de la Titulación=>Código de la Titulación';
  esp[86]='Nombre de la Titulación=>Nombre de la Titulación';
  esp[87]='Responsable de la Titulación=>Responsable de la Titulación';
  esp[88]='CODTITULACION=>CODTITULACION';
  esp[89]='NOMBRETITULACION=>NOMBRETITULACION';
  esp[90]='RESPONSABLETITULACION=>RESPONSABLETITULACION';
  esp[91]='Año Académico=>Año Académico';
  esp[92]='ANHOACADEMICO=>ANHOACADEMICO';
  esp[93]='DNI del profesor=>Dni del profesor';
  esp[94]='DESPACHO=>DESPACHO';
  esp[95]='PAS=>PAS';
  esp[96]='LABORATORIO=>LABORATORIO';
  esp[97]='El usuario ya existe=><img src=../View/Images/warning.png width=25>El usuario ya existe';
  esp[98]='Error de gestor de base de datos=><img src=../View/Images/warning.png width=25>Error de gestor de base de datos';
  esp[99]='Inserción fallida: el elemento ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: el elemento ya existe';
  esp[100]='Inserción realizada con éxito=><img src=../View/Images/success1.png width=25>Inserción realizada con éxito';
  esp[101]='Borrado realizado con éxito=><img src=../View/Images/success1.png width=25>Borrado realizado con éxito';
  esp[102]='Actualización realizada con éxito=><img src=../View/Images/success1.png width=25>Actualización realizada con éxito';
  esp[103]='El login no existe=><img src=../View/Images/warning.png width=25>El login no existe';
  esp[104]='La password para este usuario no es correcta=><img src=../View/Images/warning.png width=25>La password para este usuario no es correcta';
  esp[105]='Inserción fallida: no existe ese código de edificio=><img src=../View/Images/warning.png width=25>Inserción fallida: no existe ese código de edificio';
  esp[106]='Inserción fallida: no existe ese código de centro=><img src=../View/Images/warning.png width=25>Inserción fallida: no existe ese código de centro';
  esp[107]='Inserción fallida: no existe ese profesor=><img src=../View/Images/warning.png width=25>Inserción fallida: no existe ese profesor';
  esp[108]='Inserción fallida: el email ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: el email ya existe';
  esp[109]='Inserción fallida: el DNI ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: el DNI ya existe';
  esp[110]='Inserción fallida: no existe esa titulación=><img src=../View/Images/warning.png width=25>Inserción fallida: no existe esa titulación';
  esp[111]='Inserción fallida: no existe ese espacio=><img src=../View/Images/warning.png width=25>Inserción fallida: no existe ese espacio';
  esp[112]='Borrado fallido: existe un profesor asociado e este espacio=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asociado e este espacio';
  esp[113]='Borrado fallido: existen titulaciones asignadas a ese centro=><img src=../View/Images/warning.png width=25>Borrado fallido: existen titulaciones asignadas a ese centro';
  esp[114]='Borrado fallido: existen centros asignados a ese edificio=><img src=../View/Images/warning.png width=25>Borrado fallido: existen centros asignados a ese edificio';
  esp[115]='Borrado fallido: existe un profesor asignado a esta titulacion=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asignado a esta titulacion';
  esp[116]='Borrado fallido: existe un profesor asignado a este espacio=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asignado a este espacio';
  esp[117]='Inserción fallida: Ya existe una imagen con ese nombre=><img src=../View/Images/warning.png width=25>Inserción fallida: Ya existe una imagen con ese nombre';
  esp[118]='Inserción fallida: La imagen es demasiado pesada=><img src=../View/Images/warning.png width=25>Inserción fallida: La imagen es demasiado pesada';
  esp[119]='Error: Imagen no subida=><img src=../View/Images/warning.png width=25>Error: Imagen no subida';




//Defino el array que contiene las traduciones del gallego
  var gal = [];
  gal[0]='Portal de Gestión=>Portal Xestión';
  gal[1]='Usuario no autenticado=>Usuario non autenticado';
  gal[2]='Creado por Alejandro Gómez González el 28/10/2019=>Creado por Alejandro Gómez González o 28/10/2019';
  gal[3]='Login=>Login';
  gal[4]='Registrar=>Rexistrar';
  gal[5]='Nombre=>Nome';
  gal[6]='Password=>Contrasinal';
  gal[7]='Apellidos=>Apelidos';
  gal[8]='DNI=>DNI';
  gal[9]='Email=>Email';
  gal[10]='Teléfono=>Teléfono';
  gal[11]='Foto Personal=>Foto Persoal';
  gal[12]='Fecha Nacimiento=>Data Nacemento';
  gal[13]='Sexo=>Sexo';
  gal[14]='Seleccionar Archivo=>Escoller Arquivo'
  gal[15]='Registro=>Rexistro';
  gal[16]='Profesores=>Profesores';
  gal[17]='Centros=>Centros';
  gal[18]='Edificios=>Edificios';
  gal[19]='Espacios=>Espazos';
  gal[20]='Titulaciones=>Titulacións';
  gal[21]='Prof_Titulaciones=>Prof_Titulacións';
  gal[22]='Prof_Espacios=>Prof_Espazos';
  gal[23]='SEARCH=>BUSCAR';
  gal[24]='Usuarios=>Usuarios';
  gal[25]='Usuario=>Usuario';
  gal[26]='BIENVENIDO A PORTAL DE GESTIÓN=>BENVENIDO Ó PORTAL DE XESTIÓN';
  gal[27]='Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad=>Pincha no menú superior e accede as diferentes entidades para así poder facer Altas, Baixas, Modificacións y Consultas sobre a universidade';
  gal[28]='login=>login';
  gal[29]='nombre=>nome';
  gal[30]='password=>password';
  gal[31]='apellidos=>apelidos';
  gal[32]='DNI=>DNI';
  gal[34]='email=>email';
  gal[35]='telefono=>telefono';
  gal[36]='fotopersonal=>fotopersoal';
  gal[37]='FechaNacimiento=>FechaNacemento';
  gal[38]='sexo=>sexo';
  gal[39]='ADD=>ENGADIR';
  gal[40]='SHOWALL=>VER TODOS';
  gal[41]='SHOWCURRENT=>DETALLES';
  gal[42]='DETALLE=>DETALLE';
  gal[43]='EDITAR=>EDITAR';
  gal[44]='EDIT=>EDITAR';
  gal[45]='BORRAR=>BORRAR';
  gal[46]='HOMBRE=>HOME';
  gal[47]='MUJER=>MULLER';
  gal[48]='TODOS=>TODOS';
  gal[49]='Actualización1 realizada con éxito=><img src=../View/Images/success1.png width=25> Actualización feita con éxito';
  gal[50]='Inicio=>Inicio';
  gal[51]='Área=>Área';
  gal[52]='Departamento=>Departamento';
  gal[53]='NOMBREPROFESOR=>NOMBREPROFESOR';
  gal[54]='APELLIDOSPROFESOR=>APELLIDOSPROFESOR';
  gal[55]='AREAPROFESOR=>AREAPROFESOR';
  gal[56]='DEPARTAMENTOPROFESOR=>DEPARTAMENTOPROFESOR';
  gal[57]='Ver espacios asignados=>Ver espazos asignados';
  gal[58]='Ver titulaciones asignadas=>Ver titulacións asignadas';
  gal[59]='Ver centros asignados=>Ver centros asignados';
  gal[60]='Ver profesores asignados=>Ver profesores asignados';
  gal[61]='Código del Edificio=>Código do Edificio';
  gal[62]='Nombre del Edificio=>Nome do Edificio';
  gal[63]='Dirección del Edificio=>Dirección do Edificio';
  gal[64]='Campus del Edificio=>Campus do Edificio';
  gal[65]='Código del Centro=>Código do Centro';
  gal[66]='Nombre del Centro=>Nome do Centro';
  gal[67]='Dirección del Centro=>Dirección do Centro';
  gal[68]='Responsable del Centro=>Responsable do Centro';
  gal[69]='CODEDIFICIO=>CODEDIFICIO';
  gal[70]='NOMBREEDIFICIO=>NOMEEDIFICIO';
  gal[71]='DIRECCIONEDIFICIO=>DIRECCIONEDIFICIO';
  gal[72]='CAMPUSEDIFICIO=>CAMPUSEDIFICIO';
  gal[73]='CODCENTRO=>CODCENTRO';
  gal[74]='NOMBRECENTRO=>NOMECENTRO';
  gal[75]='DIRECCIONCENTRO=>DIRECCIONCENTRO';
  gal[76]='RESPONSABLECENTRO=>RESPONSABLECENTRO';
  gal[77]='Código del Espacio=>Código do Espazo';
  gal[78]='Tipo=>Tipo';
  gal[79]='Superficie del Espacio=>Superficie do Espazo';
  gal[80]='Núm. inventario del Espacio=>Núm. inventario do Espazo';
  gal[81]='CODESPACIO=>CODESPAZO';
  gal[82]='TIPO=>TIPO';
  gal[83]='SUPERFICIEESPACIO=>SUPERFICIEESPAZO';
  gal[84]='NUMINVENTARIOESPACIO=>NUMINVENTARIOESPAZO'
  gal[85]='Código de la Titulación=>Código da Titulación';
  gal[86]='Nombre de la Titulación=>Nome da Titulación';
  gal[87]='Responsable de la Titulación=>Responsable da Titulación';
  gal[88]='CODTITULACION=>CODTITULACION';
  gal[89]='NOMETITULACION=>NOMETITULACION';
  gal[90]='RESPONSABLETITULACION=>RESPONSABLETITULACION';
  gal[91]='Ano Académico=>Ano Académico';
  gal[92]='ANOACADEMICO=>ANOACADEMICO';
  gal[93]='DNI del profesor=>Dni do profesor';
  gal[94]='DESPACHO=>DESPACHO';
  gal[95]='PAS=>PAS';
  gal[96]='LABORATORIO=>LABORATORIO';
  gal[97]='El usuario ya existe=><img src=../View/Images/warning.png width=25>O usuario xa existe';
  gal[98]='Error de gestor de base de datos=><img src=../View/Images/warning.png width=25>Erro do gestor de base de datos';
  gal[99]='Inserción fallida: el elemento ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: o elemento xa existe';
  gal[100]='Inserción realizada con éxito=><img src=../View/Images/success1.png width=25>Inserción realizada con éxito';
  gal[101]='Borrado realizado con éxito=><img src=../View/Images/success1.png width=25>Borrado realizado con éxito';
  gal[102]='Actualización realizada con éxito=><img src=../View/Images/success1.png width=25>Actualización realizada con éxito';
  gal[103]='El login no existe=><img src=../View/Images/warning.png width=25>El login non existe';
  gal[104]='La password para este usuario no es correcta=><img src=../View/Images/warning.png width=25>A password para este usuario non é correcta';
  gal[105]='Inserción fallida: no existe ese código de edificio=><img src=../View/Images/warning.png width=25>Inserción fallida: non existe ese código de edificio';
  gal[106]='Inserción fallida: no existe ese código de centro=><img src=../View/Images/warning.png width=25>Inserción fallida: non existe ese código de centro';
  gal[107]='Inserción fallida: no existe ese profesor=><img src=../View/Images/warning.png width=25>Inserción fallida: non existe ese profesor';
  gal[108]='Inserción fallida: el email ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: o email xa existe';
  gal[109]='Inserción fallida: el DNI ya existe=><img src=../View/Images/warning.png width=25>Inserción fallida: o DNI xa existe';
  gal[110]='Inserción fallida: no existe esa titulación=><img src=../View/Images/warning.png width=25>Inserción fallida: non existe esa titulación';
  gal[111]='Inserción fallida: no existe ese espacio=><img src=../View/Images/warning.png width=25>Inserción fallida: non existe ese espacio';
  gal[112]='Borrado fallido: existe un profesor asociado e este espacio=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asociado e este espazo';
  gal[113]='Borrado fallido: existen titulaciones asignadas a ese centro=><img src=../View/Images/warning.png width=25>Borrado fallido: existen titulacións asignadas a ese centro';
  gal[114]='Borrado fallido: existen centros asignados a ese edificio=><img src=../View/Images/warning.png width=25>Borrado fallido: existen centros asignados a ese edificio';
  gal[115]='Borrado fallido: existe un profesor asignado a esta titulacion=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asignado a esta titulación';
  gal[116]='Borrado fallido: existe un profesor asignado a este espacio=><img src=../View/Images/warning.png width=25>Borrado fallido: existe un profesor asignado a este espazo';
  gal[117]='Inserción fallida: Ya existe una imagen con ese nombre=><img src=../View/Images/warning.png width=25>Inserción fallida: Xa existe una imaxe con ese nome';
  gal[118]='Inserción fallida: La imagen es demasiado pesada=><img src=../View/Images/warning.png width=25>Inserción fallida: A imaxe é demasiado pesada';
  gal[119]='Error: Imagen no subida=><img src=../View/Images/warning.png width=25>Erro: Imaxen non subida';




//Defino el array que contiene las traduciones del inglés
  var eng = [];
  eng[0]='Portal de Gestión=>Management Website';
  eng[1]='Usuario no autenticado=>User not logged';
  eng[2]='Creado por Alejandro Gómez González el 28/10/2019=>Created by Alejandro Gómez González at 28/10/2019';
  eng[3]='Login=>Login';
  eng[4]='Registrar=>Register';
  eng[5]='Nombre=>Name';
  eng[6]='Password=>Password';
  eng[7]='Apellidos=>Surnames';
  eng[8]='DNI=>ID Card Number';
  eng[9]='Email=>Email';
  eng[10]='Teléfono=>Phone';
  eng[11]='Foto Personal=>Personal Picture';
  eng[12]='Fecha Nacimiento=>Born Date';
  eng[13]='Sexo=>Sex';
  eng[14]='Seleccionar Archivo=>Select File'
  eng[15]='Registro=>Sign In';
  eng[16]='Usuarios=>Users';
  eng[17]='Profesores=>Professors';
  eng[18]='Centros=>Centers';
  eng[19]='Edificios=>Buildings';
  eng[20]='Espacios=>Espaces';
  eng[21]='Titulaciones=>Academic degree';
  eng[22]='Prof_Titulaciones=>Prof_Degrees';
  eng[23]='Prof_Espacios=>Prof_Spaces';
  eng[24]='SEARCH=>SEARCH';
  eng[25]='Usuario=>User';
  eng[26]='BIENVENIDO A PORTAL DE GESTIÓN=>WELCOME TO GESTION PORTAL';
  eng[27]='Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad=>Click on the top menu to access the different entities and do Adds, Deletes, Edits and Consults about the university';
  eng[28]='login=>login';
  eng[29]='nombre=>name';
  eng[30]='password=>password';
  eng[31]='apellidos=>surnames';
  eng[32]='DNI=>ID Card Number';
  eng[33]='email=>email';
  eng[34]='telefono=>phone';
  eng[35]='fotopersonal=>personalpicture';
  eng[36]='FechaNacimiento=>BornDate';
  eng[37]='sexo=>sex';
  eng[38]='Registro=>Sign In';
  eng[39]='ADD=>ADD';
  eng[40]='SHOWALL=>SHOW ALL';
  eng[41]='SHOWCURRENT=>VIEW DETAILS';
  eng[42]='DETALLE=>DETAIL';
  eng[43]='EDITAR=>EDIT';
  eng[44]='EDIT=>EDIT';
  eng[45]='BORRAR=>DELETE';
  eng[46]='HOMBRE=>MAN';
  eng[47]='MUJER=>WOMAN';
  eng[48]='TODOS=>ALL';
  eng[49]='Actualización realizada1 con éxito=><img src=../View/Images/success1.png width=25> Update done';
  eng[50]='Inicio=>Home';
  eng[51]='Área=>Area';
  eng[52]='Departamento=>Department';
  eng[53]='NOMBREPROFESOR=>PROFESSORNAME';
  eng[54]='APELLIDOSPROFESOR=>PROFESSORSURNAMES';
  eng[55]='AREAPROFESOR=>PROFESSORAREA';
  eng[56]='DEPARTAMENTOPROFESOR=>PROFESSORDEPARTMENT';
  eng[57]='Ver espacios asignados=>See assigned spaces';
  eng[58]='Ver titulaciones asignadas=>See assigned degrees';
  eng[59]='Ver centros asignados=>See assigned centers';
  eng[60]='Ver profesores asignados=>See assigned professors';
  eng[61]='Código del Edificio=>Building Code';
  eng[62]='Nombre del Edificio=>Building Name';
  eng[63]='Dirección del Edificio=>Building Address';
  eng[64]='Campus del Edificio=>Building Campus';
  eng[65]='Código del Centro=>Center Code';
  eng[66]='Nombre del Centro=>Center Name';
  eng[67]='Dirección del Centro=>Center Address';
  eng[68]='Responsable del Centro=>Center Manager';
  eng[69]='CODEDIFICIO=>BUILDINGCODE';
  eng[70]='NOMBREEDIFICIO=>BUILDINGNAME';
  eng[71]='DIRECCIONEDIFICIO=>BUILDINGADDRESS';
  eng[72]='CAMPUSEDIFICIO=>BUILDINGCAMPUS';
  eng[73]='CODCENTRO=>CENTERCODE';
  eng[74]='NOMBRECENTRO=>CENTERNAME';
  eng[75]='DIRECCIONCENTRO=>CENTERADDRESS';
  eng[76]='RESPONSABLECENTRO=>CENTERMANAGER';
  eng[77]='Código del Espacio=>Espace Code';
  eng[78]='Tipo=>Type';
  eng[79]='Superficie del Espacio=>Espace Surface';
  eng[80]='Núm. inventario del Espacio=>Espace inventory number';
  eng[81]='CODESPACIO=>ESPACECODE';
  eng[82]='TIPO=>TYPE';
  eng[83]='SUPERFICIEESPACIO=>ESPACESURFACE';
  eng[84]='NUMINVENTARIOESPACIO=>ESPACEINVENTORYNUM';
  eng[85]='Código de la Titulación=>Degree Code';
  eng[86]='Nombre de la Titulación=>Degree Name';
  eng[87]='Responsable de la Titulación=>Degree Manager';
  eng[88]='CODTITULACION=>DEGREECODE';
  eng[89]='NOMBRETITULACION=>DEGREENAME';
  eng[90]='RESPONSABLETITULACION=>DEGREEMANAGER';
  eng[91]='Año Académico=>Academic Year';
  eng[92]='ANHOACADEMICO=>ACADEMICYEAR';
  eng[93]='DNI del profesor=>Professor ID Card Number';
  eng[94]='DESPACHO=>OFFICE';
  eng[95]='PAS=>PAS';
  eng[96]='LABORATORIO=>LABORATORY';

  eng[97]='El usuario ya existe=><img src=../View/Images/warning.png width=25>User already exist';
  eng[98]='Error de gestor de base de datos=><img src=../View/Images/warning.png width=25>Error in the database manager';
  eng[99]='Inserción fallida: el elemento ya existe=><img src=../View/Images/warning.png width=25>Insertion failed: item already exists';
  eng[100]='Inserción realizada con éxito=><img src=../View/Images/success1.png width=25>Success insert';
  eng[101]='Borrado realizado con éxito=><img src=../View/Images/success1.png width=25>Delete succesfully';
  eng[102]='Actualización realizada con éxito=><img src=../View/Images/success1.png width=25>Update succesfully';
  eng[103]='El login no existe=><img src=../View/Images/warning.png width=25>The login dont exists';
  eng[104]='La password para este usuario no es correcta=><img src=../View/Images/warning.png width=25>Incorrect password for this login';
  eng[105]='Inserción fallida: no existe ese código de edificio=><img src=../View/Images/warning.png width=25>Insertion failed: this building code does not exist';
  eng[106]='Inserción fallida: no existe ese código de centro=><img src=../View/Images/warning.png width=25>Insertion failed: this center code does not exist';
  eng[107]='Inserción fallida: no existe ese profesor=><img src=../View/Images/warning.png width=25>Insertion failed: this professor does not exist';
  eng[108]='Inserción fallida: el email ya existe=><img src=../View/Images/warning.png width=25>Insertion failed: this email already exists';
  eng[109]='Inserción fallida: el DNI ya existe=><img src=../View/Images/warning.png width=25>Insertion failed: this ID Car Number number already exists';
  eng[110]='Inserción fallida: no existe esa titulación=><img src=../View/Images/warning.png width=25>Insertion failed: this degree does not exis';
  eng[111]='Inserción fallida: no existe ese espacio=><img src=../View/Images/warning.png width=25>Insertion failed: this space code does not exist';
  eng[112]='Borrado fallido: existe un profesor asociado e este espacio=><img src=../View/Images/warning.png width=25>Deletion Failed: exists a professor associated to these space';
  eng[113]='Borrado fallido: existen titulaciones asignadas a ese centro=><img src=../View/Images/warning.png width=25>Deletion Failed: exists a degree associated to these centero';
  eng[114]='Borrado fallido: existen centros asignados a ese edificio=><img src=../View/Images/warning.png width=25>Deletion Failed: exists a center associated to these buildingio';
  eng[115]='Borrado fallido: existe un profesor asignado a esta titulacion=><img src=../View/Images/warning.png width=25>Deletion Failed: exists a professor associated to these degree';
  eng[116]='Borrado fallido: existe un profesor asignado a este espacio=><img src=../View/Images/warning.png width=25>Deletion Failed: exists a professor associated to these space';
  eng[117]='Inserción fallida: Ya existe una imagen con ese nombre=><img src=../View/Images/warning.png width=25>Insertion failed: Already exists a image with this name';
  eng[118]='Inserción fallida: La imagen es demasiado pesada=><img src=../View/Images/warning.png width=25>Insertion failed: The image exceed the size';
  eng[119]='Error: Imagen no subida=><img src=../View/Images/warning.png width=25>Error: Image no upload';



//Esta función cambia el valor de la cookie de idioma, si es neceario, para mentener le idioma entre páginas
function cambioIdioma(idioma=''){
  if (idioma === '') {
        if (getCookie('idioma') != '') {
          idioma = getCookie('idioma');
        }
        else {
          idioma = 'es';
        }
      }

//Asignamos a la cookie idioma el valor actual de idioma:
setCookie('idioma', idioma, 1);

  //Invoco la carga del idioma
 loadLang(idioma);
  
  //Cargo el array de traduciones según la entrada proporcionada
  function loadLang(lang){
     var arr=[];
    switch(lang){
      case 'es':
          arr=esp;
          break;
      case 'en':
      arr=eng;
      break;
      case 'gl':
       arr=gal;
      break;
    }
    //Invoco el procesado del array del idioma
    processLang(arr);
//Esta funcion recorre el array de traduciones, los procesa y sirve como entrada para asignar el texto a cada elemento html
    function processLang(data){
      for(var i in arr){
        if( lineValid(arr[i]) ){
          var obj = arr[i].split('=>');
          assignText(obj[0], obj[1]);
          cambiarValorBotones(obj[0],obj[1]);
        }
      }
    };


//Esta función lo que hace es cambiar el valor del elemento HTML comparando el valor del campo data-lang (clave) 
//con el valor de la clave del array de idioma, si coincide cambia el innerHTML por el valor asociado a esa clave

    function assignText(key, value){
      $('[data-lang="'+key+'"]').each(function(){
        var attr = $(this).attr('data-destine');
        if(typeof attr !== 'undefined'){
          $(this).attr(attr, value);
        }else{
          $(this).html(value);
        }
      });

    };

//Esta función hace lo mismo que la anterior pero SOLO para los botones
    function cambiarValorBotones(key,valor){

      var inputs = document.getElementsByTagName('input');
        for(var i=0; i<inputs.length; i++){
      if(inputs[i].getAttribute('type')=='submit'){
        if(inputs[i].getAttribute('id')==key){
           document.getElementById(key).value=valor;
        }
        }
          }
    };

    //Esta función comprueba que las diferentes posisciones del array de idioma, y por tanto traducciones, esten
    //bien construidas
    function lineValid(line){
      return (line.trim().length > 0);
    };


    $('.loading-lang').addClass('show');

   
  };  

}

//Esta función sirve para cambiar el valor de la COOKIE de idioma
function setCookie(cname, cvalue, exdays) {
  var d = new Date(); //fecha de expiración de la cookie.
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  //Variable que contiene la cadena que indica cuando expira la cookie:
  var expires = "expires="+ d.toUTCString(); 
  //Añadimos la cookie.
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//FUNCIÓN: getCookie
//DESCRIPCIÓN: obtiene el valor de la cookie pasada por parámetro.
function getCookie(cname) {
  var name = cname + "="; //Cadena que indica el nombre de la cookie.
  var decodedCookie = decodeURIComponent(document.cookie); //obtenemos la info de cookies.
  var ca = decodedCookie.split(';'); //separamos las cookies por el ';', generando un array.
  //Recorremos el array de cookies:
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i]; //Cookie actual:
    //Iteramos hasta encontrar un caracter distinto al espacio:
    while (c.charAt(0) == ' ') {
      c = c.substring(1); //reasignamos la cookie ignorando el primer char.
    }
    //Cuando el nombre de nuestra cookie esté al comienzo de la cadena, detenemos el bucle: 
    if (c.indexOf(name) == 0) {
      //Devolvemos el valor de la cookie:
      return c.substring(name.length, c.length);
    }
  }
  //Si no la encontramos, devolvemos vacío:
  return "";
}