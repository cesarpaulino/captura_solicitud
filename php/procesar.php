<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Si se publica
    $direcciones_generales_id = $_POST['direcciones_generales'];

    if (!empty($direcciones_generales_id)) { // Se debe seleccionar al menos una dirección general
        $query = $conn->query("SELECT nombre FROM direcciones_generales WHERE id = $direcciones_generales_id"); // Obtener el nombre de la dirección general
        $direcciones_generales = $query->fetch_assoc();
        echo "Direcciones Generales: " . $direcciones_generalesa['nombre']; // Mostrar nombre de la dirección general
    } else {
        echo "Por favor, seleccione una Direcciones Generales.";
    }
}
?>
