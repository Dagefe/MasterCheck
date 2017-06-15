<?php
	session_start();
	include_once ("conexion.php");
    $mysqli = new mysqli(db_server,db_username, db_password, db_database);

    if (mysqli_connect_errno())
        { //Posible error al conectar a la base de datos
           	printf("Error de conexión: %s\n", mysqli_connect_error());
           	exit();
        }

    $oferta = "SELECT * FROM clientes WHERE email='" . $_SESSION['email_cliente'] . "'";

    if ($search = $mysqli->query($oferta)){

    	while ($fila = $search->fetch_row()){
    		$id_cliente = $fila[0];
    	}
    }


    $id_oferta = $_POST['id_oferta'];
    $favorito = "INSERT INTO favoritos VALUES(NULL, '$id_cliente', $id_oferta)";
    if ($search = $mysqli->query($favorito)){
    	
    	///header('Location: usuario.php');  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mostrarBusquedas.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <!-- To insert the icon: -->
    <link type="text/css" rel="stylesheet" href="../font-awesome/css/font-awesome.css" />


  </head>
  <body>
      <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mostrarBusquedas.js"></script>
    <script src="../js/index.js"></script>
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <script src="../fonts/glyphicons-halflings-regular.eot"></script>
    <script src="../js/sweetalert.min.js"></script>
  </body>
</html>
<?php
	echo '<script>swal({
          title: "Favorito añadido correctamente!",
          text: "Puedes ver tus favoritos en "Mis favortitos".",
          confirmButtonText: "Volver al index",
          type: "success"
        }, function() {
          window.location = "usuario.php";
        })</script>';
	}
?>