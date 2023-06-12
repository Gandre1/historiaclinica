<?php

$servername = "localhost"; 
$username = "root";
$password = '';
$database = "historiaclinica";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
