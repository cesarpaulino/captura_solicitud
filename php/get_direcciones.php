<?php
require 'conexion.php'; // Asegúrate de que este archivo establece $conexion como instancia de PDO
try {
    $query = $conexion->query("SELECT id, nombre FROM direcciones");
    $direcciones = $query->fetchAll(PDO::FETCH_ASSOC);


    foreach ($direcciones as $direccion) {
        echo "<option value='{$direccion['id']}' data-nombre='{$direccion['nombre']}'>{$direccion['nombre']}</option>";
    }
} catch (PDOException $e) {
    echo "<option value=''>Error al cargar</option>";
}
