<?php

//Clase : ESPACIO_SEARCH_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para buscar un ESPACIO

	class ESPACIO_SEARCH{


		
		/*function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}*/

		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SEARCH'>BUSCAR</h1></center>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarLongitud('CODESPACIO')&&comprobarLongitud('CODEDIFICIO')&&comprobarLongitud('CODCENTRO')&&comprobarEntero_busq('SUPERFICIEESPACIO')&&comprobarEntero_busq('NUMINVENTARIOESPACIO');">

					<p data-lang='Código del Espacio'>Código del Espacio</p><input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODESPACIO')" ><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODEDIFICIO')" ><br>
					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarLongitud('CODCENTRO')" ><br>
					<p data-lang='Tipo'>Tipo</p><select name="TIPO" id='TIPO'>
				<option value="" data-lang='TODOS'>TODOS</option> 
  				<option value="DESPACHO" data-lang='DESPACHO'>DESPACHO</option> 
   				<option value="LABORATORIO" data-lang='LABORATORIO'>LABORATORIO</option> 
   				<option value="PAS" data-lang='PAS'>PAS</option>
				</select><br>
					<p data-lang='Superficie del Espacio'>Superficie del Espacio</p><input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarEntero_busq('SUPERFICIEESPACIO')" ><br>
					<p data-lang='Núm. inventario del Espacio'>Núm. inventario del Espacio</p><input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarEntero_busq('NUMINVENTARIOESPACIO')" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-search" value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	