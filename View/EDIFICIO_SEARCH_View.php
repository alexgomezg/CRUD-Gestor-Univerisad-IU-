<?php

//Clase : EDIFICIO_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un EDIFICIO

	class EDIFICIO_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobarAlfabetico_busq('NOMBREEDIFICIO',50)&&comprobarAlfabetico_busq('CAMPUSEDIFICIO',10)&&comprobarLongitud('DIRECCIONEDIFICIO',150)&&comprobarLongitud('CODEDIFICIO',10)">
			
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODEDIFICIO',10)"><br>
					<p data-lang='Nombre del Edificio'>Nombre del Edificio</p><input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('NOMBREEDIFICIO',50)"><br>
					<p data-lang='Dirección del Edificio'>Dirección del Edificio</p><input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('DIRECCIONEDIFICIO',150)" ><br>
					<p data-lang='Campus del Edificio'>Campus del Edificio</p><input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('CAMPUSEDIFICIO',10)" ><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
