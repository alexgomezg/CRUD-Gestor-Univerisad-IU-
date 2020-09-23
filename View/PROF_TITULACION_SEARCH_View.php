<?php

//Clase : PROF_TITULACION_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un PROF_TITULACION
	class PROF_TITULACION_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarLongitud('DNI',9)&&comprobarLongitud('CODTITULACION',10)&&comprobarEntero_busq('ANHOACADEMICO',1970,devolverAnhoActual()+10);">

					 <p data-lang='DNI del profesor'>DNI del profesor</p><input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('DNI',9)" ><br>
			
					<p data-lang='Código de la Titulación'>Código de la Titulación</p><input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODTITULACION',10)" ><br>
				
					<p data-lang='Año Académico'>Año Académico</p><input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '' onblur=" comprobarEntero_busq('ANHOACADEMICO',1970,devolverAnhoActual()+10)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	