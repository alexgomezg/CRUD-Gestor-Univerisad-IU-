<?php

//Clase : PROFESOR_EDIT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del PROFESOR y permite editarlos

	class PROFESOR_EDIT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='EDITAR'>EDITAR</h1></center>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_entrada_profesores();">
			
				 	<p data-lang='DNI'>DNI</p><input type = 'text' name = 'dni' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>' onblur="comprobarVacio('dni')  && comprobarDni('dni')" readonly><br>
					<p data-lang='Nombre'>Nombre</p> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' onblur="comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30)"><br>
					<p data-lang='Apellidos'>Apellidos</p> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' onblur="comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50)"><br>
					<p data-lang='Área'>Área</p> <input type = 'text' name = 'area' id = 'area' placeholder = '' size = '50' value = '<?php echo $this->tupla['AREAPROFESOR']; ?>' onblur="comprobarVacio('area')  && comprobarAlfabetico('area',60)" ><br>
					<p data-lang='Departamento'>Departamento</p> <input type = 'text' name = 'departamento' id = 'departamento' placeholder = '' size = '50' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' onblur="comprobarVacio('departamento')  && comprobarAlfabetico('departamento',60)"><br>

					<br><br>

					<input type='submit' name='action' class="btn btn-edit" value='EDIT'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	