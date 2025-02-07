<?php
require './php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO registros (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro guardado exitosamente.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al guardar el registro.'); window.location.href='index.php';</script>";
    }

    $conn->close();
}
?>
