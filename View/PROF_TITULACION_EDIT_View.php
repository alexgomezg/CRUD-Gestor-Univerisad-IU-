<?php

//Clase : PROF_TITULACION_EDIT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del PROF_TITULACION  y permite editarlos

	class PROF_TITULACION_EDIT{


		function __construct($tupla,$TITULACIONES){
			$this->TITULACIONES = $TITULACIONES;
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='EDITAR'>EDITAR</h1></center>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',3,9);">

					<p data-lang='DNI del profesor'>DNI del profesor</p><input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '50' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>
			
					<p data-lang='Código de la Titulación'>Código de la Titulación</p>

					<select name = 'CODTITULACION' id='CODTITULACION'>
					<?php
						foreach($this->TITULACIONES as $fila){
							echo "<option value='".$fila['CODTITULACION']."'";
							if($fila['CODTITULACION'] == $this->tupla['CODTITULACION'])
								echo " selected";
							echo ">".$fila['CODTITULACION']." - ".$fila['NOMBRETITULACION']."</option>";
						}
					?>
					</select><br>
				
					<p data-lang='Año Académico'>Año Académico</p><input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '<?php echo $this->tupla['ANHOACADEMICO']; ?>' onblur="comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',3,9)"><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-edit" value='EDIT'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	