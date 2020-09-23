<?php
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	//include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		Ejemplo Arquitectura IU
	</title>
	<meta charset="UTF-8">
	<title data-lang='Portal de Gestión'>
		Portal de Gestión
	</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<script type="text/javascript" src="../View/JS/JavaScript.js"></script>
	<link rel="stylesheet" type="text/css" href="../View/CSS/estilos.css" />
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
		<h1 data-lang='Portal de Gestión'>Portal de Gestión</h1></center>
	</p>

<?php
  function accion(){
    echo "setcookie(\"idioma_cookie\",\"gl\",time()+365,\"/\");";
  }
  function acciondos(){
    echo 19;
  }
?>
	
	
	<div width: 50%; align="left">
  <img src='../View/Images/galicia.png' width="50" height="25" onclick="return cambioIdioma('gl')"/></a>
  <img src='../View/Images/espanha.png' width="50" height="25" onclick="return cambioIdioma('es')"/></a>
  <img src='../View/Images/uk.png' width="50" height="25" onclick="return cambioIdioma('en')"/></a>
					
	</div>
<?php
	
	if (IsAuthenticated()){
?>



	
<?php
		echo "<center><img src='../View/Images/user.png' width=100 height=100/><h3 data-lang='Usuario'>Usuario"."</h3><h3>". $_SESSION['login'] . '</h3></center>';
?>			
	<!---<div width: 50%; align="right">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/Images/desconectaraa.png' width="100" height="100"/>
		</a>
	</div>--->

<?php
	
	}
	else{
		//echo $strings['Usuario no autenticado']; 
		echo "<p data-lang='Usuario no autenticado'>Usuario no autenticado</p>";
?>
		<a href='../Controller/Register_Controller.php'><img src="../View/Images/register.png" width="50" height="50"/></a>
<?php
	}	
?>


</header>

<!---<div id = 'main'>--->
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>

