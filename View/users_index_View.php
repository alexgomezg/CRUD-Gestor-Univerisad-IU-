<?php

class Index {

	function __construct(){
		$this->render();
	}

	function render(){
	
		//include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
?>
		<center><H1 data-lang='BIENVENIDO A PORTAL DE GESTIÓN'>BIENVENIDO A PORTAL DE GESTIÓN</H1></center>
		<br>
		<center><img src="../View/Images/presentacion.PNG" width="50%" height="50%"></center>
		<br><br>
		<center><p data-lang='Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad'>Pincha en el menú superior para acceder a las diferentes entidades y así poder hacer Altas, Bajas, Modificaciones y Consultas sobre la universidad</p></center>

<?php
		include '../View/Footer.php';
	}

}

?>