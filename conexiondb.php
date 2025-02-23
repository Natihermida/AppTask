<?php
$host = "localhost";
$user = "root";
$password = "123456";
$database = "apptask";
try {
    $conexion = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>