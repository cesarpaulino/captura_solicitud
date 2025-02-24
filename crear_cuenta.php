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
    <div class="container p-7 my-7 text-black 
                position-relative
                d-flex justify-content-center align-items-center">

        <form action="crear_cuenta.php" method="post" class="mb-2 contenido">
            <img src="./img/usuario.png" alt="Logo de Inicio de Sesión" class="login-image" width="260" height="240">
            <h2 class="text-center">Registro</h2>
            <div class="form-group col-md-16 text-center"></br>
                <label for="username">Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group col-md-16 text-center"></br>
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group col-md-16 text-center"></br>
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div></br>
            <div class="d-grid gap-1">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div></br>

            <?php include './php/get_registrar_usuario.php'; ?> <!-- Llamamos al archivo por separado -->


           
        </form>

    </div>
</body>

</html>