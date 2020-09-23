<?php

//Clase : USUARIOS_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un USUARIO

	class USUARIOS_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_busq_usuarios()">
			
				 	<p data-lang='Login'>Login</p> <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '' onblur="comprobarLongitud('login',15)"><br>
					<p data-lang='Password'>Password</p> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '' onblur="comprobarLongitud('password',128)"><br>
					<p data-lang='DNI'>DNI</p> <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '30' value = '' onblur="comprobarLongitud('DNI',15)"><br>
					<p data-lang='Nombre'>Nombre</p> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="comprobarAlfabetico_busq('nombre',30)"><br>
					<p data-lang='Apellidos'>Apellidos</p> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('apellidos',50)"><br>
					<p data-lang='Email'>Email</p> <input type = 'text' name = 'email' id = 'email' size = '40' value = '' onblur="comprobarLongitud('email',60)"><br>
					<p data-lang='Teléfono'>Teléfono</p> <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '' onblur="comprobarLongitud('telefono',11)"><br>
					<p data-lang='Fecha Nacimiento'>Fecha Nacimiento</p> <input type="text" name="FechaNacimiento" class="tcal tcalInput" value="" id="FechaNacimiento" readonly >
					<br>
					<p data-lang='Foto Personal'>Foto Personal</p><input type = 'text' name = 'fotopersonal' id = 'fotopersonal' size = '40' value = '' onblur="comprobarLongitud('fotopersonal',50)"><br>

					<p data-lang='Sexo'>Sexo</p><select name="sexo" id='sexo'>
								<option value="" data-lang='TODOS'>TODOS</option> 
  								<option value="HOMBRE" data-lang='HOMBRE'>HOMBRE</option> 
   								<option value="MUJER" data-lang='MUJER'>MUJER</option> 
							</select><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	