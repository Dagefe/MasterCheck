<?php
 session_start();

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
    if($row[0] === $clave_has){ 
    //Contrasena coincide en la BD

    	$nom = "SELECT nombre_empresa FROM empresa WHERE email = '" . $_SESSION['email_empresa'] . "'";

      	if ($nombre_completo = $mysqli->query($nom)){
            while ($fila = $nombre_completo->fetch_row())
            {
                $nombre = $fila[0];
				        $_SESSION['nombre_empresa'] = $fila[0];
            }
        }
        else {
          echo ("error");
        }
        //header('Location: ficha_empresa.php');
	
?>
<!-- Login_empresa -> Empresa -> ficha_empresa -> Ajustes_empresa -->
<!-- Hoja de creacion de ofertas -->



<!DOCTYPE html>
<!-- Idea de ofertas diarias con paginacion -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Cheque</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/empresa.css">
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
                <a class="navbar-brand" href="../index.php">MASTERCHECK</a>
              </div><!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?> <span class="fa fa-user "></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="ficha_empresa.php">Perfi<span class="fa fa-sign-in"></span></a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="logout.php">Cerrar sesion<span class="fa fa-sign-in"></span></a></li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </div><!-- /.nav-inverse -->
        </div><!-- /.container-fluid -->
      </div><!-- /.navbar-wrapper -->
    </div>
  </div>








  <footer>
    <div class="container">
      <div class="panel-footer">
        Panel para pie de pagina

      </div>
    </div>
  </footer>




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="../js/sweetalert.min.js"></script>
  <script src="../js/usuario.js"></script>


</body>

</html>

<?php
  }
  else{
    echo "Las contraseñas no coindicen";
    echo '<script>swal({
                        title: "Error, las contraseñas no coindicen.",
                        text: "La contraseña introducida no es correcta, se te redirigira al panel de login.",
                        showConfirmButton: false,
                        type: "success",
                        timer: 5000
                        })</script>';
  /*echo '<script>swal({
        title: "Error en las contraseñas!",
        text: "Lo sentimos, la contraseña introducida no coincide con el email solicitado, se te redirigira automaticamente a la pantlla principal",
        timer: 5000,
        type: "error",
        showConfirmButton: false,
        })</script>';*/
  mysqli_close($mysqli);
} 

?>