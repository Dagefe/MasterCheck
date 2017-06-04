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
    include_once 'conexion.php';

        //Comprobamos que los input requeridos son correctos
        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli(db_server, db_username, db_password, db_database);
                if (mysqli_connect_errno()) {
                    printf("Error de conexión: %s\n", mysqli_connect_error());
                    exit();
                }
                //Query para comprobar que no hay 2 emails duplicados
                $query = "SELECT email FROM clientes WHERE email='" . $_POST['email'] . "'";
                $res = $mysqli->query($query);
                $row_cnt = $res->num_rows;

                if ($row_cnt > 0){ //Hay algun registro, con lo cual email duplicado
                    echo '<script>swal({
                  title: "Error: Email duplicado",
                  text: "Lo sentimos, el email introducido esta duplicado, por favor seleccione otro.",
                  confirmButtonText: "Volver al formulario",
                  type: "warning"
              }, function() {
                  window.location = "alta_cliente.php";
              })</script>';
                }
                else
                { //No hay email duplicados en nuestra base de datos
                    // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                    $fichero = "clavex.txt";
                    $handle = fopen('clavex.txt', "r");
                    $clavex = fread($handle, filesize($fichero));
                    fclose($handle);
                    $clave_has = openssl_encrypt($_POST['pass'], "AES-128-ECB", $clavex);
                    //echo $clave_has;
                    // Declaramos las variables
                    $nombre = $_POST['name']; $email = $_POST['email'];
                    //Juntamos apellidos
                    $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
                    $movil = $_POST['tel']; $provincia = $_POST['town'];

                    //Nos conectamos a la base de datos y a la tabla elegida
                    $mysqli = new mysqli(db_server,db_username, db_password, db_database);
                    //Query para insertar los valores

                    if (mysqli_connect_errno()) { //Posible error al conectar a la base de datos
                        printf("Error de conexión: %s\n", mysqli_connect_error());
                        exit();
                    }
                    if (empty($provincia)){
                        $provincia = '';
                    }
                    if (empty($movil)){
                        $movil = '';
                    }
                    $query = "INSERT INTO clientes VALUES (NULL, '$nombre', '$apellidos','$email','$clave_has','$movil','$provincia')";

                    if(!$mysqli->query($query))
                    {
                        //En caso de error lo mostramos
                        echo "Error en: " . $mysqli->error;
                        var_dump($query);
                    }
                    else
                    {
                        //printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);
                        // Cerramos la conexion
                        mysqli_close($mysqli);
                        //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                        //con su usuario ya logeado
                        $_SESSION['email'] = $email;
                        $_SESSION['contra'] = $_POST['pass'];
                        echo '<script>swal({
                            title: "Bien",
                            text: "Datos introducidos",
                            confirmButtonText: "Aceptar",
                            type: "success"
                        }, function() {
                            window.location = "usuario.php";
                        })</script>';
                    }
                 }
            }
            else
              echo '<script>swal({
                      title: "Error",
                      text: "Las contraseñas no coinciden",
                      cancelButtonText: "Volver a intentarlo",
                      type: "error"
                  }, function() {
                      window.location = "alta_cliente.php";
                  })</script>';
        }
        else
        echo '<script>swal({
                title: "Error",
                text: "Debe rellenar los campos requeridos",
                cancelButtonText: "Volver a intentarlo",
                type: "warning"
            }, function() {
                window.location = "alta_cliente.php";
            })</script>';
?>
