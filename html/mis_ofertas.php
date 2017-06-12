<?php

  session_start();
  include_once 'conexion.php';

     $mysqli = new mysqli(db_server,db_username, db_password, db_database);

       if (mysqli_connect_errno())
         { //Posible error al conectar a la base de datos
           printf("Error de conexión: %s\n", mysqli_connect_error());
           exit();
         }

         $empresaID = "SELECT id FROM empresa WHERE nombre_empresa = '" . $_SESSION['pais_empresa'] . "'";


         if ($id_empresa = $mysqli->query($empresaID))
         {
           $fila_empresa = $id_empresa->fetch_row();
           $id_Empresa= $fila_empresa[0];
           $_SESSION['id_empresa'] = $fila_empresa[0];

         }

          $nom = "SELECT * FROM ofertas WHERE id_empresa = '" . $id_Empresa . "'";

         if ($oferta = $mysqli->query($nom))
         {

           while ($fila = $oferta->fetch_row())
           {

             $nombre_oferta = $fila[1];
             $imagen_oferta = $fila[2];
             $descripcion_oferta = $fila[4];
             $precio_oferta = $fila[5];
             $fecha_inicio = $fila[6];
             $fecha_fin = $fila[7];

           }
         }

     mysqli_close($mysqli);

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
                  <ul class="nav navbar-nav navbar-right">
                    <!--<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['pais_empresa']; ?> <span class="fa fa-user "></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="ficha_empresa.php">Perfi<span class="fa fa-sign-in"></span></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Cerrar sesion<span class="fa fa-sign-in"></span></a></li>
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
          <h3 class="welcomeUser">Bienvenido <?php echo $_SESSION['pais_empresa']; ?></h3>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="index-busc">
            <div class="wrapper">
              <div class="index-busc-cab-ofertas">
                <div class="header">
                  <h3>Ofertas <?php echo $_SESSION['pais_empresa']; ?></h3>
                </div>


                <?php

                  foreach ($fila as $key => $value) {
                    echo '<div class="flex-container">';
                      echo '<div class="flex-foto">';
                        echo '<div class="img-thumbnail">';
                          echo '<img src="../imagenes/naru.jpg">';
                        echo '</div>';
                      echo '</div>';

                      echo '<div class="flex-contenido">';

                        echo '<div class="row row-superior">';
                            echo '<label class="col-sm-3 control-label" for="formGroup">Nombre</label>';
                            echo '<div class="col-sm-3">';
                              echo '<input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $nombre_oferta; ?>" readonly>';
                            echo '</div>';

                            echo '<label class="col-sm-3 control-label" for="formGroup">Descripcion</label>';
                              echo '<div class="col-sm-3">';
                              echo '<input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $descripcion_oferta; ?>" readonly>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<label class="col-sm-3 control-label" for="formGroup">Precio</label>';
                            echo '<div class="col-sm-3">';
                              echo '<input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $precio_oferta; ?>" readonly>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<label class="col-sm-3 control-label" for="formGroup">Inicio</label>';
                            echo '<div class="col-sm-3">';
                              echo '<input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $fecha_inicio; ?>" readonly>';
                            echo '</div>';

                            echo '<label class="col-sm-3 control-label" for="formGroup">Fin</label>';
                            echo '<div class="col-sm-3">';
                              echo '<input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $fecha_fin; ?>" readonly>';
                            echo '</div>';
                        echo '</div>';

                      echo '</div>';
                  }
                ?>


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
