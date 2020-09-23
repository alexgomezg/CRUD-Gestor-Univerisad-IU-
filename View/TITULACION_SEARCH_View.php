<?php

//Clase : TITULACION_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un TITULACION

	class TITULACION_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarLongitud('CODTITULACION',10)&&comprobarLongitud('CODCENTRO',10)&&comprobarAlfabetico_busq('NOMBRETITULACION',50)&&comprobarAlfabetico_busq('RESPONSABLETITULACION',60);">
			
				 	<p data-lang='Código de la Titulación'>Código de la Titulación</p><input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODTITULACION',10)" ><br>
					
					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODCENTRO',10)"><br>

					<p data-lang='Nombre de la Titulación'>Nombre de la Titulación</p><input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('NOMBRETITULACION',50)" ><br>

					<p data-lang='Responsable de la Titulación'>Responsable de la Titulación</p><input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('RESPONSABLETITULACION',60)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	