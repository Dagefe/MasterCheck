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

</head>
<body>
    <!-- Arbol de navegacion -->
    <header>
        <ol class="breadcrumb">
            <li class="glyphicon glyphicon-home"><a href="../index.html"> Inicio</a></li>
            <li><a href="login_cliente.html">Particular</a></li>
            <li class="active">Alta particular</li>
        </ol>


    </header>

    <section>

        <div class="container-fluid">

            <form method="post" action="alta_cliente.php">
              <div class="row">
                <div class="col-xs-12 col-lg-4">
                  <p class="text-info">Alta Particular</p>
                </div>
                <div class="col-xs-12 col-lg-4">
                  <p class="text-info"><b>* Campos obligatorios</b></p>
                </div>
              </div>
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
                                <input id="fechnac" type="text" name="fecnac" class="form-control inputForm" placeholder="Fecha de nacimiento: 22/12/2000" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-lg-10">
                    <div class="botonera">
                      <button id="btnEnviar" name="enviar" type="submit" class="btn btn-primary">Dar de alta</button>
                      <a id="btnBorrar" type="reset" class="btn btn-danger" role="button"
                         data-toggle="modal" data-target="#miModal">Borrar</a>
                      <a id="btnOlvido" class="btn btn-primary" role="button" href="olvido.html">¿Has olvidado tu contraseña?</a>
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
    </section>

    <footer>



    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/alta_cliente.js"></script>
    <script src="fonts/glyphicons-halflings-regular.eot"></script>
</body>
</html>

<?php
  include_once('conexion.php');

    if(@$_POST['enviar']){
        //Comprobamos que los input requeridos son correctos
        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($handle));
                fclose($handle);
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                // Juntamos los apellidos
                $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli('127.0.0.1', $user, $pass, $base_datos);
                //Query para insertar los valores
                $query = "INSERT INTO clientes (nombre, apellidos, email, contrasena, movil, provincia, fecha_nacimiento) VALUES ('". $_POST['name'] . "', '" . $apellidos . "', '" . $_POST['email'] . "', '" . $clave_has . "', '" . $_POST['tel'] . "', '" . $_POST['town'] ."', '" . $_POST['fecnac'] . "')";

                if(!$mysqli->query($query))
                {
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else
                {
                    // Cerramos la conexion
                    mysqli_close($mysqli);
                    //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                    //con su usuario ya logeado
                    $_SESION['user'] = $_POST['email'];
                    header('Location: http://localhost/index.php');
                }
            }
            else
              echo "Las contraseñas no coinciden";
        }
        else
          echo "Tienes que introducir todos los datos marcados con un asterisco para poder registrarte correctamente, gracias.";
    }
?>
