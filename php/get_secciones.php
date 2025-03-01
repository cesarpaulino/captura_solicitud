<?php
require 'conexion.php';
$id_direccion = $_POST['id'];
/*
    Ejecutar una consulta para obtener el ID y los nombres de las secciones
    de la base de datos, cuyo ID de departamento equivalga al ID de la dirección seleccionada.
*/
$query = $conexion->query("SELECT id, nombre FROM secciones WHERE id_departamentos = $id_direccion");
// Asignar la primera opción para indicar que se debe seleccionar una opción.
$options = "<option value=''>Seleccione Subdirección</option>";
// Crear las opciones conforme a la información obtenida
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
