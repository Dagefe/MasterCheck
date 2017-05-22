<?php
    include_once('conexion.php');


        //Comprobamos que los input requeridos son correctos
        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                $fichero = "clavex.txt";
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($fichero));
                fclose($handle);
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                // Juntamos los apellidos


                $nombre = $_POST['name'];
                $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
                $email = $_POST['email'];
                $pass = $clave_has;
                $movil = $_POST['tel'];
                $provincia = $_POST['town'];

                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli(db_server,db_username, db_password, db_database);
                //Query para insertar los valores

                if (mysqli_connect_errno()) {
                    printf("Error de conexión: %s\n", mysqli_connect_error());
                    exit();
                }

                $query = "INSERT INTO Clientes VALUES (NULL, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";

                if(!$mysqli->query($query))
                {
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else
                {
                    printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);
                    // Cerramos la conexion
                    mysqli_close($mysqli);
                    //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                    //con su usuario ya logeado
                    $_SESION['user'] = $_POST['email'];

                }

                header('Location: http://localhost/dashboard/mastercheque/index.html');

            }
            else
              echo "Las contraseñas no coinciden";
        }
        else
          echo "Tienes que introducir todos los datos marcados con un asterisco para poder registrarte correctamente, gracias.";
?>