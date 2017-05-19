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
    <link rel="stylesheet" href="../css/formEmpresa.css"/>

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

        <div class="container">
            <div class="recuadroBlanco">
            <form action="alta_empresa.php" method="post">
            <h3>Alta nueva empresa</h3>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class=" panel-title text-center">Datos de acceso</h3>
                </div>
                <div class="input-group">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-10">
                                <input id="email" type="text" name="email" class="form-control inputForm" placeholder="Email*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="contrasena" type="password" name="pass" class="form-control inputForm" placeholder="Contraseña*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="recontrasena" type="repassword" name="repass" class="form-control inputForm" placeholder="Confirmar contraseña*" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Datos de contacto</h3>
                </div>
                <div class="input-group">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-10">
                                <input id="name" type="text" name="name" class="form-control inputForm" placeholder="Nombre y apellidos*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="movil" type="text" name="movil" class="form-control inputForm" placeholder="Movil*" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Datos de la empresa</h3>
                </div>
                <div class="input-group">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-10">
                                <input id="nameempresa" type="text" name="empresa" class="form-control inputForm" placeholder="Nombre de la empresa*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="poblacion" type="text" name="town" class="form-control inputForm" placeholder="Poblacion*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="codpostal" type="text" name="cp'" class="form-control inputForm" placeholder="Codigo Postal*" />
                            </div>
                            <div class="col-xs-12 col-lg-10">
                                <input id="actividad" type="text" name="activ" class="form-control inputForm" placeholder="Actividad empresarial*" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5><b>*Campos obligatorios</b></h5>
            <div class="input-group">
                <div class="panel-body">
                    <div class="row">
                            <div class="col-xs-12 col-lg-10">
                                <input id="btnEnviar" name="Crear" value="Crear cuenta" class="btn btn-primary inputForm" />
                                <input id="btnBorrar" name="Borrar" value="Borrar los campos" class="btn btn-danger inputForm" />
                            </div>
                    </div>
                </div>
            </div>
            </form>
            </div>
        </div>
    </section>
    <footer>



    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/formEmpresa.js"></script>
    <script src="fonts/glyphicons-halflings-regular.eot"></script>
</body>
</html>

<?php
    if(@$_POST['Crear']){
        //Incluimos nuestros credenciales de acceso a la base de datos
        include_once('conexion.php');
        //Inicializamos las variables a false
        $datos_acceso = false; $datos_contacto = false; $datos_empresa = false;
        //Comprobacion datos de acceso estan rellenados
        if($_POST['email'] != "" && isset($_POST['email']) && $_POST['pass'] != "" && isset($_POST['pass']) && $_POST['repass'] != "" && isset($_POST['repass'])){
            $datos_acceso = true;
        }
        //Comprobacion datos de contacto estan rellenados
        if($_POST['movil'] != "" && isset($_POST['movil']) && $_POST['name'] != "" && isset($_POST['name'])){
            $datos_contacto = true;
        }
        //Comprobacion datos de empresa estan rellenados
        if($_POST['empresa'] != "" && isset($_POST['empresa']) && $_POST['town'] != "" && isset($_POST['town']) && $_POST['cp'] != "" && isset($_POST['cp']) && $_POST['activ'] != "" && isset($_POST['activ'])){
            $datos_empresa = true;
        }
        //En el caso de que esten todos rellenados sigue el proceso
        if($datos_acceso = true && $datos_contacto = true && $datos_empresa = true){
            //Comprobacion que las contraseñas coindicen
            if($_POST['pass'] === $_POST['repass']){
                //Al igual que con los cliente, encriptaremos las contrseñas de los clientes de las empresas para que sea mas dificil robar datos
                //Leemos la contraseña clave de nuestro archivo
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($handle));
                fclose($handle);
                //Encriptamos las contreaseñas con el metodo sha1
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli('127.0.0.1', $user, $pass, $base_datos);
                if(!$mysqli->query('&&&CAMBIAR BASE DE DATOS&&&')){
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else{
                    // Cerramos la conexion
                    mysqli_close($mysqli);
                    //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                    //con su usuario ya logeado
                    $_SESION['user'] = $_POST['email'];
                    header('Location: http://localhost/index.php');
                }

            }
            //En el caso de que no coindican las contraseñas
            else echo "Las contraseñas no coindicen";
        }
        //En el caso de que falte algun campo por completar
        else echo "Tienes que completar todos los campos para poder registrarte como empresa, disculpen las molestias";
    }

?>
