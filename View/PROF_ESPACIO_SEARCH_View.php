<?php

//Clase : PROF_ESPACIO_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un PROF_ESPACIO

	class PROF_ESPACIO_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarDNI('DNI')&&comprobarLongitud('CODESPACIO',10);">

					<p data-lang='DNI del profesor'>DNI del profesor</p><input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '50' value = '' onblur="comprobarDNI('DNI')" ><br>
			
					<p data-lang='Código del Espacio'>Código del Espacio</p><input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODESPACIO',10)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	