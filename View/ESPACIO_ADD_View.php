<?php

//Clase : ESPACIO_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un ESPACIO

	class ESPACIO_ADD{


		function __construct($CENTROS,$EDIFICIOS){
			$this->CENTROS = $CENTROS; //Variables que almacena los CENTROS que hay en la BD
			$this->EDIFICIOS = $EDIFICIOS; //Variables que almacena los edificios que hay en la BD
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_entrada_espacios();">

					<p data-lang='Código del Espacio'>Código del Espacio</p> <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('CODESPACIO')  && comprobarCodigo('CODESPACIO',10)" required><br>

					<p data-lang='Código del Edificio'>Código del Edificio</p> 
					<select name='CODEDIFICIO'>
					<?php
						foreach($this->EDIFICIOS as $fila){
							echo "<option value='".$fila['CODEDIFICIO']."'>".$fila['CODEDIFICIO']." - ".$fila['NOMBREEDIFICIO']."</option>";
						}
					?>
					</select>

				<br>

				<p data-lang='Código del Centro'>Código del Centro</p> 
					<select name='CODCENTRO'>
					<?php
						foreach($this->CENTROS as $fila){
							echo "<option value='".$fila['CODCENTRO']."'>".$fila['CODCENTRO']." - ".$fila['NOMBRECENTRO']."</option>";
						}
					?>
					</select>

					<br>
					<p data-lang='Tipo'>Tipo</p>   <select name="TIPO" id='TIPO'>
  				<option value="1" data-lang='DESPACHO'>DESPACHO</option> 
   				<option value="2" data-lang='LABORATORIO'>LABORATORIO</option> 
   				<option value="3" data-lang='PAS'>PAS</option>
			</select>
					<br>
					<p data-lang='Superficie del Espacio'>Superficie del Espacio</p> <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('SUPERFICIEESPACIO')  && comprobarEntero('SUPERFICIEESPACIO',1,9999)" ><br>

					<p data-lang='Núm. inventario del Espacio'>Núm. inventario del Espacio</p> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('NUMINVENTARIOESPACIO')  && comprobarEntero('NUMINVENTARIOESPACIO',1,99999999)" ><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	