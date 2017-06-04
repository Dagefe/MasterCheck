<?php
session_start();
 include_once 'conexion.php';

    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

      if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
          printf("Error de conexión: %s\n", mysqli_connect_error());
          exit();
        }

         $nom = "SELECT * FROM Empresa WHERE nombre = '" . $_SESSION['email_empresa'] . "'";

        if ($nombre_completo = $mysqli->query($nom)){

          while ($fila = $nombre_completo->fetch_row()){
            $contacto = $fila[3];
            $movil = $fila[4];
            $pais = $fila[5];
            $poblacion = $fila[6];
            
          }
        }

        $_SESSION['nombre_usuario'] = $nombre;
        $_SESSION['apellidos_usuario'] = $apellidos;
        if ($movil == 0){
            $_SESSION['movil_usuario'] = "";
        }
        else $_SESSION['movil_usuario'] = $movil;
        $_SESSION['provincia_usuario'] = $provincia;
        
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
          <link rel="stylesheet" href="../css/ficha_cliente.css">
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
                    <a class="navbar-brand" href="usuario.php">MASTERCHECK</a>
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
            <h3 class="welcomeUser">Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></h3>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-lg-8">
            <div class="index-busc">
              <div class="wrapper">
                <div class="index-busc-cab-perfil">
                  <div class="header">
                    <h3>Perfil de usuario</h3>
                  </div>
                    <form class="form-horizontal" name="formulario_ficha" method="POST">
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">Contacto</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="nombre" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup">Movil</label>
                        <div class="col-sm-4">
                          <input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $_SESSION['movil_usuario']; ?>" placeholder="Introduza un tlf movil">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup">Nombre de la empresa</label>
                        <div class="col-sm-4">
                          <input class="form-control" name="nom_emp" type="text" id="formGroup" value="<?php echo $_SESSION['provincia_usuario']; ?>" placeholder="Introduzca aqui la provincia">
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">Dirección</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="direccion" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>
                        
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">Población</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="poblacion" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>
                        
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">Código postal</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="cp" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>
                        
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">País</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="pais" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>
                        
                      <div class="form-group">
                          <label class="col-sm-2 control-label" for="formGroup">Actividad empresarial</label>
                          <div class="col-sm-4">
                            <input class="form-control" name="actividad" type="text" id="formGroup" value="<?php echo $nombre; ?>">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-6 botonera-perfil">
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
                  <span class="fa fa-user"></span>Perfil de usuario
                  <!-- Si estas en esta pagina se muestra sin enlace -->
                </li>
                <li>
                  <span class="fa fa-cog"></span><a href="ajustes_cliente.php">Ajustes de cuenta</a>
                </li>
                <li>
                  <span class="fa fa-star"></span><a href="favoritos.php">Favoritos</a>
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
    if (empty($_POST['nombre']) || empty($_POST['apellidos'])){
      echo '<script>swal({
              title: "¡ERROR!",
              text: "No se puede borrar el nombre o el apellido.",
              confirmButtonText: "Volver a la pagina anterior",
              type: "error"
              }, function() {
              window.location = "ficha_cliente.php";
              })</script>';
            exit();
    }
    if (empty($_POST['movil'])){
      $movil = '';
    }
    else $movil = $_POST['movil'];
    if (empty($_POST['provincia'])){
      $provincia = '';
    }
    else $provincia = $_POST['provincia'];
    $consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "', apellidos ='" . $_POST['apellidos'] . "', movil ='" . $movil . "', provincia ='" . $provincia . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
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
                            window.location = "ficha_cliente.php";
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
              window.location = "ficha_cliente.php";
              })</script>';
            exit();
        }
    #Cerrar la conexión
  }

  else if(@$_POST['cancelar'] == "Cancelar"){

    //mensaje de vuelta a la pagina de inicio del uusario logueado
    header('Location: usuario.php'); // no carga pagina --> header('Location: usuario.php');
  }
