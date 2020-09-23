<?php

//Clase : EDIFICIO_EDIT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del EDIFICIO y permite editarlos

	class EDIFICIO_EDIT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='EDITAR'>EDITAR</h1></center>
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_entrada_edificios();">
			
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
					<p data-lang='Nombre del Edificio'>Nombre del Edificio</p><input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' onblur="comprobarVacio('NOMBREEDIFICIO')  && comprobarAlfabetico('NOMBREEDIFICIO',50)"><br>
					<p data-lang='Dirección del Edificio'>Dirección del Edificio</p><input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>'  onblur="comprobarVacio('DIRECCIONEDIFICIO')&&comprobarDireccion('DIRECCIONEDIFICIO',150)"><br>
					<p data-lang='Campus del Edificio'>Campus del Edificio</p><input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' onblur="comprobarVacio('CAMPUSEDIFICIO')  && comprobarAlfabetico('CAMPUSEDIFICIO',10)"><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-edit" value='EDIT'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>