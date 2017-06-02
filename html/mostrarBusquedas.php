<?php

  include_once ("conexion.php");

  $busqueda = $_POST['campoBusqueda'];

  if (isset($_POST['tipo']) && $_POST['tipo'] == "bar")
  {
    $tipo = "bar";
  }
  else if (isset($_POST['tipo']) && $_POST['tipo'] == "rest")
  {
    $tipo = "restaurante";
  }


  $mysqli = new mysqli(db_server, db_username, db_password, db_database);

  if ($mysqli->connect_errno) {
      printf("Falló la conexión: %s\n", $mysqli->connect_error);
      exit();
  }




  /* Consultas de selección que devuelven un conjunto de resultados */
  if ($resultado = $mysqli->query("SELECT * FROM ofertas WHERE nombre = '$busqueda' and tipo = '$tipo'")) {

      //printf("La selección devolvió %d filas.\n", $resultado->num_rows);
      $oferta = $resultado->fetch_assoc();
      /* liberar el conjunto de resultados */
      $resultado->close();
  }
  $mysqli->close();
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
    <link type="text/css" rel="stylesheet" href="../fontello/css/iconset.css" />
    <!-- <svg class="lnr lnr-linearicons"><use xlink:href="#lnr-linearicons"></use></svg> -->


  </head>
  <body>
    <header>
    <!-- Arbol de navegacion -->
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 noPaddingDirectorio">
          <ol class="breadcrumb panelLogin">
            <li class="glyphicon glyphicon-home"><a href="../index.html">  Inicio</a></li>
            <li class="active"><a href="#">Ofertas</a></li>
            <!-- <li class="active">Data</li>-->
          </ol>
        </div>
      </div>
    </header>
    <section>
    <div class="container">

      <div class="row">
        <div class="containerCabecera">



        </div>


      </div>

      <div class="row">
            <div class="col-xs-3 col col-lg-p">
              <div class="containerFilter">
                <ul class="unstyled">
                  <li class="separador" data-sort-index="0">
                    <label class="controlList-label">
                      <input class="control-input checkboxTick" name="cuisine" value="all" checked="" type="checkbox">
                      <span class="lineaFiltro" data-test-cuisine="Todos"></span>
                      Todos (<span data-cuisine-total="">4</span>)
                    </label>
                  </li>

                  <li class="" data-test="cuisineFilterItem" data-seo-name="americana" data-cuisine-filter-item="" data-sort-index="1">
                    <label class="controlList-label">
                      <input class="control-input checkboxTick" name="cuisine" value="americana" type="checkbox">
                        <span class="lineaFiltro" data-test-cuisine="Comida Americana"></span>
                        Bar (<span data-cuisine-total="">1</span>)
                      </label>

                      <label class="controlList-label">
                        <input class="control-input checkboxTick" name="cuisine" value="americana" type="checkbox">
                          <span class="lineaFiltro" data-test-cuisine="Comida Americana"></span>
                          Restaurante (<span data-cuisine-total="">1</span>)
                        </label>

                    </li>
                </ul>
              </div>
            </div>

            <div class="col-xs-8">
              <div class="containerSearch">
                <div class="row">
                  <div class="col-xs-12 listaProductos">

                    <div id="imagenNegocio" class="col-xs-2 paddingImagen">
                      <img class="img-thumbnail" src="../imagenes/naru-torrelodones-escalado.jpg">
                    </div>

                    <div class="col-xs-7 separadorLateral">
                      <h3 class="tituloOferta"><?php echo ($oferta['nombre']); ?></h3>
                      <p class="infoText"><strong>Descripcion:</strong> <?php echo ($oferta['descripcion']); ?></p>
                      <p class="infoText"><strong>Precio:</strong> <?php echo ($oferta['precio']); ?> euros</p>
                    </div>

                    <div class="col-xs-3">
                      <div class="paddingFecha">
                        <span>Inicio: <?php echo ($oferta['fecha_inicio']); ?> </span>
                      </div>
                      <span>Fin:</span> <?php echo ($oferta['fecha_fin']); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                </div>



              </div>
            </div>

      </div>
    </div>
  </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mostrarBusquedas.js"></script>
    <script src="../js/index.js"></script>
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <script src="../fonts/glyphicons-halflings-regular.eot"></script>




  </body>
</html>
