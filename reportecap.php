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
    <!-- 6. Scripts que deben cargarse antes del contenido (Opcionales) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- funcionamiento del nav -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Captura de Soporte Técnico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Solicitud de Soporte Técnico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Captura Soporte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportecap.php">Reporte Capturados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- termina el funcionamiento del nav -->
        <div class="container-xxl">
            <div class="row justify-content-md-center">
                <div class="container p-5 my-5 text-black 
                    position-relative
                    d-flex justify-content-center align-items-center">
                    <span class="d-block mb-1">
                <h3 class="text-center">Registro de Soporte Técnico</h3>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-md-center container-fluid">
            <div class="table-responsive ">
                <h3>Lista de Registros</h3>
                <input type="text" id="buscar" class="form-control mb-3" placeholder="Buscar..."
                    onkeyup="filtrar()">
                <table class="table table-striped table-dark table-bordered border-primary" id="tablaRegistros">
                    <thead class="table-dark">
                        <tr class="table-warning">
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Hora llamada</th>
                            <th>Hora Atencion</th>
                            <th>Tel o Ext</th>
                            <th>Folio</th>
                            <th>N° Oficio</th>
                            <th>N° Tabla</th>
                            <th>Secretaria</th>
                            <th>Equipo</th>
                            <th>Nombre del usuario</th>
                            <th>Ubicacion</th>
                            <th>Dirección</th>
                            <th>Subdirección</th>
                            <th>Subárea</th>
                            <th>Departamento</th>
                            <th>Sección</th>
                            <th>Descripción de la falla</th>
                            <th>Tecnicos Asignados</th>
                            <th>N° Progresivo</th>
                            <th>Mac Address</th>
                            <th>IP</th>
                            <th>Toma de razon</th>
                            <th>Firma de confirmidad</th>
                            <th>Usuari@ atendido</th>
                            <th>Descripción del servicio realizado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php include './php/get_tabla.php'; ?> <!-- Llamamos al archivo por separado -->
                    </tbody>
                </table>
            </div>
        </div></br>

        <div class="d-grid gap-3 d-md-block">
            <button onclick="imprimirTabla()" class="btn btn-success" type="button">Imprimir</button>
            <button onclick="window.location.href='exportar_excel.php'" class="btn btn-success" type="button">Exportar a Excel</button>
            <button onclick="window.location.href='exportar_pdf.php'" class="btn btn-success" type="button">Exportar a PDF</button>
        </div>

 


    </div>

    


    <!-- 7. Scripts de JavaScript al final del body para mejorar el rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script_generales.js"></script> <!--se manda a llamar el script para cargar los datos-->
    <!-- jQuery (opcional, para simplificar AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

</body>

</html>
