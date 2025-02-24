<?php

require 'conexion.php';// Asegúrate de que este archivo establece $conexion como instancia de PDO
$id_direccion = $_POST['id'];
$query = $conexion->query("SELECT id, nombre FROM departamentos WHERE id_subarea = $id_direccion");

$options = "<option value=''>Seleccione Subdirección</option>";
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
