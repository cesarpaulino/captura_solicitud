<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretarias_id = $_POST['secretarias'];

    if (!empty($secretarias_id)) {
        $query = $conn->query("SELECT nombre FROM secretarias WHERE id = $secretarias_id");
        $secretarias = $query->fetch_assoc();
        echo "Persona que recibe la llamada: " . $secretarias['nombre'];
    } else {
        echo "Por favor, seleccione una Persona que recibe la llamada.";
    }
}
?>