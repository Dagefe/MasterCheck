<?php
  session_start();
  include_once 'conexion.php';

     $mysqli = new mysqli(db_server,db_username, db_password, db_database);

       if (mysqli_connect_errno())
         { //Posible error al conectar a la base de datos
           printf("Error de conexión: %s\n", mysqli_connect_error());
           exit();
         }

         $empresaID = "SELECT id FROM empresa WHERE email = '" . $_SESSION['email_empresa'] . "'";


         if ($id_empresa = $mysqli->query($empresaID))
         {
           $fila_empresa = $id_empresa->fetch_row();
           $id_Empresa= $fila_empresa[0];
           $_SESSION['id_empresa'] = $fila_empresa[0];

         }
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
    <link rel="stylesheet" href="../css/sweetalert.css">
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
                  <a class="navbar-brand" href="empresa.php">MASTERCHEQUE</a>
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
                  <h3>Ofertas de <?php echo $_SESSION['pais_empresa']; ?></h3>
                </div>
                <div class="scrollLateral">
                 
                  <!--div class="flex-foto">
                    <div class="img-thumbnail">
                      <img src="../imagenes/naru.jpg">
                    </div>
                  </div-->


<?php
      $nom = "SELECT * FROM ofertas WHERE id_empresa = '" . $id_Empresa . "'";
        $htmlbody = '';
         if ($oferta = $mysqli->query($nom))
         {

           while ($fila = $oferta->fetch_row())
           {
             $id_oferta = $fila[0];
             $nombre_oferta = $fila[1];
             $imagen_oferta = $fila[2];
             $descripcion_oferta = $fila[4];
             $precio_oferta = $fila[5];
             $fecha_inicio = $fila[6];
             $fecha_fin = $fila[7];
             $baseimagen = base64_encode($imagen_oferta);
             $htmlbody .= <<<HEAD

             <form method="POST" action="mis_ofertas.php">
             <div class="flex-container">
                <div class="flex-foto">
                  <div class="img-thumbnail">
                    <img src="data:image/jpeg;base64,$baseimagen"/>
                  </div>
                </div>
                <div class="flex-contenido">
                  <div class="row row-superior">
                    <div class="espacioInputs">
                      <label class="col-sm-2 control-label" for="formGroup">Nombre</label>
                      <div class="col-sm-4">
                          <input class="form-control" name="nombre_oferta" type="text" id="formGroup" value="$nombre_oferta">
                      </div>

                      <label class="col-sm-2 control-label" for="formGroup">Descripcion</label>
                      <div class="col-sm-4">
                          <input class="form-control" name="descripcion_oferta" type="text" id="formGroup" value="$descripcion_oferta">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="espacioInputs">
                      <label class="col-sm-2 control-label" for="formGroup">Precio</label>
                      <div class="col-sm-3">
                          <input class="form-control" name="precio_oferta" type="text" id="formGroup" value="$precio_oferta">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="espacioInputs">
                      <label class="col-sm-2 control-label" for="formGroup">Inicio</label>
                      <div class="col-sm-4">
                        <input class="form-control" name="fecha_ini" type="date" id="formGroup" value="$fecha_inicio">
                      </div>

                      <label class="col-sm-2 control-label" for="formGroup">Fin</label>
                      <div class="col-sm-4">
                          <input class="form-control" name="fecha_fin" type="date" id="formGroup" value="$fecha_fin">
                      </div>
                    </div>
                    <input type="hidden" name="id_ofertas" value="$id_oferta" />
                    <input type="submit" name="borrar" class="btn btn-danger" value="Borrar oferta">
                    <input type="submit" name="editar" class="btn btn-danger" value="Editar oferta">
                  </div>
              </div>
            </div>
            </form>
HEAD;
           }
         }

     mysqli_close($mysqli);

?>
                  <?php echo $htmlbody?>
                  
                </div>
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
                <span class="fa fa-user"></span><a href="ficha_empresa.php">Perfil de empresa</a>
                <!-- Si estas en esta pagina se muestra sin enlace -->
              </li>
              <li>
                <span class="fa fa-cog"></span><a href="ajustes_empresa.php">Ajustes de cuenta</a>
              </li>
              <li class="selected">
                <span class="fa fa-star"></span>Mis ofertas
              </li>
              <li>
                <span class="fa fa-sign-out"></span><a href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/sweetalert.min.js"></script>
  </body>
</html>
<?php
  if (@$_POST['borrar']){
      $mysqli = new mysqli(db_server,db_username, db_password, db_database);
      if (mysqli_connect_errno())
         { //Posible error al conectar a la base de datos
           printf("Error de conexión: %s\n", mysqli_connect_error());
           exit();
         }
      $delete_oferta = "DELETE FROM ofertas WHERE id_oferta=" . $_POST['id_ofertas'];
      if ($oferta = $mysqli->query($delete_oferta))
        {
          echo '<script>swal({
                  title: "¡Hecho!",
                  text: "Oferta borrada correctamente",
                  confirmButtonText: "Aceptar",
                  type: "success"
                  }, function() {
                  window.location = "mis_ofertas.php";
                })</script>';
                mysqli_close($mysqli);
        }
  }
  elseif(@$_POST['editar']) {
    $mysqli = new mysqli(db_server,db_username, db_password, db_database);
      if (mysqli_connect_errno())
         { //Posible error al conectar a la base de datos
           printf("Error de conexión: %s\n", mysqli_connect_error());
           exit();
         }
    $editar_oferta = "UPDATE ofertas SET nombre='" . $_POST['nombre_oferta'] . "', descripcion='" . $_POST['descripcion_oferta'] . "', precio=" . $_POST['precio_oferta'] . ", fecha_inicio='" . $_POST['fecha_ini'] . "', fecha_fin='" . $_POST['fecha_fin'] . "' WHERE id_oferta=" . $_POST['id_ofertas'];
      if ($oferta = $mysqli->query($editar_oferta))
        {
          echo '<script>swal({
                  title: "¡Hecho!",
                  text: "Oferta editada correctamente",
                  confirmButtonText: "Aceptar",
                  type: "success"
                  }, function() {
                  window.location = "mis_ofertas.php";
                })</script>';
                mysqli_close($mysqli);
      }
  }
?>