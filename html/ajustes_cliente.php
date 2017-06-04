<?php
session_start();

include_once 'conexion.php';

$mysqli = new mysqli(db_server,db_username, db_password, db_database);

if (mysqli_connect_errno()) { //Posible error al conectar a la base de datos
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}

$ema = "SELECT email,contrasena FROM clientes WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";

if ($email_cliente = $mysqli->query($ema)){
    while ($fila = $email_cliente->fetch_row()){
          $email = $fila[0];
          $password = $fila[1];
    }
}

  $_SESSION['email_usuario'] = $email;
  $fichero = "clavex.txt"; //Recogemos nuestra clave para poder desencriptar la contraseña
  $handle = fopen('clavex.txt', "r");
  $clavex = fread($handle, filesize($fichero));
  fclose($handle);
  $clave_has = openssl_decrypt($password, "AES-128-ECB", $clavex);//Desencriptamos la contraseña
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
      <link rel="stylesheet" href="../css/general.css"/>
      <link rel="stylesheet" href="../css/ajustes_cliente.css"/>
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
                <div class="index-busc-cab-ajustes">
                  <div class="header">
                    <h3>Ajustes de usuario</h3>
                  </div>
                  <form class="form-horizontal" name="formulario_ficha" method="POST">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup">Email</label>
                        <div class="col-sm-4">
                          <input class="form-control" name="email" type="text" id="formGroup" value="<?php echo $email; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                      <!-- Recoger contraseña encriptada y mostrar en el campo -->
                      <label class="col-sm-2 control-label" for="formGroup">Contraseña</label>
                      <div class="col-sm-4">
                        <input class="form-control" name="contra" type="password" id="formGroup" value="<?php echo $clave_has; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="formGroup"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="cambiar" class="btn btn-success" value="Cambiar">
                      <input type="submit" name="restaurar" class="btn btn-danger" value="Restaurar">
                      <input type="submit" name="borrar" class="btn btn-danger" value="Borrar cuenta">
                    </div>
                    </div>
                  </form>
                </div>
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
                <li>
                  <span class="fa fa-user"></span><a href="ficha_cliente.php">Perfil de usuario</a>
                  <!-- Si estas en esta pagina se muestra sin enlace -->
                </li>
                <li class="selected">
                  <span class="fa fa-cog"></span>Ajustes de cuenta
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
      </div><!-- fin container -->




      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="../js/jquery-3.2.1.min.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="../js/sweetalert.min.js"></script>



    </body>
  </html> <!-- Final codigo -->

<?php




  if(@$_POST['cambiar']){
    include_once 'conexion.php';
    $conexion = new mysqli(db_server,db_username, db_password, db_database);

    /* Comprobar conexión */
    if ($conexion->connect_errno) {
      printf("Conexión fallida: %s
      ", $conexion->connect_error);
      exit();
      }

    //$consulta = "UPDATE clientes SET email ='" . $_POST['email'] . "', contrasena ='" . $_POST['contra'] . "', movil =" . $_SESSION['movil_usuario'] . ", provincia ='" . $_SESSION['provincia_usuario'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
    //$consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";

    $fichero = "clavex.txt"; //Recogemos nuestra clave para poder desencriptar la contraseña
    $handle = fopen('clavex.txt', "r");
    $clavex = fread($handle, filesize($fichero));
    fclose($handle);
    $clave_has = openssl_encrypt($_POST['contra'], "AES-128-ECB", $clavex);//Desencriptamos la contraseña

    $consulta = "UPDATE clientes SET contrasena ='" . $clave_has . "' WHERE email='" . $_POST['email'] . "'";
    $resultado = $conexion -> query($consulta) || die("No se pudo realizar la actualización");

    if ($resultado)
    {

        echo " Mensaje Cambios realizados";

          echo '<script>swal({
                            title: "¡Hecho!",
                            text: "Cambios realizados correctamente",
                            confirmButtonText: "Aceptar",
                            type: "success"
                        }, function() {
                            window.location = "ajustes_cliente.php";
                        })</script>';
          //Redireccionamiento a la misma pagina
          //header("Location: " . $_SERVER("DOCUMENT_ROOT") . "/ajustes_cliente.php");
    }
    else

      {
          echo " Mensaje Lo sentimos pero en estos momentos no podemos realizar los cambios solicitados";

      }
    #Cerrar la conexión
    mysqli_close($conexion);
  }

  else if(@$_POST['restaurar']){
    
    // 
  }

  else if(@$_POST['borrar']){

      include_once 'conexion.php';
      $conexion = new mysqli(db_server,db_username, db_password, db_database);
      if ($conexion->connect_errno) {
          printf("Conexión fallida: %s
          ", $conexion->connect_error);
          exit();
      }

    $query = "DELETE FROM clientes WHERE email='" . $_POST['email'] . "'";
    $resultado = $conexion -> query($query) || die("No se pudo realizar la actualización");

    if ($resultado)
      {
        echo '<script>swal({
              title: "¿Estas seguro?",
              text: "Su cuenta sera eliminada",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Si, deseo borrarla",
              cancelButtonText: "No, deselo cancelar!",
              closeOnConfirm: false,
<<<<<<< HEAD
              }, function() {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                window.location = "../index.php";
=======
              closeOnCancel: false
              }, function(isConfirm) {
                if (isConfirm) {
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  window.location = "../index.html";
                }
                else {
                  swal("Cancelled", "Su cuenta no hasido borrada :)", "error")
                }
>>>>>>> 25ca8982d6f56ba11ccd54a4f0e3160a97ac63e7
              })</script>';

              session_destroy();
        }
    else {
          echo " Mensaje Lo sentimos pero en estos momentos no se puede borrar la cuenta solicitada";
          header('Location: ficha_cliente.php');
        }
    mysqli_close($conexion);
  }
?>
