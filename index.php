<?php
session_start();
//Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$nombre_usuario = $_SESSION['username'];
?>
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
    <!-- funcionamiento del div alcaldia -->
    <div class="container p-5 my-5 text-black 
                position-relative
                d-flex justify-content-center align-items-center">
        <span class="d-block mb-3">
            <h2 class="text-center">Alcaldía Cuauhtémoc</h2>
            <h3 class="text-center">Subdirección de Informática</h3>
            <h4 class="text-center">Solicitud de Soporte Técnico</h4>
            <h6 class="text-center">Has iniciado sesión correctamente.</h6>
            <h6 class="text-center"><?php echo htmlspecialchars($nombre_usuario); ?> 👌</h6>
        </span>
    </div>
    <!-- funcionamiento del formulario -->
    <form action="./php/guardar.php" method="POST" class="mb-4">
        <!-- funcionamiento del form group1 -->
        <div class="container-xxl">
            <div class="row justify-content-md-center">
                <div class="form-group col-md-2">
                    <label class="form-label" for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label" for="horadellamada">Hora de Llamada</label>
                    <input type="time" class="form-control" name="horadellamada" id="horadellamada" min="07:00" max="20:00" required>
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label" for="horadeatencion">Hora de Atención</label>
                    <input type="time" class="form-control" name="horadeatencion" id="horadeatencion" min="07:00" max="22:00" required>
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label" for="teloext">Teléfono o Ext.</label>
                    <input type="tel" class="form-control" name="teloext" id="teloext" oninput="validartelefono(this)" required>
                </div>
                <div class="form-group col-md-2">
                    <label class=" form-label" for="folio">Folio</label>
                    <input type="number" class="form-control" name="folio" id="folio" oninput="validarfolio(this)" required>
                </div>
                <div class="form-group col-md-2">
                    <label class="form-label" for="noficio">N° Oficio</label>
                    <input type="number" class="form-control" name="noficio" id="noficio" oninput="validaroficio(this)" required>
                </div>
            </div>
        </div></br>
        <!-- termina funcionamiento del form group1 -->
        <!-- funcionamiento del form group2 -->
        <div class="container-xxl">
            <div class="row justify-content-md-center">
                <div class="form-group col-md-2">
                    <label class="form-label" for="ndetabla">N° de Tabla</label>
                    <input type="number" class="form-control" name="ndetabla" id="ndetabla" oninput="validarntabla(this)" required>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="secretarias">Secretaria</label>
                    <select class="form-select" name="secretarias" id="secretarias" required>
                        <option value="">Cargando...</option>
                        <?php include './php/get_secretarias.php'; ?> <!-- Llamamos al archivo por separado -->
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="hardware">Equipo</label>
                    <select class="form-select" name="hardware" id="hardware" required>
                        <option value="">Cargando...</option>
                        <?php include './php/get_hardware.php'; ?> <!-- Llamamos al archivo por separado -->
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label" for="nomreqser">Nombre del usuario que requiere el servicio</label>
                    <input type="text" class="form-control" name="nomreqser" id="nomreqser" required>
                </div>
            </div>
        </div>
        </br>
        <!-- termina funcionamiento del form group2 -->
        <!-- funcionamiento del form group3 -->
        <div class="container-xxl">
            <div class="row justify-content-md-center">
                <div class="form-group col-md-3">
                    <label class="form-label" for="ubicacion">Ubicación</label>
                    <select class="form-select" aria-label="Default select example" name="ubicacion" id="ubicacion"
                        required>
                        <option value="">Cargando...</option>
                        <?php include './php/get_ubicacion.php'; ?> <!-- Llamamos al archivo por separado -->
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="direccion">Dirección:</label>
                    <select class="form-select" aria-label="Default select example" id="direccion" name="direccion" required>
                        <option value="">Cargando...</option>
                        <?php include './php/get_direcciones.php'; ?> <!-- Llamamos al archivo separado -->
                    </select>
                    <input type="hidden" id="nombre_direccion" name="nombre_direccion"></br>
                </div></br>
                <!-- termina funcionamiento del form group3 -->
                <!-- funcionamiento del form group4 -->
                <div class="form-group col-md-5">
                    <label class="form-label" for="subdireccion">Subdirección:</label>
                    <select class="form-select" aria-label="Default select example" id="subdireccion" name="subdireccion" disabled>
                        <option value="">Seleccione Subdirección</option>
                    </select>
                    <input type="hidden" id="nombre_subdireccion" name="nombre_subdireccion">
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="subarea">Subárea:</label>
                    <select class="form-select" aria-label="Default select example" id="subarea" name="subarea" disabled>
                        <option value="">Cargando...</option>
                    </select>
                    <input type="hidden" id="nombre_subarea" name="nombre_subarea"></br>
                </div>
                <!-- termina funcionamiento del form group4 -->
                <!-- funcionamiento del form group5 -->
                <div class="form-group col-md-5">
                    <label class="form-label" for="departamento">Departamento:</label>
                    <select class="form-select" aria-label="Default select example" id="departamento" name="departamento" disabled>
                        <option value="">Cargando...</option>
                    </select>
                    <input type="hidden" id="nombre_departamento" name="nombre_departamento">
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="seccion">Sección:</label>
                    <select class="form-select" aria-label="Default select example" id="seccion" name="seccion" disabled>
                        <option value="">Cargando...</option>
                    </select>
                    <input type="hidden" id="nombre_seccion" name="nombre_seccion"></br>
                </div>
                <!-- termina funcionamiento del form group5 -->
                <!-- funcionamiento del form group6 -->
                <div class="container-xxl">
                    <div class="row justify-content-md-center">

                        <div class="form-group col-md-3">
                            <label class="form-label" for="tecnicos">Técnic@ Asignad@:</label>
                            <select class="form-select" aria-label="Default select example" name="tecnicos" id="tecnicos"
                                required>
                                <option value="">Cargando...</option>
                                <?php include './php/get_tecnicos.php'; ?> <!-- Llamamos al archivo separado -->
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label" for="nprogresivo">N° Progresivo</label>
                            <input type="number" class="form-control" name="nprogresivo" id="nprogresivo"
                                oninput="validarprog(this)" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label">Dirección física (Mac Address)</label>
                            <input type="text" class="form-control" name="mac" placeholder="00:1A:2B:3C:4D:5E"
                                oninput=" autoFormatoMAC(this)" maxlength="17" required>
                            <p id="resultado"></p>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label">Dirección IP</label>
                            <input type="text" class="form-control" id="ip" name="ip" placeholder="192.168.1.1"
                                oninput="autoFormatoIP(this)" maxlength="15" required>
                            <p id="resultadoip"></p>
                        </div>
                    </div>
                </div></br>
                <!-- termina funcionamiento del form group6 -->
                <!-- funcionamiento del form group7 -->
                <div class="container-xxl">
                    <div class="row justify-content-md-center">
                        <div class="form-group col-md-3">
                            <label class=" form-label" for="tomarazon">Toma de Razón</label>
                            <select class="form-select" name="tomarazon" id="tomarazon">
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=" form-label" for="firma">Firma de confirmidad</label>
                            <select class="form-select" name="firma" id="firma">
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="nomusuate">Nombre del usuari@ atendido</label>
                            <input type="text" class="form-control" name="nomusuate" id="nomusuate" required>
                        </div>
                    </div></br>
                </div>
                <!-- termina funcionamiento del form group7 -->
                <!-- funcionamiento del form group8 -->
                <div class="container-xxl">
                    <div class="row justify-content-md-center">
                        <div class="form-group col-md-12">
                            <label class=" form-label" for="desserea">Descripción del servicio realizado</label>
                            <textarea class="form-control" name="desserea" id="desserea" rows="2" required></textarea>
                        </div></br>
                    </div></br>
                    <!-- termina funcionamiento del form group8 -->
                    <!-- funcionamiento del form group9 -->
                    <div class="container-xxl">
                        <div class="row justify-content-md-center">
                            <div class="d-grid gap-1">
                                <button class="btn btn-success" type="submit">Guardar</button>
                            </div>
                        </div>
                    </div></br></br>
                    <!-- termina funcionamiento del form group9 -->
    </form>
    <!-- termina funcionamiento del form -->
    <!-- 7. Scripts de JavaScript al final del body para mejorar el rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script_globals.js"></script>
    <!-- jQuery (opcional, para simplificar AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
</body>

</html>