<?php

//Clase : EDIFICIO_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un EDIFICIO

	class EDIFICIO_ADD{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_entrada_edificios();">
			
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('CODEDIFICIO')  && comprobarCodigo('CODEDIFICIO',10)" required><br>
					<p data-lang='Nombre del Edificio'>Nombre del Edificio</p><input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('NOMBREEDIFICIO')  && comprobarAlfabetico('NOMBREEDIFICIO',50)" ><br>
					<p data-lang='Dirección del Edificio'>Dirección del Edificio</p><input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('DIRECCIONEDIFICIO')&&comprobarDireccion('DIRECCIONEDIFICIO',150)" ><br>
					<p data-lang='Campus del Edificio'>Campus del Edificio</p><input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('CAMPUSEDIFICIO')  && comprobarAlfabetico('CAMPUSEDIFICIO',10)" ><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	