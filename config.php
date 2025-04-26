<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "prueba_gema";

function connectDB() {
    global $servername, $username, $password, $dbname;
    
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        header("Location: index.php?error=" . urlencode("Error de conexión: " . $mysqli->connect_error));
        exit;
    }
    return $mysqli;
}