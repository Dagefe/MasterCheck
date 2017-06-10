<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Ofertas</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/mis_ofertas.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

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
                  <a class="navbar-brand" href="ficha_empresa.php">MASTERCHECK</a>
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
              <div class="index-busc-cab-ofertas">
                <div class="header">
                  <h3>Ofertas <?php echo $_SESSION['nombre_empresa']; ?></h3>
                </div>

                <div class="flex-container">
                  <div class="flex-foto">
                    <img src="../imagenes/naru.jpg">
                  </div>

                  <div class="flex-contenido">

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>
