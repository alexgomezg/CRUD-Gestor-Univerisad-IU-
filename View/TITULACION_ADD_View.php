<?php

//Clase : TITULACION_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un TITULACION

	class TITULACION_ADD{


		function __construct($CENTROS){	
			$this->CENTROS=$CENTROS;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_entrada_titulaciones();">
			
					<p data-lang='Código de la Titulación'>Código de la Titulación</p><input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '50' value = '' onblur="comprobarVacio('CODTITULACION')  && comprobarTexto('CODTITULACION',10)" required><br>
					
					<p data-lang='Código del Centro'>Código del Centro</p>
					<select name='CODCENTRO'>
					<?php
						foreach($this->CENTROS as $fila){
							echo "<option value='".$fila['CODCENTRO']."'>".$fila['CODCENTRO']." - ".$fila['NOMBRECENTRO']."</option>";
						}
					?>
					</select>
					<br>

					<p data-lang='Nombre de la Titulación'>Nombre de la Titulación</p><input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '' onblur="comprobarVacio('NOMBRETITULACION')  && comprobarAlfabetico('NOMBRETITULACION',50)" ><br>

					<p data-lang='Responsable de la Titulación'>Responsable de la Titulación</p><input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '' onblur="comprobarVacio('RESPONSABLETITULACION')  && comprobarAlfabetico('RESPONSABLETITULACION',60)" ><br>

					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	