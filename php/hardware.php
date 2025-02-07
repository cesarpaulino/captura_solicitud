<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hardware_id = $_POST['hardware'];

    if (!empty($hardware_id)) {
        $query = $conn->query("SELECT nombre FROM hardware WHERE id = $hardware_id");
        $hardware = $query->fetch_assoc();
        echo "Persona que recibe la llamada: " . $hardware['nombre'];
    } else {
        echo "Por favor, seleccione una Persona que recibe la llamada.";
    }
}
?>