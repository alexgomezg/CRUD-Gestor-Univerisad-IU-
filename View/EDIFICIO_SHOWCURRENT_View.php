<?php

//Clase : EDIFICIO_SHOCURRENT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Muestra los valores de un EDIFICIO pasado como parámetro

	class EDIFICIO_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SHOWCURRENT'>DETALLES</h1></center>
			<form name = 'show_debil' id='show_debil' action='' method='post'>
			
				 	<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					<p data-lang='Nombre del Edificio'>Nombre del Edificio</p><input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					<p data-lang='Dirección del Edificio'>Dirección del Edificio</p><input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' onblur="esNoVacio('area')  && comprobarSoloLetras('area',50)" readonly ><br>
					<p data-lang='Campus del Edificio'>Campus del Edificio</p><input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' onblur="esNoVacio('departamento')  && comprobarSoloLetras('departamento',50)" readonly><br>
					<br><br>
					<input type='submit' id='Ver centros asignados' name='action' class="btn btn-show" value='Ver centros asignados' onclick="ir_a_option1('../Controller/CENTRO_Controller.php?action=SEARCH&','CODEDIFICIO','<?php echo $this->tupla['CODEDIFICIO']; ?>');">
					<br><br>
					<input type='submit' id='Ver espacios asignados' name='action' class="btn btn-show" value='Ver espacios asignados' onclick="ir_a_option2('../Controller/ESPACIO_Controller.php?action=SEARCH&','CODEDIFICIO','<?php echo $this->tupla['CODEDIFICIO']; ?>');">
			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>