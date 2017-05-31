<?php
 session_start();

if(@$_POST['enviar'])
  {
    include_once 'conexion.php';

    $email = $_POST['email'];
    $contrasena = $_POST['contra'];

    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

      if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
          printf("Error de conexión: %s\n", mysqli_connect_error());
          exit();
        }

        //Recogemos nuestra clave maestra
        $fichero = "clavex.txt";
        $handle = fopen('clavex.txt', "r");
        $clavex = fread($handle, filesize($fichero));
        fclose($handle);

        //Encriptamos la clave introducida
        $clave_has = openssl_encrypt($contrasena, "AES-128-ECB", $clavex);

        //Seleccionamos de la BD la contraseña por el email introducido
        $query = "SELECT contrasena FROM Clientes WHERE email = '" . $email . "'";
        //Ejecutamos query
        $res = $mysqli->query($query);
        $row = $res->fetch_array(MYSQLI_NUM);
        //Comparamos la clave introducida encriptada por la clave en la BD
        if($row[0] === $clave_has){
            //Contrasena coincide en la BD

            $nom = "SELECT nombre,apellidos,movil,provincia FROM Clientes WHERE email = '" . $email . "'";

            if ($nombre_completo = $mysqli->query($nom)){
              while ($fila = $nombre_completo->fetch_row()){

                $nombre = $fila[0];
                $_SESSION['apellidos_usuario'] = $fila[1];
                $_SESSION['movil_usuario'] = $fila[2];
                $_SESSION['provincia_usuario'] = $fila[3];  
              }
            }
            else {
              echo ("error");
            }
?>
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
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/general.css">
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
                <a class="navbar-brand" href="../index.html">MASTERCHECK</a>
              </div><!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a><?php echo $nombre; ?></a></li>
                  <li><a href="ficha_cliente.php">Perfil</a></li>
                  <li><a href="logout.php">Cerrar sesion</a></li> <!-- Como cerrar sesion???? -->
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </div><!-- /.nav-inverse -->
        </div><!-- /.container-fluid -->
      </div><!-- /.navbar-wrapper -->
    </div>
  </div>

  <!-- Slider de imagenes de fondo -->
  <div class="row">
    <div class="col-xs-12 col-md-8 col-lg-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="../imagenes/fondo1.jpg" alt="Bar Santos">
          </div>

          <div class="item">
            <img src="../imagenes/fondo2.jpg" alt="CBar Naru">
          </div>

          <div class="item">
            <img src="../imagenes/fondo3.jpg" alt="Bar Pata Negra">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Panel de busqueda -->
  <div class="row">
    <div class="col-xs-12 col-md-8 col-lg-12">
      <div class="index-busc">
        <div class="wrapper">
      <div class="index-busc-cab">
          <h3 class="panel-title text-center">Busca tu oferta mas cercana</h3>

        <form method="post" action="html/mostrarBusquedas.php">

            <!-- Fila de busqueda siempre visible -->
            <div class="row">
              <div class="col-xs-12 col-sm-8 col-lg-8">

                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Nombre <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Nombre  <span class="glyphicon glyphicon-search"></span></a></li>
                      <li><a href="#">CP  <span class="glyphicon glyphicon-search"></span></a></li>
                      <li><a href="#">Ciudad  <span class="glyphicon glyphicon-search"></span></a></li>
                    </ul>
                  </div>

                  <input name="campoBusqueda" type="search" class="form-control" placeholder="Introduce tu busqueda">

                  <div class="input-group-btn">
                    <button id="btnBuscar" type="submit" class="btn btn-primary" href="">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-xs-9 col-sm-1 col-lg-1 col-xs-offset-2 col-lg-pull-2 col-sm-pull-2 paddingBusquedaAvanzada">
                <div class="input-group">
                  <div class="input-group-btn">
                    <button class="btn btn-primary etiquetaLupa" href="#" role="button">
                      Busqueda avanzada
                    </button>
                  </div>
                  <div id="btnBusquedaAvanzada" class="input-group-btn">
                    <a id="iconoLupa" class="btn btn-primary" href="#" role="button">
                      <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

                <!-- Fila de busqueda avanzada visible al activar -->
                <div id="busquedaAvanzada" class="row" style="display:none">
                  <div class="col-xs-12 col-lg-2">
                    <div class="input-group-btn paddingOculto">
                      <span class="input-group-addon paddingOcultoFondo">
                                    <span class="fa fa-cutlery" aria-hidden="true"></span>
                      <input id="restaurante" name="tipo" type="checkbox" value="rest">
                      </span>
                      <span class="input-group-addon paddingOcultoFondo">
                                    <span class="fa fa-glass" aria-hidden="true"></span>
                      <input id="bar" name="tipo" type="checkbox" value="bar">
                      </span>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

      <!-- Imagenes de bares -->
      <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-12">
          <div class="index-busc ofertasDestacadas">
            <div class="wrapper">
              <div class="index-busc-cab cuadro-ofertas">
                <h3 class="panel-title text-left">Empresas destacadas</h3>
              <!--
              <span class="input-group-btn">

                <a class="btn btn-primary" href="#" role="button">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="btn btn-primary" href="#" role="button">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>

              </span>
              -->
                <div class="row">
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                      <img id="santos" src="../imagenes/barSantos.jpg" onclick="aumentarImg()" alt="Bar Santos">
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                      <img src="../imagenes/pataNegra.jpg" alt="Bar Pata Negra">
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                      <img src="../imagenes/naru.jpg" alt="Bar Naru">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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


</body>

</html>

<?php
 $_SESSION['nombre_usuario'] = $nombre;
 //expira en una hora


        }
        else{
          echo "<p>Lo sentimos pero la contraseña introducida no es correcta, por favor, vuelve a intentarlo.<p><br>";
              //ventana y que te regrese a la de login.

        }
			mysqli_close($mysqli);

    }


?>
