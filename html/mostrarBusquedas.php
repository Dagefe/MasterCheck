<?php


  $busqueda = $_POST['campoBusqueda'];

  //echo ("La busqueda es: " . $busqueda . "mia");

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

    <!-- To insert the icon: -->
    <link type="text/css" rel="stylesheet" href="../fontello/css/iconset.css" />
    <!-- <svg class="lnr lnr-linearicons"><use xlink:href="#lnr-linearicons"></use></svg> -->


  </head>
  <body>
    <div class="container">

      <div class="row">
        <div class="containerCabecera">

          Container de la cabecera
        </div>


      </div>

      <div class="row">


            <div class="col-xs-3">
              <div class="containerFilter">


                <span></span>Aqui van los filtros de busqueda
                <i class="icon-glass"></i>

              </div>
            </div>

            <div class="col-xs-8">
              <div class="containerSearch">
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
                <div class="row">
                  <div class="col-xs-12 listaProductos">
                    <?php echo ("La busqueda es: " . $busqueda . "mia"); ?>
                  </div>
                </div>



              </div>
            </div>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mostrarBusquedas.js"></script>
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <script src="../fonts/glyphicons-halflings-regular.eot"></script>
    <script src="../fontello/css/iconset.css"></script>

  </body>
</html>
