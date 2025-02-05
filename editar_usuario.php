<?php
ob_start(); 
include('./partials/cabecera.php');
include("conexiondb.php");

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['usuarios_id'])) {
    $usuarios_id = $_GET['usuarios_id'];
    $sql = "SELECT * FROM usuarios WHERE usuarios_id = :usuarios_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuarios_id', $usuarios_id, PDO::PARAM_INT);
    $stmt->bindParam(':usuarios_id', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->execute();

    $task = $stmt->fetch();

    if (!$task) {
        die('Usuario no encontrado o no tienes permiso para editarlo.');
    }
} else {
    die('ID de usuario no especificado.');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios
            SET nombre = :nombre, email = :email, password = :password,
            WHERE usuarios_id = :usuarios_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':usuarios_id', $_SESSION['id'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo 'Error al actualizar el usuario.';
    }
}
?>

<section class="containerTask">
    <h3>Editar Usuario</h3>
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
            <input type="submit" value="Actualizar">
        </form> 
    </section>
</section>

<?php
ob_end_flush();
include 'partials/footer.php';
?>