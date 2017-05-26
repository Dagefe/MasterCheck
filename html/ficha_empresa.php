<?php
 
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $movil = $_POST['movil'];
    $provincia = $_POST['provincia'];
    
    
    /*if(@$_POST['enviar'])
	{
		$mysqli = new mysqli(db_server,db_username, db_password, db_database);

    if (mysqli_connect_errno())
		{ //Posible error al conectar a la base de datos
    	printf("Error de conexión: %s\n", mysqli_connect_error());
      exit();
    }
        //Recogemos nuestra clave maestra
        $fichero = "clavex.txt";
        $handle = fopen('clavex.txt', "r");
        $clavex = fread($handle, filesize($fichero));
        fclose($handle);
        //Encriptamos la clave introducida
        $clave_has = hash_hmac("sha1", $contrasena, $clavex);
        //Seleccionamos de la BD la contraseña por el email introducido
        $query = "SELECT contrasena FROM empresa WHERE email = '" . $email . "'";
        //Ejecutamos query
        $res = $mysqli->query($query);
        $row = $res->fetch_array(MYSQLI_NUM);
        //Comparamos la clave introducida encriptada por la clave en la BD
        if($row[0] === $clave_has){
            //Contrasena coincide en la BD
        */
                
             ?>   
                
            <!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                        <meta name="viewport" content="width=device-width, initial-scale=1"/>
                        <title>Perfil cliente</title>

                        <!-- Bootstrap -->
                        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
                        <link rel="stylesheet" href="#"/>

                    </head>
                    <body>
                        <!-- Arbol de navegacion -->
                        <header>
                            <ol class="breadcrumb">
                                <li class="glyphicon glyphicon-home"><a href="../index.html"> Inicio</a></li>
                                <li><a href="login_cliente.html">Particular</a></li>
                                <li class="active">Perfil empresa</li>
                            </ol>


                        </header>

                        <section>
                            <div class="container">
                              <h3>Bienvenido al área del cliente</h3>
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#">Home</a></li>
                                <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil<span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Submenu 1-1</a></li>
                                    <li><a href="#">Submenu 1-2</a></li>
                                    <li><a href="#">Submenu 1-3</a></li>                        
                                  </ul>
                                </li>
                                <li><a href="#">Menu</a></li>
                                <li><a href="#">Menu 3</a></li>
                              </ul>
                            </div>

                    </body>
                    </html> <!-- Final codigo -->
                
<?php   
           /* }
            else{
                echo "<p>Lo sentimos pero la contraseña introducida no es correcta, por favor, vuelve a intentarlo<p><br>";
                //ventana
                
            }
			mysqli_close($mysqli);
			 
	}*/
    
    
?>
