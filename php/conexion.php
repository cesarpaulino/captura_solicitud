<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "soporte_informatica";// Crear la base de datos en MySQL con el mismo nombre
$username = "informatica"; // Cambia esto por tu usuario de MySQL
$password = "hJo@b.h!(BoN[KLD"; // Cambia esto por tu contraseña de MySQL


try {
    // Crear la conexión con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


    // Configurar el modo de error para mostrar excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Configurar el modo de emulación de preparación para evitar inyecciones SQL
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    // Configurar el manejo de errores en PHP 8 para que sea más estricto
    error_reporting(E_ALL);
    ini_set('display_errors', '1');


} catch (PDOException $e) {
    // Si hay un error, mostrar el mensaje
    die("Error de conexión: " . $e->getMessage());
}
?>
