<?php

require 'conexion.php';// Asegúrate de que este archivo establece $conexion como instancia de PDO
$id_direccion = $_POST['id'];
/*
    Ejecutar una consulta para obtener el ID y los nombres de los departamentos
    de la base de datos, cuyo ID de subárea equivalga al ID de la dirección seleccionada.
*/
$query = $conexion->query("SELECT id, nombre FROM departamentos WHERE id_subarea = $id_direccion");
// Asignar la primera opción para indicar que se debe seleccionar una opción.
$options = "<option value=''>Seleccione Subdirección</option>";
// Crear las opciones conforme a la información obtenida
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
