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

    // Obtener los datos actuales del usuario para mostrar en el formulario
    $sql = "SELECT * FROM usuarios WHERE usuarios_id = :usuarios_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuarios_id', $usuarios_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch();

    if (!$user) {
        die('Usuario no encontrado o no tienes permiso para editarlo.');
    }
} else {
    die('ID de usuario no especificado.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido WHERE usuarios_id = :usuarios_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':usuarios_id', $usuarios_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'Usuario actualizado correctamente.';
        header("Location: task.php"); // Redirige a una página que liste todos los usuarios
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
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>">
            
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" required placeholder="Apellido" value="<?php echo htmlspecialchars($user['apellido']); ?>">

            <input type="submit" value="Actualizar">
        </form> 
    </section>
</section>

<?php
ob_end_flush();
include 'partials/footer.php';
?>
