<?php

//Clase : CENTRO_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un CENTRO
	class CENTRO_ADD{


		function __construct($EDIFICIOS){	
			$this->EDIFICIOS = $EDIFICIOS; //Variables que almacena los edificios que hay en la BD
			$this->render();
			
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings

		?>

		<center><h1 data-lang='ADD'>AÑADIR</h1></center>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_entrada_centros();">
			
				 	<p data-lang='Código del Centro'>Código del Centro</p> <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('CODCENTRO')  && comprobarCodigo('CODCENTRO',10)" required><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p> 
					<select name='CODEDIFICIO'>
					<?php
						foreach($this->EDIFICIOS as $fila){
							echo "<option value='".$fila['CODEDIFICIO']."'>".$fila['CODEDIFICIO']." - ".$fila['NOMBREEDIFICIO']."</option>";
						}
					?>
					</select>

					<p data-lang='Nombre del Centro'>Nombre del Centro</p><input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('NOMBRECENTRO')  && comprobarAlfabetico('NOMBRECENTRO',50)" ><br>
					<p data-lang='Dirección del Centro'>Dirección del Centro</p><input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '' onblur="comprobarDireccion('DIRECCIONCENTRO')  && comprobarLongitud('DIRECCIONCENTRO',150)" ><br>
					<p data-lang='Responsable del Centro'>Responsable del Centro</p><input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('RESPONSABLECENTRO')  && comprobarAlfabetico('RESPONSABLECENTRO',60)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	