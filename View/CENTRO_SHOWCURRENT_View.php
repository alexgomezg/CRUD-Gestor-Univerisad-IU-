<?php

//Clase : CENTRO_SHOCURRENT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Muestra los valores de un CENTRO pasado como parámetro
	class CENTRO_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='SHOWCURRENT'>DETALLES</h1></center>	
			<form name = 'show_debil' id='show_debil' action='' method='post'>
			
				 	<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
					<p data-lang='Nombre del Centro'>Nombre del Centro</p><input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>'readonly><br>
					<p data-lang='Dirección del Centro'>Dirección del Centro</p><input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>'readonly><br>
					<p data-lang='Responsable del Centro'>Responsable del Centro</p><input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly ><br>
					<br><br>
					<input type='submit' id='Ver titulaciones asignadas' name='action' class="btn btn-show" value='Ver titulaciones asignadas' onclick="ir_a_option1('../Controller/TITULACION_Controller.php?action=SEARCH&','CODCENTRO','<?php echo $this->tupla['CODCENTRO']; ?>');">
					<br><br>
					<input type='submit' id='Ver espacios asignados' name='action' class="btn btn-show" value='Ver espacios asignados' onclick="ir_a_option2('../Controller/ESPACIO_Controller.php?action=SEARCH&','CODCENTRO','<?php echo $this->tupla['CODCENTRO'];?>');">

		
			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	