<?php
session_start(); 
?>
<div class="logoutEdit">
    <?php if (isset($_SESSION["email"])): ?>
        <a href="logout.php">Cerrar sesión</a>
        <a href="editar_usuario.php?usuarios_id=<?php echo $_SESSION["id"]; ?>">Editar Usuario</a>
    <?php else: ?>
    <?php endif; ?>
</div>
