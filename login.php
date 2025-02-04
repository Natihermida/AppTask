<?php
include 'partials/cabecera.php';
?>



<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Nombre usuario:</label>
        <input type="text" name="username" id="username" required>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Contraseña:</label>
        
        <input type="email" name="email" id="email" required>
        <br><br>
        
        
        <br><br>
        
        <button type="submit">Iniciar sesión</button>
    </form>
</body>









<?php
include 'partials/footer.php';
?>