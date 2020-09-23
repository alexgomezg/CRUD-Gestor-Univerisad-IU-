<?php

//Clase : CENTRO_SHOWALL_View
//Creado el : 07-10-2019
//Creado por: Alejandro Gómez González
//-------------------------------------------------------
// Crea una tabla que permite añadir, buscar, eliminar, editar y ver en detalle todos los CENTROS o los que se han pasado como parámetro. 

	class CENTRO_SHOWALL{


		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<center><h1 data-lang='SOWALL'>VER TODOS</h1></center>
			<div id="main-container" align="center" border="2px">
			<a href='../Controller/CENTRO_Controller.php?action=ADD'><img src="../View/Images/plus.png" width="50" height="50"></a>              <a href='../Controller/CENTRO_Controller.php?action=SEARCH'><img src="../View/Images/search.png" width="50" height="50"/></a>
			<br>
			
		<table><thead>
			<tr>
<?php
		foreach ($this->lista as $titulo) {
?>
				<th data-lang='<?php echo $titulo; ?>'><?php echo $titulo; ?></th>
<?php
		}
?>
			<th></th>	
<th></th>	
<th></th>	
			</tr>
</thead>
<?php
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=EDIT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><img src="../View/Images/edit.png" width="30" height="30"/></a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=DELETE&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><img src="../View/Images/delete.png" width="30" height="30"/></a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=SHOWCURRENT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><img src="../View/Images/detail.png" width="30" height="30"/></a>
				</td>
			</tr>

<?php

		}
?>


		</table></div>	
		
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	