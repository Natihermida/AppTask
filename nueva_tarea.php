<?php
// if(isset($_POST["fecha"])){
    // session_start();
    include("conexiondb.php");
    $idusuario = $_SESSION['idusuario'];
    $titulo= $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    
    
    $sql = "INSERT INTO tareas (usuarios_id,titulo,descripcion,fecha_inicio,fecha_fin) VALUES (:usuarios_id,:titulo,:descripcion,:fecha_inicio,:fecha_fin,)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":usuarios_id", $idusuario);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":descripcion", $descripcion);
    $stmt->bindParam(":fecha_inicio", $fecha);
    $stmt->bindParam(":fecha_fin", $fechaFin);
    $stmt->execute();
    $conexion = null;
    header("Location: task.php");
}else{
    header("Location: task.php");
}

?>