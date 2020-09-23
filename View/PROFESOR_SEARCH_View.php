<?php

//Clase : PROFESOR_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un PORFESOR

	class PROFESOR_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarAlfabetico_busq('nombre',30)&&comprobarAlfabetico_busq('apellidos',50)&&comprobarAlfabetico_busq('departamento',60)&&comprobarAlfabetico_busq('area',60)&&comprobarLongitud('dni',9);">
			
				    <p data-lang='DNI'>DNI</p><input type = 'text' name = 'dni' id = 'dni' placeholder = '' size = '9' value = '' onblur="comprobarLongitud('dni',9)"><br>
					<p data-lang='Nombre'>Nombre</p><input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="comprobarAlfabetico_busq('nombre',30)" ><br>
					<p data-lang='Apellidos'>Apellidos</p> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('apellidos',50)" ><br>
					<p data-lang='Área'>Área</p><input type = 'text' name = 'area' id = 'area' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('area',60)"><br>
					<p data-lang='Departamento'>Departamento</p><input type = 'text' name = 'departamento' id = 'departamento' placeholder = '' size = '50' value = '' onblur="comprobarAlfabetico_busq('departamento',60)"><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	