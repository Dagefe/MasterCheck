<?php
<<<<<<< HEAD

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


  include_once('conexion.php');
  
  
=======
  include_once('conexion.php');


        $nombre = $_POST['name'];

        echo $nombre;

    if(@$_POST['enviar'])
    {

        $nombre = $_POST['name'];

        $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $movil = $_POST['tel'];
        $provincia = $_POST['town'];


        $mysqli = new mysqli(db_server,db_username, db_password, db_database);

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "INSERT INTO Clientes VALUES (NULL, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";
        $mysqli->query($query);

        printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);


        $mysqli->close();




      }



>>>>>>> 11d171292143f145dfd5e16b3a8a785f256f05cc
        //Comprobamos que los input requeridos son correctos
        if ($_POST['email'] != " " && isset($_POST['email']) && $_POST['pass'] != " " && isset($_POST['pass']) && $_POST['repass'] != " " && isset($_POST['repass']) && $_POST['name'] != " " && isset($_POST['name']) && $_POST['surname'] != " " && isset($_POST['surname']))
        {
            //Comprobamos que las contraseñas coinciden
            if ($_POST['pass'] == $_POST['repass'])
            {
                // Encriptamos la contraseña como sha1 y como doble encriptacion elegiremos mastercheckk que estara alojado en un archivo externo para aumentar la seguridad
                $fichero ="clavex.txt";
                $handle = fopen('clavex.txt', "r");
                $clavex = fread($handle, filesize($fichero));
                fclose($handle);
                $clave_has = hash_hmac("sha1", $_POST['pass'], $clavex);
                // Juntamos los apellidos
<<<<<<< HEAD
                
                $nombre = $_POST['name'];
                $apellidos = $_POST['surname'] . " " . $_POST['secondname'];
                $email = $_POST['email'];
                $pass = $clave_has;
                $movil = $_POST['tel'];
                $provincia = $_POST['town'];
=======
<<<<<<< HEAD

=======

>>>>>>> edf4114a944c8bf13ded7d87b9675c13a43b8023
>>>>>>> 11d171292143f145dfd5e16b3a8a785f256f05cc
                //Nos conectamos a la base de datos y a la tabla elegida
                $mysqli = new mysqli(db_server,db_username, db_password, db_database);
                //Query para insertar los valores
                
                if (mysqli_connect_errno()) {
                    printf("Error de conexión: %s\n", mysqli_connect_error());
                    exit();
                }
                
                $query = "INSERT INTO clientes VALUES (NULL, '$nombre', '$apellidos','$email','$pass',$movil,'$provincia')";

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
                    $_SESION['user'] = $email;
                    
                    header("Location: registro_ok.php");
                    
                }
        
            }
            else
              echo "Las contraseñas no coinciden";
<<<<<<< HEAD
        }  
?>
=======
        }
        else
          echo "Tienes que introducir todos los datos marcados con un asterisco para poder registrarte correctamente, gracias.";*/




?>
>>>>>>> 11d171292143f145dfd5e16b3a8a785f256f05cc
