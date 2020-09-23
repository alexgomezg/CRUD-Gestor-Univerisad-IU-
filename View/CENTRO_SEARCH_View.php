<?php

//Clase : CENTRO_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un CENTRO

	class CENTRO_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>SEARCH</h1></center>
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobarLongitud('CODCENTRO',10)&&comprobarLongitud('CODEDIFICIO',10)&&comprobarLongitud('DIRECCIONCENTRO',150)&&comprobarAlfabetico_busq('NOMBRECENTRO',50)&&comprobarAlfabetico_busq('RESPONSABLECENTRO',60);">
			
				 	<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODCENTRO',10)" ><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODEDIFICIO',10)" ><br>
					<p data-lang='Nombre del Centro'>Nombre del Centro</p><input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('NOMBRECENTRO',50)" ><br>
					<p data-lang='Dirección del Centro'>Dirección del Centro</p><input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('DIRECCIONCENTRO',150)" ><br>
					<p data-lang='Responsable del Centro'>Responsable del Centro</p><input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('RESPONSABLECENTRO',60)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	