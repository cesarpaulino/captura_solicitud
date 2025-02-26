<?php
require 'conexion.php';
$id_direccion = $_POST['id'];
/*
    Ejecutar una consulta para obtener el ID y los nombres de las subdirecciones
    de la base de datos, cuyo ID de direcciones equivalga al ID de la dirección seleccionada.
*/
$query = $conexion->query("SELECT id, nombre FROM subdirecciones WHERE id_direcciones = $id_direccion");

// Asignar opción inicial
$options = "<option value=''>Seleccione Subdirección</option>";

// Crear opciones conforme a la información obtenida
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
