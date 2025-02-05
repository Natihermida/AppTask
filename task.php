<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
}
include("conexiondb.php");
$sql = "select * from tareas";
$result = $conexion->query($sql);
include("./partials/cabecera.php");
?>
<section class="containerTask">
    <h3>Tareas</h3>
    <div class="contenedordivs">
    <div class="tareas">
        <form action="nueva_tarea.php" method="post" id="formTareas">
            <label for="titulo">Título</label>
            <input required type="text" name="titulo" id="titulo">
            <label for="descripcion">Descripcion</label>
            <input required type="text" name="descripcion" id="descripcion">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha" value="">
            <label for="fecha_fin">Fecha Fin</label>
            <input type="date" name="fecha_fin" id="fecha" value="">
            <select name="estado" id="estado">
                <option value="pendiente">Pendiente</option>
                <option value="en proceso">En proceso</option>
                <option value="finalizado">Finalizado</option>
            </select>
            <button>Enviar</button>
        </form>
    </div>
    <div class="lista">
        <table id="tablaTareas">
            <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Operaciones</th>
            </thead>
            <tbody id="tbodyTareas">
                <?php
                while ($row = $result->fetch()) {
                    echo "<tr>
                            <td>" . $row['tareas_id'] . "</td>
                            <td>" . $row['titulo'] . "</td>
                            <td>" . $row['descripcion'] . "</td>
                            <td>" . $row['fecha_inicio'] . "</td>
                            <td>" . $row['fecha_fin'] . "</td>
                            <td>" . $row['estado'] . "
                            </td>                            </tr>";
                }
                ?>



        </table>
    </div>
    </div>
</section>


<?php
include 'partials/footer.php';
?>