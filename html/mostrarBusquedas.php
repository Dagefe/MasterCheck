<?php
  session_start();
  include_once ("conexion.php");

  $busqueda = $_POST['campoBusqueda'];

  if ($_POST['tipo'] == "bar")
  {
    $tipo = "bar";
  }
  else if ($_POST['tipo'] == "rest")
  {
    $tipo = "restaurante";
  }
  //else $tipo = '%';

  $mysqli = new mysqli(db_server, db_username, db_password, db_database);

  if ($mysqli->connect_errno) {
      printf("Falló la conexión: %s\n", $mysqli->connect_error);
      exit();
  }

  //Query contar cuantas ofertas en total
  $count_all = "SELECT COUNT(*) FROM ofertas WHERE nombre LIKE '%" . $busqueda . "%' AND tipo LIKE '" . $tipo . "'";
  if ($co_all = $mysqli->query($count_all)){
    $_SESSION['count_all'] = mysqli_num_rows($co_all);
  }
  //Query contar cuantas ofertas de bar hay
  $count_bar = "SELECT COUNT(*) FROM ofertas WHERE nombre LIKE '%" . $busqueda . "%' AND tipo = 'Bar'";
  if ($co_bar = $mysqli->query($count_bar)){
    $_SESSION['count_bar'] = mysqli_num_rows($co_bar);
  }
  //Query contar cuantas ofertas de restaurante hay
  $count_rest = "SELECT COUNT(*) FROM ofertas WHERE nombre LIKE '%" . $busqueda . "%' AND tipo = 'Restaurante'";
  if ($co_rest = $mysqli->query($count_rest)){
    $_SESSION['count_rest'] = mysqli_num_rows($co_rest);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mostrarBusquedas.css">
    <link rel="stylesheet" href="../css/index.css">

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

    <div class="container">

      <div class="row">
        <div class="containerCabecera">


        </div>
      </div>

      <div class="row">
            <div class="col-xs-4 col col-lg-3">
              <div class="containerFilter">
                <ul class="unstyled">
                  <li class="separador" data-sort-index="0">
                    <label class="controlList-label">
                      <input class="control-input checkboxTick" name="cuisine" value="all" checked="" type="checkbox">
                      <span class="lineaFiltro" data-test-cuisine="Todos"></span>
                      Todos (<span data-cuisine-total=""><?php echo $_SESSION['count_all']; ?></span>)
                    </label>
                  </li>

                  <li class="" data-test="cuisineFilterItem" data-seo-name="americana" data-cuisine-filter-item="" data-sort-index="1">
                    <label class="controlList-label">
                      <input class="control-input checkboxTick" name="cuisine" value="americana" type="checkbox">
                        <span class="lineaFiltro" data-test-cuisine="Comida Americana"></span>
                        Bar (<span data-cuisine-total=""><?php echo $_SESSION['count_bar']; ?></span>)
                      </label>

                      <label class="controlList-label">
                        <input class="control-input checkboxTick" name="cuisine" value="americana" type="checkbox">
                          <span class="lineaFiltro" data-test-cuisine="Comida Americana"></span>
                          Restaurante (<span data-cuisine-total=""><?php echo $_SESSION['count_rest']; ?></span>)
                        </label>

                    </li>
                </ul>
              </div>
            </div>

            <div class="col-xs-8 col-lg-9">
              <div class="containerSearch">
                <div class="row">
                  <div class="col-xs-12 listaProductos">

                    <?php
                    $search = "SELECT * FROM ofertas WHERE nombre LIKE '%" . $busqueda . "%' AND tipo LIKE '" . $tipo . "'";

                    $htmlbody = '';
                    if ($oferta = $mysqli->query($search)){

                      while ($fila = $oferta->fetch_row()){

                      $nombre_oferta = $fila[1];
                      $imagen_oferta = $fila[2];
                      $descripcion_oferta = $fila[4];
                      $precio_oferta = $fila[5];
                      $fecha_inicio = $fila[6];
                      $fecha_fin = $fila[7];
                      $baseimagen = base64_encode($imagen_oferta);
                      $htmlbody .= <<<HEAD



                      <div id="imagenNegocio" class="col-xs-2 col-lg-2 paddingImagen">
                        <img src="data:image/jpeg;base64,$baseimagen"/>
                      </div>

                      <div class="col-xs-7 col-lg-8 separadorLateral">
                        <h3 class="tituloOferta">$nombre_oferta</h3>
                        <p class="infoText"><strong>Descripcion:</strong> $descripcion_oferta</p>
                        <p class="infoText"><strong>Precio:</strong> $precio_oferta euros</p>
                      </div>

                      <div class="col-xs-3 col-lg-2">
                        <div class="box-fecha">
                          <div class="paddingFecha">
                            <span><strong>Inicio:</strong> $fecha_inicio</span>
                          </div>
                          <span><strong>Fin:</strong> $fecha_fin</span>
                        </div>
                      </div>
HEAD;
                      }

                    }
  /* Consultas de selección que devuelven un conjunto de resultados */
  $mysqli->close();
?>

                <?php echo $htmlbody; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mostrarBusquedas.js"></script>
    <script src="../js/index.js"></script>
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <script src="../fonts/glyphicons-halflings-regular.eot"></script>
  </body>
</html>
