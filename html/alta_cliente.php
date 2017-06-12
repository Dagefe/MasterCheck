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
    <!-- Styles -->
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/alta_cliente.css"/>

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
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                  <!--
                  <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                -->
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="login_cliente.html">Particular</a></li>
                    <li><a href="login_empresa.html">Empresa</a></li>
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
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </div><!-- /.nav-inverse -->
          </div><!-- /.container -->
        </div><!-- /.navbar-wrapper -->
      </div><!-- /.col -->
    </div><!-- /.row -->





    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3">
          <form method="post" action="inserccion_cliente.php">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class=" panel-title text-center">Datos de acceso</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12 col-lg-8">
                    <input id="email" type="email" name="email" class="form-control inputForm" placeholder="Email *" required />
                    <input id="contrasena" type="password" name="pass" class="form-control inputForm" placeholder="Contraseña *" required />
                    <input id="recontrasena" type="password" name="repass" class="form-control inputForm" placeholder="Confirmar Contraseña *" required />
                  </div>
                  <div class="col-xs-12 col-lg-3">
                    <div class="input-group">
                      <label class="inputForm">Obligatorio</label>
                      <label class="inputForm">Obligatorio</label>
                      <label class="inputForm">Obligatorio</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class=" panel-title text-center">Datos de contacto</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12 col-lg-8">
                    <input id="nombre" type="text" name="name" class="form-control inputForm" placeholder="Nombre*" required />
                    <input id="firstapel" type="text" name="surname" class="form-control inputForm" placeholder="1er Apellido*" required />
                    <input id="secapel" type="text" name="secondname" class="form-control inputForm" placeholder="2º Apellido" />
                    <input id="town" type="text" name="town" class="form-control inputForm" placeholder="Poblacion" />
                    <input id="movil" type="text" name="tel" class="form-control inputForm" placeholder="Movil" />
                    <!-- <input id="fechnac" type="text" name="fecnac" class="form-control inputForm" placeholder="Fecha de nacimiento: 22/12/2000" /> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-lg-10">
                <div class="botonera">
                  <button id="btnEnviar" input name="enviar" type="submit" class="btn btn-primary">Dar de alta</button>
                    <a id="btnBorrar" type="reset" class="btn btn-danger" role="button"
                       data-toggle="modal" data-target="#miModal">Borrar</a>
                    <a id="btnOlvido" class="btn btn-primary" role="button" href="forgotten_cliente.php">¿Has olvidado tu contraseña?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>



    <!-- Dialogo modal para borrar -->
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	   <div class="modal-dialog" role="document">
  	       <div class="modal-content">
  	            <div class="modal-header">
  		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  			                     <span aria-hidden="true">&times;</span>
  		                </button>
  		                <h4 class="modal-title" id="myModalLabel">Vaciar formulario</h4>
  	            </div>
  	            <div class="modal-body">
  		                ¿Esta seguro?
                      <button id="confirmDelete" type="button" class="close" data-dismiss= "modal">Confirmar</button>
  	            </div>
  	       </div>
  	  </div>
    </div>


  <footer>



  </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/alta_cliente.js"></script>

</body>
</html>


<?php
    /*include_once('conexion.php');


        //Comprobamos que los input requeridos son correctos
        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                $fichero = "clavex.txt";
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($fichero));
                fclose($handle);
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                // Juntamos los apellidos


                $nombre = $_POST['name'];
                $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
                $email = $_POST['email'];
                $pass = $clave_has;
                $movil = $_POST['tel'];
                $provincia = $_POST['town'];

                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli(db_server,db_username, db_password, db_database);
                //Query para insertar los valores

                if (mysqli_connect_errno()) {
                    printf("Error de conexión: %s\n", mysqli_connect_error());
                    exit();
                }

                $query = "INSERT INTO Clientes VALUES (NULL, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";

                if(!$mysqli->query($query))
                {
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else
                {
                    printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);
                    // Cerramos la conexion
                    mysqli_close($mysqli);
                    //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                    //con su usuario ya logeado
                    $_SESION['user'] = $_POST['email'];

                }

                header('Location: http://localhost/index.html');

            }
            else
              echo "Las contraseñas no coinciden";
        }
        else
          echo "Tienes que introducir todos los datos marcados con un asterisco para poder registrarte correctamente, gracias.";
 */
?>
