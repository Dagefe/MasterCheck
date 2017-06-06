<?php
	session_start();	//Abrimos la sesion para poder destuirla correctamente
	session_destroy();
	header('Location: ../index.php');
?>