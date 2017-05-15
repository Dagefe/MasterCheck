<?php

$email = $_POST['email'];
$contra = $_POST['contra'];

$mysqli = new mysqli("localhost", "root", "", "Master_Cheque");

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}

$query = "INSERT INTO Clientes VALUES (NULL, '', '','$email','$contra','','')";
$mysqli->query($query);

printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);


$mysqli->close();


/**/
$mysqli = new mysqli("localhost", "root", "", "Master_Cheque");

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

if ($resultado = $mysqli->query("SELECT * FROM Clientes")) {
    printf("La selección devolvió %d filas.\n", $resultado->num_rows);



?>