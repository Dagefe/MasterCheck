<?php
 session_start();

 $_SESSION['email_empresa'] = $_POST['email'];
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
