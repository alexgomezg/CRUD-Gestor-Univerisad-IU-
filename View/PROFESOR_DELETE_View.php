<?php

//Clase : PROFESOR_DELETE_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del PROFESOR que se va a borrar

	class PROFESOR_DELETE{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='BORRAR'>BORRAR</h1></center>
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>
			
				 	<p data-lang='DNI'>DNI</p><input type = 'text' name = 'dni' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>'readonly><br>
					<p data-lang='Nombre'>Nombre</p><input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
					<p data-lang='Apellidos'>Apellidos</p><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
					<p data-lang='Área'>Área</p><input type = 'text' name = 'area' id = 'area' placeholder = '' size = '50' value = '<?php echo $this->tupla['AREAPROFESOR']; ?>' readonly><br>
					 <p data-lang='Departamento'>Departamento</p><input type = 'text' name = 'departamento' id = 'departamento' placeholder = '' size = '50' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>'readonly><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-delete" value='DELETE'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	