<?php
session_start(); 
 include_once 'conexion.php';

    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

      if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
          printf("Error de conexión: %s\n", mysqli_connect_error());
          exit();
        }
        
         $nom = "SELECT * FROM clientes WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
 
        if ($nombre_completo = $mysqli->query($nom)){

          while ($fila = $nombre_completo->fetch_row()){
            $nombre = $fila[1];
            $apellidos = $fila[2];
            $movil = $fila[5];
            $provincia = $fila[6];
          }
        }
        
        $_SESSION['nombre_usuario'] = $nombre;
        $_SESSION['apellidos_usuario'] = $apellidos;
        if ($movil == 0){
            $_SESSION['movil_usuario'] = "";  
        }
        else $_SESSION['movil_usuario'] = $movil;
        $_SESSION['provincia_usuario'] = $provincia;
        
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
          <div class="col-xs-8"><h2>Perfil de usuario</h2></div>
        </div>
        <br/><br/>

        <form class="form-horizontal" name="formulario_ficha" method="POST">

        <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Nombre</label>
            <div class="col-sm-4">
              <input class="form-control" name="nombre" type="text" id="formGroup" value="<?php echo $nombre; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Apellidos</label>
            <div class="col-sm-4">
              <input class="form-control" name="apellidos" type="text" id="formGroup" value="<?php echo $_SESSION['apellidos_usuario']; ?>">
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Movil</label>
            <div class="col-sm-4">
              <input class="form-control" name="movil" type="text" id="formGroup" value="<?php echo $_SESSION['movil_usuario']; ?>" placeholder="Introduza un tlf movil">
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Provincia</label>
            <div class="col-sm-4">
              <input class="form-control" name="provincia" type="text" id="formGroup" value="<?php echo $_SESSION['provincia_usuario']; ?>" placeholder="Introduzca aqui la provincia">
          </div>

            <br/>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup"></label>
            <div class="col-sm-4">

              <input type="submit" name="guardar" class="btn btn-success btn-lg" value="Guardar">

              <input type="submit" name="cancelar" class="btn btn-danger btn-lg" value="Cancelar">

            </div>
          </div>     
        </form>	
      </div>	
      
      
        <div class="btn-group-vertical">
          <a href="ficha_cliente.php"><button type="button" class="btn btn-default">Perfil de usuario</button></a>
           <!-- Si estas en esta pagina se muestra sin enlace -->
          <a href="ajustes_cliente.php"><button type="button" class="btn btn-default">Ajustes de cuenta</button></a>
          <a href="favoritos.php"><button type="button" class="btn btn-default">Favoritos</button></a>
          <a href="logout.php"><button type="button" class="btn btn-default">Logout</button></a>
        </div>
      
      




      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="../js/sweetalert.min.js"></script>


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
    if (empty($_POST['nombre']) || empty($_POST['apellidos'])){
      echo '<script>swal({
              title: "¡ERROR!",
              text: "No se puede borrar el nombre o el apellido.",
              confirmButtonText: "Volver a la pagina anterior",
              type: "error"
              }, function() {
              window.location = "ficha_cliente.php";
              })</script>';
            exit();
    }
    if (empty($_POST['movil'])){
      $movil = '';
    }
    else $movil = $_POST['movil'];
    if (empty($_POST['provincia'])){
      $provincia = '';
    }
    else $provincia = $_POST['provincia'];
    $consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "', apellidos ='" . $_POST['apellidos'] . "', movil ='" . $movil . "', provincia ='" . $provincia . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
    //$consulta = "UPDATE clientes SET nombre ='" . $_POST['nombre'] . "' WHERE nombre = '" . $_SESSION['nombre_usuario'] . "'";
    
    echo $consulta;
    $resultado = $conexion -> query($consulta) || die("No se pudo realizar la actualización");
    mysqli_close($conexion);
    if ($resultado)
      {
          
          echo '<script>swal({
                            title: "¡Hecho!",
                            text: "Cambios realizados correctamente",
                            confirmButtonText: "Aceptar",
                            type: "success"
                        }, function() {
                            window.location = "ficha_cliente.php";
                        })</script>';
          //Redireccion a la misma pagina con los cambios actualizados
          //header('Location: ' . $_SERVER("DOCUMENT_ROOT") . '/ficha_cliente.php');
        }
        
    else
      
      {
          echo " Mensaje Lo sentimos pero en estos momentos no podemos realizar los cambios solicitados";
          echo '<script>swal({
              title: "¡ERROR!",
              text: "No se pueden hacer los cambios solicitados.",
              confirmButtonText: "Volver a la pagina anterior",
              type: "warning"
              }, function() {
              window.location = "ficha_cliente.php";
              })</script>';
            exit();
        }
    #Cerrar la conexión
  }
 
  else if(@$_POST['cancelar'] == "Cancelar"){
    
    //mensaje de vuelta a la pagina de inicio del uusario logueado
    header('Location: usuario.php'); // no carga pagina --> header('Location: usuario.php');
  }
  
  
  