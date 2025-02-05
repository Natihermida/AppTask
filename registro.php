<?php
include 'partials/cabecera.php';
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
        <input type="email" name="email" id="email" required placeholder="Email">
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