<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $direcciones_generales_id = $_POST['direcciones_generales'];

    if (!empty($direcciones_generales_id)) {
        $query = $conn->query("SELECT nombre FROM direcciones_generales WHERE id = $direcciones_generales_id");
        $direcciones_generales = $query->fetch_assoc();
        echo "Direcciones Generales: " . $direcciones_generalesa['nombre'];
    } else {
        echo "Por favor, seleccione una Direcciones Generales.";
    }
}
?>
