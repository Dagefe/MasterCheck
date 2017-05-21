<?php
    session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Perfil cliente</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="#"/>

</head>
<body>
    <!-- Arbol de navegacion -->
    <header>
        <ol class="breadcrumb">
            <li class="glyphicon glyphicon-home"><a href="../index.html"> Inicio</a></li>
            <li><a href="login_cliente.html">Particular</a></li>
            <li class="active">Alta particular</li>
            
            <li><a href="ficha_cliente.php">Perfil</a></li>
            <li class="active">Perfil cliente</li>
        </ol>


    </header>

    <section>
	<div class="container">
	  <h3>Bienvenido</h3>
	  <ul class="nav nav-tabs">
	    <li class="active"><a href="#">Home</a></li>
	    <li class="dropdown">
	      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1 <span class="caret"></span></a>
	      <ul class="dropdown-menu">
	        <li><a href="#">Submenu 1-1</a></li>
	        <li><a href="#">Submenu 1-2</a></li>
	        <li><a href="#">Submenu 1-3</a></li>                        
	      </ul>
	    </li>
	    <li><a href="#">Menu 2</a></li>
	    <li><a href="#">Menu 3</a></li>
	  </ul>
	</div>

</body>
</html>