<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitio_web";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamosr conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>