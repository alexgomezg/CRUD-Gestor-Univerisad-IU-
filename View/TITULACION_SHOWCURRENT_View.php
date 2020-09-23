<?php

//Clase : TITULACION_SHOCURRENT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Muestra los valores de una TITULACION pasada como parámetro

	class TITULACION_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SHOWCURRENT'>DETALLES</h1></center>
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>
			
				 	<p data-lang='Código de la Titulación'>Código de la Titulación</p><input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODTITULACION']; ?>'readonly><br>
					
					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>'readonly><br>

					<p data-lang='Nombre de la Titulación'>Nombre de la Titulación</p><input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>

					<p data-lang='Responsable de la Titulación'>Responsable de la Titulación</p><input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>'readonly><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-show" id='Ver espacios asignados' value='Ver espacios asignados' onclick="ir_a_option1('../Controller/PROF_ESPACIO_Controller.php?action=SEARCH&','CODTITULACION','<?php echo $this->tupla['CODTITULACION']; ?>');">
			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>