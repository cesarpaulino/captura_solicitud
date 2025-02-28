<?php
include 'conexion.php'; // Obtener la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si se publica
    $hardware_id = $_POST['hardware']; // Index seleccionado del select de equipo de cómputo

    if (!empty($hardware_id)) {
        $query = $conn->query("SELECT nombre FROM hardware WHERE id = $hardware_id"); // Obtener el nombre del hardware seleccionado
        $hardware = $query->fetch_assoc();
        echo "Persona que recibe la llamada: " . $hardware['nombre'];
    } else {
        echo "Por favor, seleccione una Persona que recibe la llamada.";
    }
}
?>