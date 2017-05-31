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
    <!-- Arbol de navegacion -->
    <header>
        <ol class="breadcrumb">
            <li class="glyphicon glyphicon-home"><a href="../index.html"> Inicio</a></li>
            <li><a href="login_empresa.html">Empresa</a></li>
            <li class="active">Alta empresa</li>
        </ol>
    </header>

    <section>

      <div class="container-fluid">
          <form method="post" action="inserccion_empresa.php">
            <div class="row">
              <div class="col-xs-12 col-lg-4">
                <p class="text-info">Alta Empresa</p>
              </div>
              <div class="col-xs-12 col-lg-4">
                <p class="text-info"><b>* Campos obligatorios</b></p>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class=" panel-title text-center">Datos de acceso</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12 col-lg-8">
                    <input id="email" type="text" name="email" class="form-control inputForm" placeholder="Email*" />
                    <input id="contrasena" type="password" name="pass" class="form-control inputForm" placeholder="Contraseña*" />
                    <input id="recontrasena" type="password" name="repass" class="form-control inputForm" placeholder="Confirmar contraseña*" />
                  </div>
                  <div class="col-xs-12 col-lg-3">
                    <div class="input-group">
                      <label class="inputForm">Obligatorio</label>
                      <label class="inputForm">Obligatorio</label>
                      <label class="inputForm">Obligatorio</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title text-center">Datos de contacto</h3>
              </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 col-lg-8">
                      <input id="name" type="text" name="name" class="form-control inputForm" placeholder="Nombre y apellidos*" />
                      <input id="movil" type="text" name="movil" class="form-control inputForm" placeholder="Movil*" />
                    </div>
                  </div>
                </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title text-center">Datos de la empresa</h3>
              </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 col-lg-10">
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
            <div class="row">
              <div class="col-xs-12 col-lg-10">
                <div class="botonera">
                  <button id="btnEnviar" input name="Crear" type="submit" class="btn btn-primary">Dar de Alta</button>
                  <button id="btnBorrar" name="Borrar" type="button" class="btn btn-danger"
                          data-toggle="modal" data-target="#miModal">Borrar</button>
                  <a id="btnOlvido" class="btn btn-primary" role="button" href="forgotten_empresa.php">¿Has olvidado tu contraseña?</a>
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
    </section>
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