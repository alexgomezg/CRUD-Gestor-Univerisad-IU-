<?php
//Script :GENERAL_TEST_View.js
//Creado el : 10-12-2019
//Creado por: Alejandro Gómez González
//Este script se encarga de dar estilos la página GENERAL_TEST.

	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
?>
<html>
<head>
	<title>
		Tests
	</title>
	<meta charset="UTF-8">
	<title data-lang='Portal de Gestión'>
		Portal de Gestión
	</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<script type="text/javascript" src="../View/JS/JavaScript.js"></script>
	<link rel="stylesheet" type="text/css" href="../View/CSS/estilos_test.css" />
    <script type="text/javascript" src="../View/JS/tcal.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="../View/JS/traducir.js"></script>
	<link rel="stylesheet" type="text/css" href="../View/CSS/tcal.css" />
	<link rel="icon" type="image/png" href="../View/Images/admin.png" />

</head>
<?php
 //echo "<body onload=\"return cambioIdioma('".$_COOKIE['idioma_cookie']."')\">";
if(!isset($_COOKIE)){
	//setcookie("idioma_cookie","en",time()+365,"/");
}else{
	//echo "<body onload=\"return cambioIdioma('".$_COOKIE['idioma_cookie'].")\">";
}
?>


<body onload="cambioIdioma()">
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Images/error.png" name="aviso"/></div>
	  			<div id="mensajeError" style="margin:30px 0px 0px 160px;"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Images/error1.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">

			<center>
		<h1>Testing Portal de Gestión</h1></center>
	</p>

<?php
  function accion(){
    echo "setcookie(\"idioma_cookie\",\"gl\",time()+365,\"/\");";
  }
  function acciondos(){
    echo 19;
  }
?>
	
	
	
<?php
	
	if (IsAuthenticated()){
?>



	


<?php
	
	}
	else{
		
?>
		
<?php
	}	
?>


</header>

<?php
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>

