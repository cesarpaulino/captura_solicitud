<!DOCTYPE html>
<html lang="es">

<head>
    <!-- 1. Configuración del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible; Content-type" content="IE=edge; text/html">
    <!-- 2. Información SEO y Metadatos -->
    <meta name="description" content="Pagina de la alcaldia cuauhtemoc para la captura de soportes">
    <meta name="keywords" content="software, soporte, direcciones">
    <meta name="author" content="Ing. Cesar Paulino">
    <!-- 3. Título de la Página -->
    <title>Captura de Soporte</title>
    <!-- 4. Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- 5. Estilos CSS (Primero los externos, luego los internos) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!-- 6. Scripts que deben cargarse antes del contenido (Opcionales) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container p-5 my-5 text-black 
                position-relative
                d-flex justify-content-center align-items-center">

        <form action="acceder.php" method="post" class="mb-1 contenido">
            <img src="./img/usuario.png" alt="Logo de Inicio de Sesión" class="login-image" width="260" height="240">
            <h1 class="text-center">Iniciar Sesión</h1>
            <div class="form-group col-md-12 text-center"></br>
                <label for="username">Usuario:</label></br>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group col-md-12 text-center"></br>
                <label for="password">Contraseña:</label></br>
                <input type="password" class="form-control" id="password" name="password" required></br>
            </div></br>
            <div class="d-grid gap-1">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <div></br>
        </form>
    </div>

    <?php
    include './php/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            //Guardar datos del usuario en la sesion
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            //Redirigir al dashboard
            header("Location: index.php");
        } else {
            echo '<div class="text-center"><p>😵 Credenciales incorrectas. 😵</p></div>';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery (opcional, para simplificar AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

</body>

</html>