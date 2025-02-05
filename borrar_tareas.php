<?php
if(isset($_GET["tareas_id"])){
    include("conexiondb.php");
    $idtarea = $_GET["tareas_id"];
    $sql = "DELETE FROM tareas WHERE tareas_id = :tareas_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':tareas_id', $idtarea);
    $stmt->execute();
    $conexion = null;
    header("Location: task.php");
}

?>