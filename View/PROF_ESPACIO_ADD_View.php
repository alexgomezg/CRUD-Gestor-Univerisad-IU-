<?php

//Clase : PROF_ESPACIO_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un PROF_ESPACIO

	class PROF_ESPACIO_ADD{


		function __construct($PROFESORES,$ESPACIOS){
			$this->PROFESORES=$PROFESORES;
			$this->ESPACIOS=$ESPACIOS;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>

					<p data-lang='DNI del profesor'>DNI del profesor</p>

					<select name='DNI'>
					<?php
						foreach($this->PROFESORES as $fila){
							echo "<option value='".$fila['DNI']."'>".$fila['DNI']." - ".$fila['NOMBREPROFESOR']."</option>";
						}
					?>
					</select>
			
					<p data-lang='Código del Espacio'>Código del Espacio</p>

					<select name='CODESPACIO'>
					<?php
						foreach($this->ESPACIOS as $fila){
							echo "<option value='".$fila['CODESPACIO']."'>".$fila['CODESPACIO']." - ".$fila['TIPO']."</option>";
						}
					?>
					</select>

					<br>

					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	