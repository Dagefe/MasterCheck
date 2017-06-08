
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

<!--

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-lg-8">
        <div class="index-busc">
          <div class="wrapper">
            <div class="index-busc-cab">
              <form method="post" action="inserccion_oferta.php" name="form" enctype="multipart/form-data">
              <h3 class="titulo-busqueda">Formulario</h3>
                <input id="nombre" type="text" name="nombre" class="form-control inputForm" placeholder="Nombre *" required />
                <input id="desc" type="text" name="desc" class="form-control inputForm" placeholder="Descripcion *" required />
                <input id="precio" type="number" name="precio" class="form-control inputForm" placeholder="Precio *" required />
                <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control inputForm" placeholder="Fecha inicio *" required />
                <input id="fecha_fin" type="date" name="fecha_fin" class="form-control inputForm" placeholder="Fecha fin *" required />
                <select name="tipo" class="form-control inputForm" required>
                <option value="Bar">Bar</option>
                <option value="Pub">Pub</option>
                <option value="Restaurante">Restaurante</option>
                </select>
                <div class="form-group">
                  <label for="logotipo">Adjuntar logotipo</label>
                  <input type="file" id="logotipo" name="logotipo">
                </div>
                <div class="row">
                    <div class="ajusteLateralRegistro separacionTop">
                      <input type="submit" name="enviar" value="Subir oferta" id="btnAlta" class="btn btn-primary"/>
                      <a id="btnCancel" type="button" class="btn btn-warning" href="usuario.php">Cancelar</a>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
-->
<!-- Usando Flexbox -->
  <div class="container-fluid">
    <div class="flex-container">
      <div class="flex-item flex-item-centrado">
        <form method="post" action="inserccion_oferta.php" name="form" enctype="multipart/form-data">
          <h3 class="titulo-busqueda">Formulario</h3>
        </div>
        <div class="flex-item">
            <input id="nombre" type="text" name="nombre" class="form-control inputForm" placeholder="Nombre *" required />
        </div>
        <div class="flex-item">
            <input id="desc" type="text" name="desc" class="form-control inputForm" placeholder="Descripcion *" required />
        </div>
        <div class="flex-item">
            <input id="precio" type="number" name="precio" class="form-control inputForm" placeholder="Precio *" required />
        </div>
        <div class="flex-item">
            <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control inputForm" placeholder="Fecha inicio *" required />
        </div>
        <div class="flex-item">
            <input id="fecha_fin" type="date" name="fecha_fin" class="form-control inputForm" placeholder="Fecha fin *" required />
        </div>
        <div class="flex-item">
            <select name="tipo" class="form-control inputForm" required>
            <option value="Bar">Bar</option>
            <option value="Restaurante">Restaurante</option>
            </select>
        </div>
        <div class="flex-item">
            <div class="form-group">
              <label for="logotipo">Adjuntar logotipo</label>
              <input type="file" id="logotipo" name="logotipo">
            </div>
        </div>
        <div class="flex-item flex-item-centrado">
            <div class="row">
                <div class="ajusteLateralRegistro separacionTop">
                  <input type="submit" name="enviar" value="Subir oferta" id="btnAlta" class="btn btn-primary"/>
                  <a id="btnCancel" type="button" class="btn btn-warning" href="usuario.php">Cancelar</a>
                </div>
          </div>
        </div>
      </form>
    </div>
  </div><!-- Fin container-fluid -->


  <footer>
    <!--
    <div class="container">
      <div class="panel-footer">
        Panel para pie de pagina

      </div>
    </div>
  -->
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
    unset($_SESSION['email_empresa']);
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
