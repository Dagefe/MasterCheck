<!doctype html>
<html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Login cliente</title>

      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/login_cliente.css">
      <link rel="stylesheet" href="../css/index.css">


    </head>

    <body>
      <header>
      <!-- Arbol de navegacion -->
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 noPaddingDirectorio">
            <ol class="breadcrumb panelLogin">
              <li class="glyphicon glyphicon-home"><a href="../index.html">  Inicio</a></li>
              <li class="active"><a href="#">Particular</a></li>
              <!-- <li class="active">Data</li>-->
            </ol>
          </div>
        </div>
      </header>



      <section>

        <!-- Logotipo -->
        <div class="jumbotron">
          <p class="colorTitulo text-left">MASTER CHEQUE</p>
          <hr>
        </div>
      </section>

      <div class="container-fluid">

        <div class="row">
          <div class="col-xs-12 col-md-8 col-lg-8">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title text-center">Bienvenido al área de cliente</h3>
              </div>

                <div class="panel-body">
                  <h5 class="text-center">Iniciar sesion</h5>
                  <div class="col-xs-12 col-md-8 col-lg-12">
                  <form method="post" action="ficha_cliente.php" name="form">

                    <div class="input-group ajusteLateral">
                      <input id="email" name="email" type="email" placeholder="email" class="email"
                         onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" />

                      <input id="password" name="pass" type="password" placeholder="Contraseña" class="contra"
                         onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" />
                    </div>

                  <div class="input-group-btn ajusteLateral separacionTop">
                    <button id="btnAcceder" name="acceder" type="submit" class="btn btn-primary">Acceder</button>
                    <?php 

                      include_once('conexion.php');

                      if(@$_POST['acceder']){
                        //Comprobamos que el email y la contraseña son correctos
                        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']))
                          {


                          }


                    ?>
                    <a id="btnAlta" class="btn btn-primary" role="button" href="alta_cliente.php">Alta nueva</a>
                    <a id="btnOlvido" class="btn btn-primary" role="button" href="olvido.html">¿Has olvidado tu contraseña?</a>
                  </div>

                  </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

      <script src="js/login_cliente.js"></script>

    </body>
</html>
