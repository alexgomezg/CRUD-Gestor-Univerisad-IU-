<?php

//Clase : PROF_ESPACIO_EDIT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del PROF_ESPACIO y permite editarlos

	class PROF_ESPACIO_EDIT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='EDITAR'>EDITAR</h1></center>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>

					<p data-lang='DNI del profesor'>DNI del profesor</p><input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '50' value = '<?php echo $this->tupla['DNI']; ?>'readonly><br>
			
					<p data-lang='Código del Espacio'>Código del Espacio</p><input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODESPACIO']; ?>'readonly><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-edit" value='EDIT'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
