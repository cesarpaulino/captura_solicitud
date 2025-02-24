<?php
require 'conexion.php';
$id_direccion = $_POST['id'];
$query = $conexion->query("SELECT id, nombre FROM secciones WHERE id_departamentos = $id_direccion");

$options = "<option value=''>Seleccione Subdirección</option>";
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
    $options .= "<option value='{$row['id']}' data-nombre='{$row['nombre']}'>{$row['nombre']}</option>";
}
echo $options;
