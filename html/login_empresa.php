<?php
  session_start();
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login empresa</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login_empresa.css">
  <link rel="stylesheet" href="../css/general.css">
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
                <a class="navbar-brand" href="../index.php">MASTERCHEQUE</a>
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
                  <li><a href="login_empresa.html">Empresa</a></li> -->
                  <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="fa fa-user "></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="login_cliente.html">Particular</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="login_empresa.html">Empresa</a></li>
                       <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </li> -->
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

      <div class="col-xs-12 col-lg-6">
        <div class="index-busc">
          <div class="wrapper">
            <div class="index-busc-cab-registro">
              <h3 class="titulo-busqueda">Inicio sesion</h3>
                <form method="post" action="login_empresa.php" name="form">

                  <div class="input-group ajusteLateralInicio">
                    <input id="email" name="email" type="email" placeholder="Introduzca su email" class="form-control inputForm"
                          onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" />

                    <input id="password" name="contra" type="password" placeholder="Contraseña" class="form-control inputForm"
                           onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" />
                  </div>

              <div class="input-group-btn separacionTop">
                <input id="btnAcceder" name="enviar" value="Acceder" type="submit" class="btn btn-primary">Acceder
                <a id="btnOlvido" class="btn btn-primary" role="button" href="forgotten_empresa.php">¿Has olvidado tu contraseña?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-lg-6">
      <div class="index-busc">
        <div class="wrapper">
          <div class="index-busc-cab-alta">
            <h3 class="titulo-busqueda">Resgístrate</h3>
                <div class="input-group-btn ajusteLateralRegistro separacionTop">
                  <a id="btnAlta" class="btn btn-primary" role="button" href="alta_empresa.php">Alta nueva</a>
                </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/login_empresa.js"></script>
  <script src="../js/sweetalert.min.js"></script>
</body>

</html>
<?php
  if(@$_POST['enviar']){
    include_once 'conexion.php';

 if (isset($_POST['email'])){
  $_SESSION['email_empresa'] = $_POST['email'];
 }
 if (isset($_POST['contra'])){
  $_SESSION['contra_empresa'] = $_POST['contra'];
 }

 $mysqli = new mysqli(db_server,db_username, db_password, db_database);

 if (mysqli_connect_errno()) { //Posible error al conectar a la base de datos
  printf("Error de conexión: %s\n", mysqli_connect_error());
  exit();
  }

    //Recogemos nuestra clave maestra
    $fichero = "clavex.txt";
    $handle = fopen('clavex.txt', "r");
    $clavex = fread($handle, filesize($fichero));
    fclose($handle);

    //Encriptamos la clave introducida
    $clave_has = openssl_encrypt($_SESSION['contra_empresa'], "AES-128-ECB", $clavex);

    $query = "SELECT contrasena FROM empresa WHERE email='" . $_SESSION['email_empresa'] . "'";

    $res = $mysqli->query($query);
    $row = $res->fetch_array(MYSQLI_NUM);
    //Comparamos la clave introducida encriptada por la clave en la BD
    if($row[0] !== $clave_has){
      echo '<script>swal({
          title: "Error: Contraseñas",
          text: "Lo sentimos, la contraseña introducida no coindice con el email solicitado.",
          confirmButtonText: "Volver al formulario",
          type: "error"
        }, function() {
          window.location = "login_empresa.php";
        })</script>';
    unset($_SESSION['email_empresa']);
  }
    else {
      echo '<script>swal({
          title: "Bienvenido a MASTERCHEQUE",
          text: "Disfrute de su estancia.",
          confirmButtonText: "Seguir!",
          type: "success"
        }, function() {
          window.location = "empresa.php";
        })</script>';
    }
}
?>