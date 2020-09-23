<?php

//Clase : PROF_TITULACION_ADD_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que pide los datos para insertar un PROF_TITULACION

	class PROF_TITULACION_ADD{


		function __construct($TITULACIONES,$PROFESORES){
			$this->TITULACIONES=$TITULACIONES;
			$this->PROFESORES=$PROFESORES;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='ADD'>AÑADIR</h1></center>		
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',3,9);">
					<p data-lang='DNI del profesor'>DNI del profesor</p>

					<select name='DNI'>
					<?php
						foreach($this->PROFESORES as $fila){
							echo "<option value='".$fila['DNI']."'>".$fila['DNI']." - ".$fila['NOMBREPROFESOR']."</option>";
						}
					?>
					</select>

					<p data-lang='Código de la Titulación'>Código de la Titulación</p>
					<select name='CODTITULACION'>
					<?php
						foreach($this->TITULACIONES as $fila){
							echo "<option value='".$fila['CODTITULACION']."'>".$fila['CODTITULACION']." - ".$fila['NOMBRETITULACION']."</option>";
						}
					?>
					</select>
				
					<p data-lang='Año Académico'>Año Académico</p><input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '' onblur="comprobarVacio('ANHOACADEMICO')&&comprobarAnhoAcademico('ANHOACADEMICO',3,9)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-add" value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	