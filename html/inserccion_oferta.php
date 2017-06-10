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
	if ((isset($_POST['nombre']) && $_POST['nombre'] != "") && (isset($_POST['desc']) && $_POST['desc'] != "") && (isset($_POST['precio']) && $_POST['precio'] != "") && (isset($_POST['fecha_inicio']) && $_POST['fecha_inicio'] != "") && (isset($_POST['fecha_fin']) && $_POST['fecha_fin'] != "") && (isset($_POST['tipo']) && $_POST['tipo'] != "")){
		/*$image_check = getimagesize("../" . $_FILES['logotipo']); comprobar */
		if ($image_check == false){

			include_once 'conexion.php';
			$mysqli = new mysqli(db_server,db_username, db_password, db_database);

	 		if (mysqli_connect_errno()) { //Posible error al conectar a la base de datos
	 			printf("Error de conexión: %s\n", mysqli_connect_error());
	 			exit();
	  		}
	  		//Recogemos el id de la empresa logeada
	  		$query = "SELECT id FROM empresa WHERE email='" . $_SESSION['email_empresa'] . "'";
	  		$res = $mysqli->query($query);
	    	$row = $res->fetch_array(MYSQLI_NUM);
	    	$id_empresa = $row[0];
	    	//Inicializamos variables
	    	$nombre = $_POST['nombre']; $desc = $_POST['desc']; $tipo = $_POST['tipo'];
	    	$precio = $_POST['precio']; $fecha_inicio = $_POST['fecha_inicio']; $fecha_fin = $_POST['fecha_fin'];
	    	//$logotipo = $_POST['logotipo'];
	    	$image = addslashes(file_get_contents($_FILES['logotipo']['tmp_name']));
	    	$image_name = addslashes($_FILES['logotipo']['name']);
	    	//Insertamos valores en la BD
	    	$query = "INSERT INTO ofertas VALUES (NULL, '$nombre', '{$image}', '$image_name', '$desc', '$precio', '$fecha_inicio', '$fecha_fin', '$tipo', '$id_empresa')";

	    	if(!$mysqli->query($query)){
	            //En caso de error lo mostramos
	            echo "Error en: " . $mysqli->error;
	        }
	        else{
	            echo '<script>swal({
	                    title: "Bien",
	                    text: "Oferta creada correctamente",
	                    confirmButtonText: "Aceptar",
	                    type: "success"
	                    }, function() {
	                    window.location = "empresa.php";
	                    })</script>';
	                  //header('Location: ../index.html');
	                 mysqli_close($mysqli);
	        }
    }
    else{//En el caso de que la imagen este vacia
    	echo '<script>swal({
                    title: "ERROR!",
                    text: "Tienes que seleccionar una imagen!",
                    confirmButtonText: "Volver a la pagina",
                    type: "warning"
                    }, function() {
                    window.location = "empresa.php";
                    })</script>';
    }
}
	else {//En el caso de que falte algun campo por completar
		echo '<script>swal({
                    title: "ERROR!",
                    text: "Tienes que completar todos los campos para poder crear una oferta!",
                    confirmButtonText: "Volver a la pagina",
                    type: "warning"
                    }, function() {
                    window.location = "empresa.php";
                    })</script>';
	}
?>
