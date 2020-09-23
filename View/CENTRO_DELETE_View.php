<?php

//Clase : CENTRO_DELETE_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del CENTRO que se va a borrar

	class CENTRO_DELETE{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='DELETE'>DELETE</h1></center>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>
			
				 <p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
					<p data-lang='Nombre del Centro'>Nombre del Centro</p><input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>'readonly><br>
					<p data-lang='Dirección del Centro'>Dirección del Centro</p><input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>'readonly><br>
					<p data-lang='Responsable del Centro'>Responsable del Centro</p><input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-delete" value='DELETE'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	