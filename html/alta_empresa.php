<?php
    session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Formulario de datos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/alta_empresa.css"/>
    <link rel="stylesheet" href="../css/general.css"/>

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
                <a class="navbar-brand" href="../index.php">MASTERCHEQUE</a>
              </div><!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?> <span class="fa fa-user "></span></a>
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
    </div>
  </div>

  <div class="container-fluid">
    <form method="post" action="inserccion_empresa.php">
      <!--
      <div class="row">
        <div class="col-xs-12 col-lg-4">
          <p class="text-info">Alta Empresa</p>
        </div>
        <div class="col-xs-12 col-lg-4">
          <p class="text-info"><b>* Campos obligatorios</b></p>
        </div>
      </div>
      -->
      <div class="row">
        <div class="col-xs-12 col-lg-4">
          <div class="index-busc">
            <div class="wrapper">
              <div class="index-busc-cab-acceso">
                <h3 class="titulo-busqueda">Datos de acceso</h3>
                  <div class="input-group">
                    <input id="email" type="text" name="email" class="form-control inputForm" placeholder="Email*" />
                    <input id="contrasena" type="password" name="pass" class="form-control inputForm" placeholder="Contraseña*" />
                    <input id="recontrasena" type="password" name="repass" class="form-control inputForm" placeholder="Confirmar contraseña*" />
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-lg-4">
          <div class="index-busc">
            <div class="wrapper">
              <div class="index-busc-cab-contacto">
                <h3 class="titulo-busqueda">Datos de contacto</h3>
                  <div class="input-group">
                    <input id="name" type="text" name="name" class="form-control inputForm" placeholder="Nombre y apellidos*" />
                    <input id="movil" type="text" name="movil" class="form-control inputForm" placeholder="Movil*" />
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-lg-4">
          <div class="index-busc">
            <div class="wrapper">
              <div class="index-busc-cab-datos-empresa">
                <h3 class="titulo-busqueda">Datos de la empresa</h3>
                  <div class="input-group">
                    <input id="nameempresa" type="text" name="empresa" class="form-control inputForm" placeholder="Nombre de la empresa*" />
                    <input id="direccion" type="text" name="direccion" class="form-control inputForm" placeholder="Direccion*" />
                    <input id="poblacion" type="text" name="town" class="form-control inputForm" placeholder="Poblacion*" />
                    <input id="codpostal" type="text" name="cp" class="form-control inputForm" placeholder="Codigo Postal*" />
                    <input id="pais" type="text" name="pais" class="form-control inputForm" placeholder="Pais*" />
                    <input id="actividad" type="text" name="activ" class="form-control inputForm" placeholder="Actividad empresarial*" />
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-lg-10">
        <div class="index-busc">
          <div class="wrapper">
            <div class="index-busc-cab-datos-botonera">
              <button id="btnEnviar" input name="Crear" type="submit" class="btn btn-primary">Dar de Alta</button>
              <button id="btnBorrar" name="Borrar" type="button" class="btn btn-danger"
                      data-toggle="modal" data-target="#miModal">Borrar</button>
              <a id="btnOlvido" class="btn btn-primary" role="button" href="forgotten_empresa.php">¿Has olvidado tu contraseña?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>



  <!-- Dialogo modal para borrar -->
  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
	            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                     <span aria-hidden="true">&times;</span>
		                </button>
		                <h4 class="modal-title" id="myModalLabel">Vaciar formulario</h4>
	            </div>
	            <div class="modal-body">
		                ¿Esta seguro?
                    <button id="confirmDelete" type="button" class="close" data-dismiss= "modal">Confirmar</button>
	            </div>
         </div>
    </div>
  </div>

  <footer>



  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/alta_empresa.js"></script>
  <script src="fonts/glyphicons-halflings-regular.eot"></script>
</body>
</html>
