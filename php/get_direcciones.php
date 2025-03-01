<?php
require 'conexion.php'; // Asegúrate de que este archivo establece $conexion como instancia de PDO
try {
    // Obtener los IDs y los nombres de las direcciones registradas en la base de datos
    $query = $conexion->query("SELECT id, nombre FROM direcciones");
    $direcciones = $query->fetchAll(PDO::FETCH_ASSOC);

    // Crear las opciones conforme a la información obtenida
    foreach ($direcciones as $direccion) {
        echo "<option value='{$direccion['id']}' data-nombre='{$direccion['nombre']}'>{$direccion['nombre']}</option>";
    }
} catch (PDOException $e) {
    echo "<option value=''>Error al cargar</option>"; // Tirar error si no se pudo realizar la operación
}
