<?php
session_start();
//Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$nombre_usuario = $_SESSION['username'];
?>