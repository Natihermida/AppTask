<?php
include 'partials/cabecera.php';
include "conexiondb.php";  // Asegúrate de que en este archivo estés creando la conexión con PDO correctamente
include "header.php";
// Comprobar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $email = $_POST['username'];  // Usamos 'username' del formulario como el email
    $password = $_POST['password'];

    // Validar que no esté vacío
    if (!empty($email) && !empty($password)) {
        // Consultar si el usuario existe, buscamos por el 'email' (en lugar de 'username')
        $sql = "SELECT * FROM usuarios WHERE email = :email";  // Usamos 'email' para la consulta
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Verificar si el usuario existe
        if ($stmt->rowCount() > 0) {  // Usamos 'rowCount()' con PDO
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verificar si la contraseña es correcta
            if (password_verify($password, $usuario['password'])) {
                // Iniciar sesión
                session_start();
                $_SESSION['email'] = $email;  // Guardamos el email en la sesión
                $_SESSION['id'] = $usuario['Usuarios_id'];  // Guardamos el ID del usuario
                // Redireccionar
                header('Location: task.php');
                exit();  // Asegúrate de que el script termine después de redirigir
            } else {
                echo 'Contraseña incorrecta';
            }
        } else {
            echo 'Usuario no encontrado';
        }
    } else {
        echo 'Debes llenar todos los campos';
    }
}
?>

<body><section class="login">
<h2>Iniciar sesión</h2>
<form action="login.php" method="POST">
    <label for="username">Email:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Iniciar sesión</button>
</form></section>
</body>

<?php
include 'partials/footer.php';
?>
