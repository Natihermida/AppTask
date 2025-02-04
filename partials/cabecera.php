<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: index");
    exit();
}
include("conexiondb.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Página Web</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <h1>AppTask</h1>
        <img src="img/tareas.jpg" alt="logo Task">
    </header>
    <nav>
        <a href="#">Inicio</a>
        <a href="#">Registro</a>
        <a href="#">Login</a>
    </nav>

  
