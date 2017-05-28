<?php
session_start();

?> 

<?php
 
 include_once 'conexion.php';

    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

      if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
          printf("Error de conexión: %s\n", mysqli_connect_error());
          exit();
        }
        
         $ema = "SELECT * FROM clientes WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
 
        if ($email_cliente = $mysqli->query($ema)){

          while ($fila = $email_cliente->fetch_row()){
            $email = $fila[3];
            $password = $fila[4];
          }
        }
        
        $_SESSION['email_usuario'] = $email;
        
        
        
        
    mysqli_close($mysqli);
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

      <section>
        <div class="container">
          <h3>Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></h3>

      <div class="container well">
        <div class="row">
          <div class="col-xs-8"><h2>Ajustes de usuario</h2></div>
        </div>
        <br/><br/>

        <form class="form-horizontal" name="formulario_ficha" method="POST">

        <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Email</label>
            <div class="col-sm-4">
              <input class="form-control" name="email" type="text" id="formGroup" value="<?php echo $email; ?>">
            </div>
          </div>

            
            
        <!-- Recoger contraseña encriptada y mostrar en el campo -->
            
            
            
            
          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Contraseña</label>
            <div class="col-sm-4">
              <input class="form-control" name="contra" type="password" id="formGroup" placeholder="*******">
          </div>
            <br/>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup"></label>
            <div class="col-sm-4">

              <input type="submit" name="cambiar" class="btn btn-success btn-lg" value="Cambiar">

              <input type="submit" name="cancelar" class="btn btn-danger btn-lg" value="Cancelar">

            </div>
          </div>     
        </form>	
      </div>	
      
      <div class="btn-group-vertical">
        <button type="button" class="btn btn-default"href="ficha_cliente.php">Perfil de usuario</button>
        <button type="button" class="btn btn-default" href="ajustes_cliente.php">Ajustes de cuenta</button><!-- Si estas en esta pagina se muestra sin enlace -->
        <button type="button" class="btn btn-default"href="favoritos.php">Favoritos</button>
      </div>




      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.js"></script>



    </body>
  </html> <!-- Final codigo -->

<?php
 
  

 
  if(@$_POST['guardar'] == "Guardar"){
    
    $conexion = new mysqli(db_server,db_username, db_password, db_database);

    /* Comprobar conexión */
    if ($conexion->connect_errno) {
      printf("Conexión fallida: %s
      ", $conexion->connect_error);
      exit();
      }
     
    $consulta = "UPDATE clientes SET email ='" . $_POST['nombre'] . "', apellidos ='" . $_POST['apellidos'] . "', movil ='" . $_SESSION['movil_usuario'] . "', provincia ='" . $_SESSION['provincia_usuario'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
    //$consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
    
      echo $consulta;
    $resultado = $conexion -> query($consulta) || die("No se pudo realizar la actualización");
    if ($resultado)
      {
      
          echo " Mensaje Cambios realizados";
          
        }
        
    else
      
      {
          echo " Mensaje Lo sentimos pero en estos momentos no podemos realizar los cambios solicitados";
          
        }
    #Cerrar la conexión
    mysqli_close($conexion);
  }
 
  else if(@$_POST['cancelar'] == "Cancelar"){
    
    //mensaje de vuelta a la pagina de inicio del uusario logueado
    header('Location: prueba.php'); // no carga pagina --> header('Location: usuario.php');
  }

