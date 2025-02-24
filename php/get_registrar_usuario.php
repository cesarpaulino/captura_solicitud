<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar y sanitizar entradas de manera segura
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8'); // Evita XSS
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validar que el correo sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger text-center">❌ El correo electrónico no es válido.</div>';
        exit();
    }

    // Validar que la contraseña tenga al menos 8 caracteres
    if (strlen($password) < 8) {
        echo '<div class="alert alert-danger text-center">❌ La contraseña debe tener al menos 8 caracteres.</div>';
        exit();
    }

    try {
        // Verificar si el usuario o el correo ya existen
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert-warning text-center">⚠️ El usuario o correo ya están registrados.</div>';
            exit();
        }

        // Encriptar la contraseña
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insertar en la base de datos
        $stmt = $conexion->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success text-center">✅ Registro exitoso!</div>';
        } else {
            echo '<div class="alert alert-danger text-center">❌ Error al registrar el usuario.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger text-center">❌ Error en la base de datos: ' . $e->getMessage() . '</div>';
    }
}
