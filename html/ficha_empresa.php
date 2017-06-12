<?php
session_start();
 include_once 'conexion.php';

    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

      if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
          printf("Error de conexión: %s\n", mysqli_connect_error());
          exit();
        }

         $nom = "SELECT * FROM empresa WHERE email = '" . $_SESSION['email_empresa'] . "'";

        if ($nombre_completo = $mysqli->query($nom)){

          while ($fila = $nombre_completo->fetch_row()){
            $_SESSION['nombre_empresa'] = $fila[9];
            $_SESSION['contacto_empresa'] = $fila[3];
            $_SESSION['movil_empresa'] = $fila[4];
            $_SESSION['pais_empresa'] = $fila[5];
            $_SESSION['pob_empresa'] = $fila[6];
            $_SESSION['cp_empresa'] = $fila[7];
            $_SESSION['direccion_empresa'] = $fila[8];
            $_SESSION['sector_empresa'] = $fila[10];

          }
        }

    mysqli_close($mysqli);
?>

<!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <title>Perfil cliente</title>

      <!-- Bootstrap -->
      <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/general.css">
          <link rel="stylesheet" href="../css/ficha_empresa.css">
      <link rel="stylesheet" href="../css/sweetalert.css">
      <!-- To insert the icon: -->
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
                    <a class="navbar-brand" href="empresa.php">MASTERCHEQUE</a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!--
                    <form class="navbar-form navbar-left">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                  -->
                    <ul class="nav navbar-nav navbar-right">
                      <!-- <li><a href="login_cliente.html">Particular</a></li>
                      <li><a href="login_empresa.html">Empresa</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="fa fa-user "></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="login_cliente.html">Particular</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="login_empresa.html">Empresa</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </li>-->
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </div><!-- /.nav-inverse -->
            </div><!-- /.container-fluid -->
          </div><!-- /.navbar-wrapper -->
        </div><!-- /.col -->
      </div><!-- /.row -->



      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-lg-12">
            <h3 class="welcomeUser">Bienvenido <?php echo $_SESSION['nombre_empresa']; ?></h3>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-lg-8">
            <div class="index-busc">
              <div class="wrapper">
                <div class="index-busc-cab-perfil">
                  <div class="header">
                    <h3>Perfil de empresa</h3>
                  </div>
                    <form class="form-horizontal" name="formulario_ficha" method="POST">
                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">Contacto</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="contacto" type="text" id="formGroup" value="<?php echo $_SESSION['contacto_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="formGroup">Movil</label>
                        <div class="col-sm-4">
                          <input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $_SESSION['movil_empresa']; ?>" placeholder="Introduza un tlf movil">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">Dirección</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="direccion" type="text" id="formGroup" value="<?php echo $_SESSION['direccion_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">Población</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="poblacion" type="text" id="formGroup" value="<?php echo $_SESSION['pob_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">Código postal</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="cp" type="text" id="formGroup" value="<?php echo $_SESSION['cp_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">País</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="pais" type="text" id="formGroup" value="<?php echo $_SESSION['pais_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="formGroup">Actividad empresarial</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="actividad" type="text" id="formGroup" value="<?php echo $_SESSION['sector_empresa']; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-6 botonera-empresa">
                          <input type="submit" name="guardar" class="btn btn-success" value="Guardar">
                          <input type="submit" name="restaurar" class="btn btn-danger" value="Restaurar">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <div class="col-xs-12 col-lg-3">
            <div class="box-herramientas">
              <div class="header">
                <h3>Configuracion</h3>
              </div>
            <div class="box-opciones">
              <ul>
                <li class="selected">
                  <span class="fa fa-user"></span>Perfil de empresa
                  <!-- Si estas en esta pagina se muestra sin enlace -->
                </li>
                <li>
                  <span class="fa fa-cog"></span><a href="ajustes_empresa.php">Ajustes de cuenta</a>
                </li>
                <li>
                  <span class="fa fa-star"></span><a href="mis_ofertas.php">Mis ofertas</a>
                </li>
                <li>
                  <span class="fa fa-sign-out"></span><a href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="../js/jquery-3.2.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/sweetalert.min.js"></script>
      <script src="../js/ficha_cliente.js"></script>

    </body>
  </html> <!-- Final codigo -->

<?php

  if(@$_POST['guardar'] == "Guardar"){

    $conexion = new mysqli(db_server,db_username, db_password, db_database);

    /* Comprobar conexión */
    if ($conexion->connect_errno) {
      printf("Conexión fallida: %s
      ", $conexion->connect_error);
      exit();
      }
    if (empty($_POST['contacto']) || empty($_POST['movil']) || empty($_POST['direccion']) || empty($_POST['poblacion']) || empty($_POST['cp']) || empty($_POST['pais']) || empty($_POST['actividad'])){
      echo '<script>swal({
              title: "¡ERROR!",
              text: "No se pueden dejar en blanco ningun campo.",
              confirmButtonText: "Volver a la pagina anterior",
              type: "error"
              }, function() {
              window.location = "ficha_empresa.php";
              })</script>';
            exit();
    }
    $consulta = "UPDATE empresa SET contacto ='" . $_POST['contacto'] . "', movil ='" . $_POST['movil'] . "', pais ='" . $_POST['pais'] . "', poblacion ='" . $_POST['poblacion'] . "', cp ='" . $_POST['cp'] . "', direccion='" . $_POST['direccion'] . "', sector='" . $_POST['actividad'] . "' WHERE email = '" . $_SESSION['email_empresa'] . "'";
    //$consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";

    $resultado = $conexion -> query($consulta) || die("No se pudo realizar la actualización");
    mysqli_close($conexion);
    if ($resultado)
      {

          echo '<script>swal({
                            title: "¡Hecho!",
                            text: "Cambios realizados correctamente",
                            confirmButtonText: "Aceptar",
                            type: "success"
                        }, function() {
                            window.location = "ficha_empresa.php";
                        })</script>';
          //Redireccion a la misma pagina con los cambios actualizados
          //header('Location: ' . $_SERVER("DOCUMENT_ROOT") . '/ficha_cliente.php');
        }

    else

      {
          echo " Mensaje Lo sentimos pero en estos momentos no podemos realizar los cambios solicitados";
          echo '<script>swal({
              title: "¡ERROR!",
              text: "No se pueden hacer los cambios solicitados.",
              confirmButtonText: "Volver a la pagina anterior",
              type: "warning"
              }, function() {
              window.location = "ficha_empresa.php";
              })</script>';
            exit();
        }
    #Cerrar la conexión
  }

  else if(@$_POST['restaurar']){
    $_POST['contacto'] = $_SESSION['contacto_empresa'];
    $_POST['movil'] = $_SESSION['movil_empresa'];
    $_POST['direccion'] = $_SESSION['direccion_empresa'];
    $_POST['poblacion'] = $_SESSION['pob_empresa'];
    $_POST['cp'] = $_SESSION['cp_empresa'];
    $_POST['pais'] = $_SESSION['pais_empresa'];
    $_POST['actividad'] = $_SESSION['sector_empresa'];
  }
?>
