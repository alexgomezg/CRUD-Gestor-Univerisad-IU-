<?php

//Clase : TITULACION_DELETE_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del TITULACION que se va a borrar

	class TITULACION_DELETE{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='BORRAR'>BORRAR</h1></center>
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>
			
				 	<p data-lang='Código de la Titulación'>Código de la Titulación</p><input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODTITULACION']; ?>'readonly><br>
					
					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>'readonly><br>

					<p data-lang='Nombre de la Titulación'>Nombre de la Titulación</p><input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>

					<p data-lang='Responsable de la Titulación'>Responsable de la Titulación</p><input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>'readonly><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-delete" value='DELETE'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	