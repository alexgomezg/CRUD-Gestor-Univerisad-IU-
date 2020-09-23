<?php

//Clase : ESPACIO_DELETE_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del ESPACIO que se va a borrar

	class ESPACIO_DELETE{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}


		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='BORRAR'>BORRAR</h1></center>
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'>

					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODESPACIO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					<p data-lang='Código del Edificio'>Código del Edificio</p><input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly ><br>
					<p data-lang='Código del Centro'>Código del Centro</p><input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					<p data-lang='Tipo'>Tipo</p><input type = 'text' name = 'TIPO' id = 'TIPO' placeholder = '' size = '50' value = '<?php echo $this->tupla['TIPO']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					<p data-lang='Superficie del Espacio'>Superficie del Espacio</p><input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' onblur="esNoVacio('area')  && comprobarSoloLetras('area',50)" readonly><br>
					<p data-lang='Núm. inventario del Espacio'>Núm. inventario del Espacio</p><input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' onblur="esNoVacio('departamento')  && comprobarSoloLetras('departamento',50)" readonly><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-delete" value='DELETE'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	