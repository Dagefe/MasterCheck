<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Formulario de datos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- Styles -->
    <link rel="stylesheet" href="../css/general.css"/>
    <link rel="stylesheet" href="../css/forgotten_empresa.css"/>
    <link rel="stylesheet" href="../css/sweetalert.css">
		<link type="text/css" rel="stylesheet" href="../font-awesome/css/font-awesome.css" />


</head>
<body>

  <!-- Navbar -->
  <div class="row">
    <div class="col-xs-12 col-lg-12">
      <div class="navbar-wrapper">
        <div class="container">
          <div class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <a class="navbar-brand" href="../index.php">MASTERCHEQUE</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <!--
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Nose <span class="sr-only">(current)</span></a></li>
                  <li><a href="#">Nose</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">One more separated link</a></li>
                    </ul>
                  </li>
                </ul>

                <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
              -->
              <!--
                <ul class="nav navbar-nav navbar-right">
<<<<<<< HEAD
                  <!--
                  <li><a href="login_cliente.html">Particular</a></li>
                  <li><a href="login_empresa.html">Empresa</a></li>
=======
                  <li><a href="login_cliente.php">Particular</a></li>
                  <li><a href="login_empresa.php">Empresa</a></li>
>>>>>>> 1289718c7b6abed22ee63e549d077a209637ba59
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </li>
                </ul> -->
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </div><!-- /.nav-inverse -->
        </div><!-- /.container -->
      </div><!-- /.navbar-wrapper -->
    </div><!-- /.col -->
  </div><!-- /.row -->





        <div class="container-fluid">
      <div class="row">
        <div class="col-xs12 col-lg-12">
          <div class="index-busc">
            <div class="wrapper">
              <div class="index-busc-cab-forgotten">
                <h3 class="titulo-busqueda">Recuperacion de contraseña</h3>
                  <form action="forgotten_empresa.php" method="post">


	            			  <div class="col-xs-12 col-lg-10">
                        <input id="email" type="email" name="email" class="form-control inputForm" placeholder="Email" required />
                      </div>


                      <div class="col-xs-12 col-lg-10">
                        <div class="input-group">
                          <div class="input-group-btn">
                            <button id="btnSendMail" type="submit" name="enviar" class="btn btn-default">Recuperar contraseña
                              <span class="fa fa-envelope-o" aria-hidden="true"></span></button>
                          </div>
                        </div>
                      </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <footer>



    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/forgotten_empresa.js"></script>
    <script src="../js/sweetalert.min.js"></script>
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

		$query = "SELECT email FROM Empresa WHERE email = '" . $_POST['email'] . "'";
        $res = $mysqli->query($query);
	    $row_cnt = $res->num_rows;

            if ($row_cnt > 0){ //Hay algun registro, con lo cual le enviaremos su nueva contraseña
              echo '<script>swal({
                  title: "Recuperacion de contraseña",
                  text: "Se le proporcionara una nueva contraseña por correo en unos instantes.",
                  confirmButtonText: "Aceptar",
                  type: "success"
              }, function() {
                  window.location = "../index.php";
              })</script>';
                //echo "<p>Se le proporcionara una nueva contraseña por correo en unos instantes.<br>";
                //echo "Por favor, revise su carpeta de spam y siga las instrucciones una vez le llegue el correo, gracias por las molestias.</p>";
                //header(Location: "Donde sea");
                //ventana
            }
            else {
              echo '<script>swal({
                      title: "Error",
                      text: "Email no encontrado en nuestro sistema",
                      cancelButtonText: "Volver a intentarlo",
                      type: "error"
                  }, function() {
                      window.location = "alta_empresa.php";
                  })</script>';
                //echo "<p>Lo sentimos pero su correo no pertenece a ningun usuario<p><br>";
                //ventana

            }
			mysqli_close($mysqli);

	}
?>
