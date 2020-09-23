<?php

//Clase : PROFESOR_SHOCURRENT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Muestra los valores de un PROFESOR pasado como parámetro

	class PROFESOR_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SHOWCURRENT'>DETALLES</h1></center>
			<form name = 'show_debil' id="show_debil" action='' method='post'>
			
				 	<p data-lang='DNI'>DNI</p><input type = 'text' name = 'dni' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>'readonly><br>
					<p data-lang='Nombre'>Nombre</p><input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
					<p data-lang='Apellidos'>Apellidos</p><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
					<p data-lang='Área'>Área</p><input type = 'text' name = 'area' id = 'area' placeholder = '' size = '50' value = '<?php echo $this->tupla['AREAPROFESOR']; ?>' readonly><br>
					 <p data-lang='Departamento'>Departamento</p><input type = 'text' name = 'departamento' id = 'departamento' placeholder = '' size = '50' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>'readonly><br>
					<br><br>
					<input type='submit' name='action' id='Ver espacios asignados' class="btn btn-show" value='Ver espacios asignados' onclick="ir_a_option1('../Controller/PROF_ESPACIO_Controller.php?action=SEARCH&','DNI','<?php echo $this->tupla['DNI']; ?>');">
					<br><br>
					<input type='submit' name='action' id='Ver titulaciones asignadas' class="btn btn-show" value='Ver titulaciones asignadas' onclick="ir_a_option2('../Controller/PROF_TITULACION_Controller.php?action=SEARCH&','DNI','<?php echo $this->tupla['DNI']; ?>');">
		
			</form>

			<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	