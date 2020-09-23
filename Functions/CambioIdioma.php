<?php
//Esta función se encarga de cambiar el idiome de la página
session_start();
$idioma = $_GET['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>