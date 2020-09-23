<?php

//Clase : ESPACIO_EDIT_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Creación del formulario que enseña los datos del ESPACIO y permite editarlos

	class ESPACIO_EDIT{


		function __construct($tupla,$EDIFICIOS,$CENTROS){	
			$this->tupla = $tupla;
			$this->EDIFICIOS = $EDIFICIOS;
			$this->CENTROS = $CENTROS;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<center><h1 data-lang='EDITAR'>EDITAR</h1></center>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_entrada_espacios();">
			
				 	<p data-lang='Código del Espacio'>Código del Espacio</p><input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['CODESPACIO']; ?>'readonly><br>

					<p data-lang='Código del Edificio'>Código del Edificio</p> 
					<select name = 'CODEDIFICIO' id='CODEDIFICIO'>
					<?php
						foreach($this->EDIFICIOS as $fila){
							echo "<option value='".$fila['CODEDIFICIO']."'";
							if($fila['CODEDIFICIO'] == $this->tupla['CODEDIFICIO'])
								echo " selected";
							echo ">".$fila['CODEDIFICIO']." - ".$fila['NOMBREEDIFICIO']."</option>";
						}
					?>
					</select><br>

					<p data-lang='Código del Centro'>Código del Centro</p> 

					<select name = 'CODCENTRO' id='CODCENTRO'>
					<?php
						foreach($this->CENTROS as $fila){
							echo "<option value='".$fila['CODCENTRO']."'";
							if($fila['CODCENTRO'] == $this->tupla['CODCENTRO'])
								echo " selected";
							echo ">".$fila['CODCENTRO']." - ".$fila['NOMBRECENTRO']."</option>";
						}
					?>
					</select><br>

					<p data-lang='Tipo'>Tipo</p><select name="TIPO" id='TIPO'>
					<?php 
					echo "<option value='1'";
					if($this->tupla['TIPO']=='DESPACHO'){
						echo " selected";
					}
					echo ">DESPACHO</option>";

					echo "<option value='2'";
					if($this->tupla['TIPO']=='LABORATORIO'){
						echo " selected";
					}
					echo ">LABORATORIO</option>";

					echo "<option value='3'";
					if($this->tupla['TIPO']=='PAS'){
						echo " selected";
					}
					echo ">PAS</option>";

					?>
			</select>
			<br>
					<p data-lang='Superficie del Espacio'>Superficie del Espacio</p><input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = 'Solo letras' size = '50' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' onblur="comprobarEntero('SUPERFICIEESPACIO',1,9999)" ><br>
					<p data-lang='Núm. inventario del Espacio'>Núm. inventario del Espacio</p> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' onblur="comprobarEntero('NUMINVENTARIOESPACIO',1,99999999)" ><br>
					<br><br>
					<input type='submit' name='action' class="btn btn-edit" value='EDIT'>


			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/Images/return.png" width="50" height="50"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	