<?php
 session_start();
 include_once 'conexion.php';

 if (isset($_POST['email'])){
 	$_SESSION['email_empresa'] = $_POST['email'];
 }
 if (isset($_POST['contra'])){
 	$_SESSION['contra_empresa'] = $_POST['contra'];
 }

 $mysqli = new mysqli(db_server,db_username, db_password, db_database);

 if (mysqli_connect_errno()) { //Posible error al conectar a la base de datos
 	printf("Error de conexión: %s\n", mysqli_connect_error());
 	exit();
  }

    //Recogemos nuestra clave maestra
    $fichero = "clavex.txt";
    $handle = fopen('clavex.txt', "r");
    $clavex = fread($handle, filesize($fichero));
    fclose($handle);

    //Encriptamos la clave introducida
    $clave_has = openssl_encrypt($_SESSION['contra_empresa'], "AES-128-ECB", $clavex);

    $query = "SELECT contrasena FROM empresa WHERE email='" . $_SESSION['email_empresa'] . "'";

    $res = $mysqli->query($query);
    $row = $res->fetch_array(MYSQLI_NUM);
    //Comparamos la clave introducida encriptada por la clave en la BD
    if($row[0] === $clave_has){
    //Contrasena coincide en la BD

    	$nom = "SELECT nombre_empresa FROM clientes WHERE email = '" . $_SESSION['email_empresa'] . "'";

      	if ($nombre_completo = $mysqli->query($nom)){
            while ($fila = $nombre_completo->fetch_row()){
				$_SESSION['nombre_empresa'] = $fila[0];
              }
            }
            else {
              echo ("error");
            }
        header('Location: ficha_empresa.php');
	}
	else{
        echo "Las contraseñas no coindicen";
        echo '<script>swal({
                title: "Error: Contraseñas",
                text: "Lo sentimos, la contraseña introducida no coindice con el email solicitado.",
                confirmButtonText: "Volver al formulario",
                type: "error"
              }, function() {
                window.location = "login_empresa.html";
              })</script>';
	}
	mysqli_close($mysqli);
?>
<!-- Login_empresa -> Empresa -> ficha_empresa -> Ajustes_empresa -->
<!-- Hoja de creacion de ofertas -->