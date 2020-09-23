<?php
//Esta función se encarga de desconectar al usuario autenticado
session_start();
session_destroy();
header('Location:../index.php');

?>
