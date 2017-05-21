<?php
  include_once('conexion.php');

<<<<<<< HEAD
        $nombre = $_POST['name'];
        
        echo $nombre;
=======
    if(@$_POST['enviar'])
    {

        $nombre = $_POST['name'];
>>>>>>> edf4114a944c8bf13ded7d87b9675c13a43b8023
        $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $movil = $_POST['tel'];
        $provincia = $_POST['town'];
<<<<<<< HEAD
        
        $mysqli = new mysqli(db_server,db_username, db_password, db_database);

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "INSERT INTO clientes VALUES (NULL, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";
        $mysqli->query($query);

        printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);


        $mysqli->close();
=======

        $mysqli = new mysqli(db_server, db_username, db_password, db_database);

        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "INSERT INTO Clientes VALUES (null, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";



        if($mysqli->query($query))
        {
            printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);
            //$oferta = $resultado->fetch_assoc();
            /* liberar el conjunto de resultados */
            $mysqli->close();
        }








>>>>>>> edf4114a944c8bf13ded7d87b9675c13a43b8023


        //Comprobamos que los input requeridos son correctos
        /*if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($handle));
                fclose($handle);
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                // Juntamos los apellidos
<<<<<<< HEAD
                
=======

>>>>>>> edf4114a944c8bf13ded7d87b9675c13a43b8023
                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli('127.0.0.1', $user, $pass, $base_datos);
                //Query para insertar los valores
                $query = "INSERT INTO clientes (nombre, apellidos, email, contrasena, movil, provincia, fecha_nacimiento) VALUES ('". $_POST['name'] . "', '" . $apellidos . "', '" . $_POST['email'] . "', '" . $clave_has . "', '" . $_POST['tel'] . "', '" . $_POST['town'] ."', '" . $_POST['fecnac'] . "')";

                if(!$mysqli->query($query))
                {
                    //En caso de error lo mostramos
                    echo "Error en: " . $mysqli->error;
                }
                else
                {
                    // Cerramos la conexion
                    mysqli_close($mysqli);
                    //Se crea la sesion de usuario para, una vez registrado correctamente, se rediriga a la pagina principal
                    //con su usuario ya logeado
                    $_SESION['user'] = $_POST['email'];
                    header('Location: http://localhost/index.php');
                }
            }
            else
              echo "Las contraseñas no coinciden";
        }
        else
          echo "Tienes que introducir todos los datos marcados con un asterisco para poder registrarte correctamente, gracias.";*/


<<<<<<< HEAD
    
?>

=======
    }
?>
>>>>>>> edf4114a944c8bf13ded7d87b9675c13a43b8023
