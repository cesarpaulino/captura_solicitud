<?php
require 'conexion.php';
$id_direccion = $_POST['id'];
/*
    Ejecutar una consulta para obtener el ID y los nombres de las subáreas
    de la base de datos, cuyo ID de subdirección equivalga al ID de la dirección seleccionada.
*/
$query = $conexion->query("SELECT id, nombre FROM subareas WHERE id_subdireccion = $id_direccion");

// Asignar opción inicial
$options = "<option value=''>Seleccione Subdirección</option>";

// Crear las opciones conforme a la información obtenida
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
