<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretarias_id = $_POST['secretarias']; // Obtener la secretaria seleccionada

    if (!empty($secretarias_id)) { // Se necesita seleccionar una secretaria
        $query = $conn->query("SELECT nombre FROM secretarias WHERE id = $secretarias_id"); // Consultar el nombre de la secretaria desde la base de datos
        $secretarias = $query->fetch_assoc();
        echo "Persona que recibe la llamada: " . $secretarias['nombre']; // Colocar en pantalla el nombre de quien recibe la llamada
    } else {
        echo "Por favor, seleccione una Persona que recibe la llamada.";
    }
}
?>