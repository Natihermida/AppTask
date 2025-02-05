<?php
include 'partials/cabecera.php';
if(isset($_POST["nombre"])){
    include("conexiondb.php");
    $sql="INSERT INTO tareas (titulo, descripcion, prioridad, fecha) VALUES (:nombre, :descripcion, :prioridad, :fecha)";  
    $stm=$conexion->prepare($sql);
    $stm->bindParam(":nombre", $_POST["nombre"]);
    $stm->bindParam(":descripcion", $_POST["descripcion"]);
    $stm->bindParam(":prioridad", $_POST["prioridad"]);
    $stm->bindParam(":fecha", $_POST["fecha"]);
    $stm->execute();
}
?>
<section>


</section>

<?php
include 'partials/footer.php';
?>