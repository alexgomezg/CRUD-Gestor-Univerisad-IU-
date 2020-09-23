<?php

//Clase : USUARIO_SHOCURRENT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Muestra los valores de un USUARIO pasado como parámetro

	class USUARIOS_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SHOWCURRENT'>DETALLES</h1></center>
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'>
				
					<p data-lang='Login'>Login</p> <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '<?php echo $this->tupla['login']; ?>'readonly><br>

					<p data-lang='Password'>Password</p> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '<?php echo $this->tupla['password']; ?>' readonly><br>

					<p data-lang='DNI'>DNI</p> <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '30' value = '<?php echo $this->tupla['DNI']; ?>'readonly><br>

					<p data-lang='Nombre'>Nombre</p> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['nombre']; ?>'readonly><br>

					<p data-lang='Apellidos'>Apellidos</p> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>'readonly><br>

					<p data-lang='Email'>Email</p> <input type = 'text' name = 'email' id = 'email' placeholder = '' size = '50' value = '<?php echo $this->tupla['email']; ?>'readonly><br>

					<p data-lang='Teléfono'>Teléfono</p> <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '50' value = '<?php echo $this->tupla['telefono']; ?>'readonly><br>

					<p data-lang='Fecha Nacimiento'>Fecha Nacimiento</p> <input type = 'text' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '<?php echo $this->tupla['FechaNacimiento']; ?>'readonly><br>

					<p data-lang='Foto Personal'>Foto Personal</p>  <input type = 'text' name = 'fotopersonal' id = 'fotopersonal' size = '40' value = '<?php echo $this->tupla['fotopersonal']; ?>'readonly><br>

					<center><a href='../Files/<?php echo $this->tupla['fotopersonal']; ?>' target="_blank"><img src='../View/Images/picture.png' width="50" height="50"></a></center>

					<p data-lang='Sexo'>Sexo</p> <input type = 'text' name = 'sexo' id = 'sexo' size = '40' value = '<?php echo $this->tupla['sexo']; ?>'readonly><br>

		
			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	