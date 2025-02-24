<?php
include 'conexion.php'; // Asegúrate de que el archivo de conexión usa "$conexion"
$query = $conexion->query("SELECT * FROM tecnicos");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    echo "<option value='{$row['nombre']}'>{$row['nombre']}</option>";
}
