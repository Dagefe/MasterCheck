<?php


if(@$_POST['enviar'])
  {
  include_once 'conexion.php';

    $email = $_POST['email'];
    $contrasena = $_POST['contra'];
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
                $query = "SELECT contrasena FROM clientes WHERE email = '" . $email . "'";
        //Ejecutamos query
        $res = $mysqli->query($query);
        $row = $res->fetch_array(MYSQLI_NUM);
        //Comparamos la clave introducida encriptada por la clave en la BD
        if($row[0] === $clave_has){
            //Contrasena coincide en la BD


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
                  <li class="active">Perfil cliente</li>
                </ol>
                  
              </header>
<?php
 $nom = "SELECT * FROM clientes WHERE email = '" . $email . "'";
 
  if ($nombre_completo = $mysqli->query($nom)){
    
    while ($fila = $nombre_completo->fetch_row()){
      
      $nombre = $fila[1];
      $apellidos = $fila[2];
      $movil = $fila[5];
      $provincia = $fila[6];
    }
  }
        $row = $res->fetch_array(MYSQLI_NUM);
?>
              <section>
                <div class="container">
                  <h3>Bienvenido <?php echo $nombre . ' ' . $apellidos; ?></h3>
                  
              <div class="container well">
		<div class="row">
                  <div class="col-xs-8"><h2>Perfil de usuario</h2></div>
                </div>
		<br/><br/>
 
		<form class="form-horizontal">
 
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroup">Nombre</label>
                    <div class="col-sm-4">
                      <input class="form-control" name="nombre" type="text" id="formGroup" placeholder="<?php echo $nombre; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroup">Apellidos</label>
                    <div class="col-sm-4">
                      <input class="form-control" name="apellidos" type="text" id="formGroup" placeholder="<?php echo $apellidos; ?>">
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroup">Movil</label>
                    <div class="col-sm-4">
                      <input class="form-control" name="movil" type="text" id="formGroup" placeholder="<?php echo $movil; ?>">
                  </div>
                      
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroup">Provincia</label>
                    <div class="col-sm-4">
                      <input class="form-control" name="provincia" type="text" id="formGroup" placeholder="<?php echo $provincia; ?>">
                  </div>
                    
                    <br/>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroup"></label>
                    <div class="col-sm-4">

                      <input type="submit" class="btn btn-success btn-lg" value="Guardar">

                      <input type="button" class="btn btn-danger btn-lg" value="Cancelar">

                    </div>
                  </div>     
		</form>	
              </div>	
	
	
 
 
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
                  
                  

                </body>
                </html> <!-- Final codigo -->
<?php   
        }
        else{
          echo "<p>Lo sentimos pero la contraseña introducida no es correcta, por favor, vuelve a intentarlo.<p><br>";
              //ventana y que te regrese a la de login.
                
        }
			mysqli_close($mysqli);
			 
    }
    
    
?>



