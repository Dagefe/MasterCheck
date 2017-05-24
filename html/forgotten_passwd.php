<?php
	session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Formulario de datos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/alta_cliente.css"/>
		<link rel="stylesheet" href="../css/forgotten_passwd.css"/>
		<link type="text/css" rel="stylesheet" href="../font-awesome/css/font-awesome.css" />


</head>
<body>
    <!-- Arbol de navegacion -->
    <header>
        <ol class="breadcrumb">
            <li class="glyphicon glyphicon-home"><a href="../index.html"> Inicio</a></li>
            <li><a href="login_cliente.html">Cliente</a></li>
            <li class="active">Alta cliente</li>
        </ol>

    </header>

    <section>

        <div class="container">
            <form action="forgotten_passwd.php" method="post">
		<div class="row">
                    <div class="col-xs-12 col-lg-8">
            		<p>¿Has olvidado la contraseña?</p>
                            <div class="panel panel-primary">
            			<div class="panel-heading">
                                    <h3 class="panel-title text-center">Recuperación de contraseña</h3>
            			</div>
            			<div class="panel-body">
                                    <div class="input-group">
	            			<div class="col-xs-12 col-lg-10">
                                        <input id="email" type="email" name="email" class="form-control inputForm" placeholder="Email" required />
                                    </div>
                                    <div class="col-xs-12 col-lg-10">
                                            <div class="btn-group">
                                                    <button id="btnSendMail" name="enviar" type="submit" class="btn btn-default">
                                                            Restablecer   <span class="fa fa-envelope-o" aria-hidden="true"></span>
                                                    </button>
                                            </div>
                                    </div>
            			</div>
                            </div>
            		</div>
                    </div>
		</div>
            </form>
        </div>


    </section>

    <footer>



    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/formEmpresa.js"></script>
    <script src="fonts/glyphicons-halflings-regular.eot"></script>
</body>
</html>

<?php
	include_once ('conexion.php');
	if(@$_POST['enviar'])
	{
		$mysqli = new mysqli(db_server,db_username, db_password, db_database);

    if (mysqli_connect_errno())
		{ //Posible error al conectar a la base de datos
    	printf("Error de conexión: %s\n", mysqli_connect_error());
      exit();
    }

		$query = "SELECT email FROM clientes WHERE email = '" . $_POST['email'] . "'";

		if(!$mysqli->query($query))
		{
			echo "Error en la consulta: " . $mysqli->error;
		}

		else
		{
			mysqli_close($mysqli);
			echo "<p>Se le proporcionara una nueva contraseña por correo en unos instantes.<br>";
			echo "Por favor, revise su carpeta de spam y siga las instrucciones una vez le llegue el correo, gracias por las molestias.</p>";
		}
	}
?>
