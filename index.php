<?php
 session_start();
 include_once ('html/conexion.php');



 if (isset($_SESSION['email_empresa'])){
  header('Location: html/empresa.php');
 }
 elseif (isset($_SESSION['email_cliente'])) {
   header('Location: html/usuario.php');
 }
 else{
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- To insert the icon: -->
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.css" />

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
                <a class="navbar-brand" href="index.php">MASTERCHEQUE</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <!-- <li><a href="html/login_cliente.html">Particular</a></li>
                  <li><a href="html/login_empresa.html">Empresa</a></li> -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="fa fa-user"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="html/login_cliente.html">Particular&nbsp;&nbsp;<span class="fa fa-sign-in"></span></a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="html/login_empresa.html">Empresa&nbsp;&nbsp;<span class="fa fa-sign-in"></span></a></li>
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


  <div class="">

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
              <img src="imagenes/fondo1.jpg" alt="Bar Santos">
            </div>

            <div class="item">
              <img src="imagenes/fondo2.jpg" alt="CBar Naru">
            </div>

            <div class="item">
              <img src="imagenes/fondo3.jpg" alt="Bar Pata Negra">
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
              <h3 class="titulo-busqueda">Busca tu oferta mas cercana</h3>

              <form method="post" action="html/mostrarBusquedas.php">

                <!-- Fila de busqueda siempre visible -->
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-xs-12 col-sm-8 col-lg-8">

                      <div class="input-group">
                        
                        <input name="campoBusqueda" type="search" class="form-control" placeholder="Introduce tu busqueda">

                        <div class="input-group-btn">
                          <button id="btnBuscar" type="submit" class="btn btn-primary" href="">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-9 col-sm-1 col-lg-1 col-xs-offset-2 col-lg-pull-2 col-sm-pull-2">
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
                  <div id="busquedaAvanzada" class="row paddingBusquedaAvanzada" style="display:none">
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
                </div><!-- Fin container-fluid -->
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
              <div class="box-empresas">
                <h3 class="text-left titulo-empresas">Ofertas destacadas</h3>
                  <div class="row">
                  <?php

                    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

                    //Query contar cuantas ofertas en total
                    $count_all = "SELECT COUNT(*) FROM ofertas";
                    if ($co_all = $mysqli->query($count_all)){
                      $_SESSION['count_all'] = mysqli_num_rows($co_all);
                    }

                    $nom = "SELECT * FROM ofertas";
                    $htmlbody = '';

                    if ($oferta = $mysqli->query($nom))
                    {

                        while ($fila = $oferta->fetch_row()) {

                          $imagen_oferta = $fila[2];
                          $baseimagen = base64_encode($imagen_oferta);
                          $htmlbody .= <<<HEAD
                            <div class="col-xs-6 col-md-3">
                              <a href="#" class="thumbnail">
                                <img class="ajusteImagen" src="data:image/jpeg;base64,$baseimagen"/>
                              </a>
                            </div>
HEAD;
                        }
                    }

                 mysqli_close($mysqli);

                 ?>
                 <?php echo $htmlbody; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/index.js"></script>
  <script src="fonts/glyphicons-halflings-regular.eot"></script>

</body>

</html>
<?php
}
?>
