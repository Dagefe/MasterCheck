<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sweetalert.css">
  </head>
  <body>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="../js/insercion_cliente.js"></script>
    <script src="../js/sweetalert.min.js"></script>
  </body>
</html>



<?php
  session_start();
    //Incluimos nuestros credenciales de acceso a la base de datos
    include_once 'conexion.php';

    //Inicializamos las variables a false
    $datos_acceso = false;
    $datos_contacto = false;
    $datos_empresa = false;

    //Comprobacion datos de acceso estan rellenados
    if($_POST['email'] != "" && isset($_POST['email']) && $_POST['pass'] != "" && isset($_POST['pass']) && $_POST['repass'] != "" &&isset($_POST['repass'])){
           $datos_acceso = true;
    }

    //Comprobacion datos de contacto estan rellenados
    if($_POST['movil'] != "" && isset($_POST['movil']) && $_POST['name'] != "" && isset($_POST['name'])){
        $datos_contacto = true;
    }

    //Comprobacion datos de empresa estan rellenados
    if($_POST['empresa'] != "" && isset($_POST['empresa']) && $_POST['direccion'] != "" && isset($_POST['direccion'])
       && $_POST['pais'] != "" && isset($_POST['pais']) && $_POST['town'] != "" && isset($_POST['town'])
       && $_POST['cp'] != "" && isset($_POST['cp']) && $_POST['activ'] != "" && isset($_POST['activ']))
    {
        $datos_empresa = true;
    }

    //En el caso de que esten todos rellenados sigue el proceso
    if($datos_acceso == true && $datos_contacto == true && $datos_empresa == true)
    {
        //Comprobacion que las contraseñas coindicen
        if($_POST['pass'] === $_POST['repass'])
        {

            //Nos conectamos a la base de datos y a la tabla elegida
            $mysqli = new mysqli(db_server, db_username, db_password, db_database);
            if (mysqli_connect_errno())
            {
                printf("Error de conexión: %s\n", mysqli_connect_error());
                exit();
            }

            //Query para comprobar que no hay 2 emails duplicados
            $query = "SELECT email FROM empresa WHERE email='" . $_POST['email'] . "'";
            $res = $mysqli->query($query);
            $row_cnt = $res->num_rows;

            if ($row_cnt > 0){ //Hay algun registro, con lo cual email duplicado
                echo '<script>swal({
                  title: "Error: Email duplicado",
                  text: "Lo sentimos, el email introducido esta duplicado, por favor seleccione otro.",
                  confirmButtonText: "Volver al formulario",
                  type: "error"
              }, function() {
                  window.location = "alta_empresa.php";
              })</script>';
            }
            else
            { //No hay email duplicados en nuestra base de datos

              //Al igual que con los cliente, encriptaremos las contrseñas de los clientes de las empresas para que sea mas dificil robar datos
              //Leemos la contraseña clave de nuestro archivo
              $fichero = "clavex.txt";
              $handle = fopen($fichero, "r");
              $clavex = fread($handle, filesize($fichero));
              fclose($handle);

              //Encriptamos las contreaseñas con el metodo sha1
              $clave_has = openssl_encrypt($_POST['pass'], "AES-128-ECB", $clavex);

              //Inicializamos las variables
              $email = $_POST['email']; $pass = $clave_has;
              $movil = $_POST['movil']; $contacto = $_POST['name'];
              $empresa = $_POST['empresa']; $pob = $_POST['town']; $cp = $_POST['cp'];
              $actividad = $_POST['activ']; $direccion = $_POST['direccion']; $pais = $_POST['pais'];

              //Query para insertar los valores
              $query = "INSERT INTO empresa VALUES (NULL, '$email', '$pass', '$contacto', $movil, '$empresa', '$direccion', '$pob', '$cp', '$pais', '$actividad')";

                if(!$mysqli->query($query))
                {
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else
                {
                  //printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);
                  // Cerramos la conexion
                  mysqli_close($mysqli);
                  //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                  //con su usuario ya logeado
                  $_SESSION['email_empresa'] = $_POST['email'];
                  $_SESSION['contra_empresa'] = $_POST['pass'];
                  echo '<script>swal({
                            title: "Bien",
                            text: "Datos introducidos correctamente",
                            confirmButtonText: "Aceptar",
                            type: "success"
                        }, function() {
                            window.location = "empresa.php";
                        })</script>';
                  //header('Location: ../index.html');
                }
            }
        }
        //En el caso de que no coindican las contraseñas
        else {
          echo '<script>swal({
                      title: "Error",
                      text: "Las contraseñas no coindicen.",
                      cancelButtonText: "Volver a intentarlo",
                      type: "warning"
                  }, function() {
                      window.location = "alta_empresa.php";
                  })</script>';
          //echo "Las contraseñas no coindicen";
        }
    }
    //En el caso de que falte algun campo por completar
    else {
      echo '<script>swal({
                title: "Error",
                text: "Debe rellenar los campos requeridos",
                cancelButtonText: "Volver a intentarlo",
                type: "warning"
            }, function() {
                window.location = "alta_empresa.php";
            })</script>';
      //echo "Tienes que completar todos los campos para poder registrarte como empresa, disculpen las molestias";
    }
?>
