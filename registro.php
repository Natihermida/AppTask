<?php
include 'partials/cabecera.php';
include "header.php";
if(isset($_POST["nombre"])){
    include("conexiondb.php");
    $sql="INSERT INTO usuarios (nombre, apellido, email, password) VALUES (:nombre, :apellido, :email, :password)";  
    $stm=$conexion->prepare($sql);
    $stm->bindParam(":nombre", $_POST["nombre"]);
    $stm->bindParam(":apellido", $_POST["apellido"]);
    $stm->bindParam("email", $_POST["email"]);
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stm->bindParam("password", $hashed_password);  
    $stm->execute();
    header("Location: task.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="registro">
        <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" required placeholder="Apellido">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="El email es tu usuario">
        <label for="password"><strong>Contraseña</strong></label>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <label for="password2"><strong>Repite la contraseña</strong></label>
        <input type="password" name="password2" id="password2" required placeholder="Repite la contraseña">
        <input type="submit" value="Registrarse">
        <p>*Si ya tienes ususario <a href="login.php"><u>loguéate</u></a></p>
    </form>
</section>
    
    <?php
    include 'partials/footer.php';
    ?>
</body>
</html>