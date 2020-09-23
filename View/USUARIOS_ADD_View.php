<?php

//Clase : Usuarios_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un Usuarios
	class USUARIOS_ADD{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>
			<form name = 'Form' method='post' action='../Controller/USUARIOS_Controller.php' enctype="multipart/form-data" onsubmit=" return comprobar_entrada_usuarios()">
			
				 	<p data-lang='Login'>Login</p>
				 	<input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '' onblur="comprobarVacio('login')  && comprobarAlfabetico('login',15)" required>
				 	<p data-lang='Password'>Password</p>
					 <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '' onblur="comprobarVacio('password')  && comprobarAlfabetico('password',128)" ><br>
					<p data-lang='DNI'>DNI</p> <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" required><br>
					<p data-lang='Nombre'>Nombre</p> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30)" ><br>
					<p data-lang='Apellidos'>Apellidos</p> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50)" ><br>
					<p data-lang='Email'>Email</p> <input type = 'text' name = 'email' id = 'email' size = '40' value = '' onblur="comprobarVacio('email')  && comprobarEmail('email')" required><br>
					<p data-lang='Teléfono'>Teléfono</p> <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '' onblur="comprobarVacio('telefono')  && comprobarTelefono('telefono')" ><br>
					<p data-lang='Fecha Nacimiento'>Fecha Nacimiento</p>
					<input type="text" name="FechaNacimiento" class="tcal tcalInput" value="" id="FechaNacimiento" readonly >
					<br>
					<p data-lang='Foto Personal'>Foto Personal</p>
					<br>
					<input type="file" name="fotopersonal" id="fotopersonal" class="inputfile inputfile-1"/>
					<label for="fotopersonal" id="fichero">
					<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
					<span class="iborrainputfile" data-lang='Seleccionar Archivo'>Seleccionar Archivo</span>
					</label>



					<p data-lang='Sexo'>Sexo</p>
				
						<select name="sexo" id='sexo'>
  								<option value="1" data-lang="HOMBRE">HOMBRE</option> 
   								<option value="2" data-lang="MUJER">MUJER</option> 
							</select>



<script type="text/javascript">document.getElementById('fotopersonal').onchange = function () {
  console.log(this.value);
  document.getElementById('fichero').innerHTML = document.getElementById('fotopersonal').files[0].name;
}</script>



					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

		</form>

		









				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';

		} //fin metodo render

	} //fin REGISTER


	?>