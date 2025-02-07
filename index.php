<!DOCTYPE html>
<html lang="es">

<head>
    <!-- 1. Configuración del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 2. Información SEO y Metadatos -->
    <meta name="description" content="Pagina de la alcaldia cuauhtemoc para la captura de soportes">
    <meta name="keywords" content="software, soporte, direcciones">
    <meta name="author" content="Ing. Cesar Paulino">
    <!-- 3. Título de la Página -->
    <title>Captura de Soporte</title>
    <!-- 4. Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- 5. Estilos CSS (Primero los externos, luego los internos) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 6. Scripts que deben cargarse antes del contenido (Opcionales) -->
    <script>
        function imprimirTabla() {
            var contenido = document.getElementById('tablaRegistros').outerHTML;
            var ventana = window.open('', '', 'width=800,height=600');
            ventana.document.write('<html><head><title>Impresión</title></head><body>');
            ventana.document.write(contenido);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.print();
        }
    </script>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Subdirección de Informática</h1>
        <h3 class="text-center">Solicitud de Soporte Técnico</h3>

        <form action="guardar.php" method="POST" class="mb-4">
            <div class="mb-1">
                <label class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Llamada</label>
                <input type="time" class="form-control" name="horadellamada" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Atención</label>
                <input type="time" class="form-control" name="horadeatencion" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono o Extensión</label>
                <input type="text" class="form-control" name="teloext" oninput="validartelefono(this)" required>
                <script>
                    function validartelefono(input) {
                        input.value = input.value.replace(/\D/g, '').slice(0, 10);
                    }
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">Folio</label>
                <input type="text" class="form-control" name="folio" oninput="validarfolio(this)" required>
                <script>
                    function validarfolio(input) {
                        input.value = input.value.replace(/\D/g, '').slice(0, 10);
                    }
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">N° Oficio</label>
                <input type="text" class="form-control" name="noficio" oninput="validaroficio(this)" required>
                <script>
                    function validaroficio(input) {
                        input.value = input.value.replace(/\D/g, '').slice(0, 10);
                    }
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">N° de Tabla</label>
                <input type="text" class="form-control" name="ndetabla" oninput="validarntabla(this)" required>
                <script>
                    function validarntabla(input) {
                        input.value = input.value.replace(/\D/g, '').slice(0, 10);
                    }
                </script>

            </div>

            <div class="mb-3">
                <label for="form-label">Persona que recibe la llamada</label>
                <select class="form-select" aria-label="Default select example" name="secretarias" id="secretarias"
                    require>
                    <option value="">Seleccione</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM secretarias");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="form-label">Equipo</label>
                <select class="form-select" aria-label="Default select example" name="hardware" id="hardware" require>
                    <option value="">Seleccione</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM hardware");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre del usuario que requiere el servicio</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="ubicion">Alcaldia</label>
                <select class="form-select" aria-label="Default select example" name="ubicacion" id="ubicacion" require>
                    <option value="">Ubicación</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM ubicacion");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>


            <div class="mb-3">
                <label for="area">Área:</label>
                <select class="form-select" aria-label="Default select example" name="direcciones_generales"
                    id="direcciones_generales" require>
                    <option value="">Direcciones Generales</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM direcciones_generales");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="area">Área:</label>
                <select class="form-select" aria-label="Default select example" name="direcciones_generales"
                    id="direcciones_generales" require>
                    <option value="">Direcciones Generales</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM direcciones_generales");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="area">Área:</label>
                <select class="form-select" aria-label="Default select example" name="direcciones_generales"
                    id="direcciones_generales" require>
                    <option value="">Direcciones Generales</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM direcciones_generales");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripcón de la falla:</label>
                <textarea class="form-control" name="mensaje" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Técnic@ Asignad@:</label>
                <select class="form-select" aria-label="Default select example" name="tecnicos" id="tecnicos" require>
                    <option value="">Seleccione</option>
                    <?php
                include './php/conexion.php';
                $query = $conn->query("SELECT * FROM tecnicos");
                while ($row = $query->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">N° Progresivo</label>
                <input type="text" class="form-control" name="nprogresivo" oninput="validarfolio(this)" required>
                <script>
                    function validarfolio(input) {
                        input.value = input.value.replace(/\D/g, '').slice(0, 10);
                    }
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">Dirección física (Mac Address)</label>
                <input type="text" class="form-control" name="mac" placeholder="00:1A:2B:3C:4D:5E"
                    oninput=" autoFormatoMAC(this)" maxlength="17" required>
                <p id="resultado"></p>
                <script>
                    function autoFormatoMAC(input) {
                        // Obtener el valor del campo de entrada
                        let mac = input.value;

                        // Eliminar cualquier carácter no válido (solo permite números y letras A-F)
                        mac = mac.replace(/[^0-9A-Fa-f]/g, '');

                        // Aplicar el autoformato: agregar ":" cada 2 caracteres
                        let macFormateada = '';
                        for (let i = 0; i < mac.length; i++) {
                            if (i > 0 && i % 2 === 0 && i < 12) {
                                macFormateada += ':'; // Agregar ":" cada 2 caracteres
                            }
                            macFormateada += mac[i];
                        }

                        // Limitar la longitud a 17 caracteres (formato completo de MAC)
                        macFormateada = macFormateada.substring(0, 17);

                        // Actualizar el valor del campo de entrada
                        input.value = macFormateada.toUpperCase(); // Convertir a mayúsculas

                        // Validar la MAC
                        validarMAC(input);
                    }

                    function validarMAC(input) {
                        // Obtener el valor del campo de entrada
                        const mac = input.value;

                        // Expresión regular para validar una dirección MAC
                        const regexMAC = /^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$/;

                        // Validar el formato
                        if (regexMAC.test(mac)) {
                            input.classList.remove('invalido');
                            input.classList.add('valido');
                            document.getElementById('resultado').textContent = "✅ Formato de MAC válido.";
                        } else {
                            input.classList.remove('valido');
                            input.classList.add('invalido');
                            document.getElementById('resultado').textContent = "❌ Formato de MAC inválido.";
                        }
                    }                   
                </script>

            </div>

            <div class="mb-3">
                <label class="form-label">Dirección IP</label>
                <input type="text" class="form-control" id="ip" name="ip" placeholder="192.168.1.1"
                    oninput="autoFormatoIP(this)" maxlength="15" required>
                <p id="resultadoip"></p>
                <script>
                    function autoFormatoIP(input) {
                        // Obtener el valor del campo de entrada
                        let ip = input.value;

                        // Eliminar cualquier punto adicional que el usuario haya ingresado
                        ip = ip.replace(/[^0-9.]/g, ''); // Solo permite números y puntos

                        // Dividir la IP en segmentos
                        const segmentos = ip.split('.');

                        // Aplicar el autoformato
                        let ipFormateada = '';
                        for (let i = 0; i < segmentos.length; i++) {
                            if (i > 0) {
                                ipFormateada += '.'; // Agregar un punto entre segmentos
                            }
                            if (segmentos[i].length > 3) {
                                segmentos[i] = segmentos[i].substring(0, 3); // Limitar a 3 dígitos por segmento
                            }
                            ipFormateada += segmentos[i];
                        }

                        // Actualizar el valor del campo de entrada
                        input.value = ipFormateada;

                        // Validar la IP
                        validarIP(input);
                    }

                    function validarIP(input) {
                        // Obtener el valor del campo de entrada
                        const ip = input.value;

                        // Expresión regular para validar una dirección IPv4
                        const regexIP = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;

                        // Validar el formato
                        if (regexIP.test(ip)) {
                            input.classList.remove('invalido');
                            input.classList.add('valido');
                            document.getElementById('resultadoip').textContent = "✅ Formato de IP válido.";
                        } else {
                            input.classList.remove('valido');
                            input.classList.add('invalido');
                            document.getElementById('resultadoip').textContent = "❌ Formato de IP inválido.";
                        }
                    }
                </script>

                <div class="mb-3">
                    <label class="form-label">Toma de Razón</label>
                    <input type="text" class="form-control" name="tomarazon" id="tomarazon" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción del servicio realizado</label>
                    <textarea class="form-control" name="desserrea" id="desserrea" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre del usuari@ atendido</label>
                    <input type="text" class="form-control" name="nomusuate" id="nomusuate" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Firma de confirmidad</label>
                    <input type="text" class="form-control" name="firma" id="firma" required>
                </div>


            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

        </form>

        <h3>Lista de Registros</h3>
        <input type="text" id="buscar" class="form-control mb-3" placeholder="Buscar por nombre..." onkeyup="filtrar()">
        <!-- aqui va la tabla con los resaultados del slect html-->


        <button onclick="imprimirTabla()" class="btn btn-success">Imprimir</button>
    </div>

    <!-- 7. Scripts de JavaScript al final del body para mejorar el rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <!-- scrip para filtar -->
    <script>
        function filtrar() {
            var input, filtro, tabla, tr, td, i, txtValue;
            input = document.getElementById("buscar");
            filtro = input.value.toUpperCase();
            tabla = document.getElementById("tablaRegistros");
            tr = tabla.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toUpperCase().indexOf(filtro) > -1 ? "" : "none";
                }
            }
        }
    </script>

</body>

</html>
