<?php
require 'conexion.php';

try {
    // Capturar datos del formulario con sanitización básica
    $fecha = $_POST['fecha'];
    $horadellamada = $_POST['horadellamada'];
    $horadeatencion = $_POST['horadeatencion'];
    $teloext = $_POST['teloext'];
    $folio = $_POST['folio'];
    $noficio = $_POST['noficio'];
    $ndetabla = $_POST['ndetabla'];
    $secretarias = $_POST['secretarias'];
    $hardware = $_POST['hardware'];
    $nomreqser = $_POST['nomreqser'];
    $ubicacion = $_POST['ubicacion'];
    $direccion = $_POST['nombre_direccion'];
    $subdireccion = $_POST['nombre_subdireccion'];
    $subarea = $_POST['nombre_subarea'];
    $departamento = $_POST['nombre_departamento'];
    $seccion = $_POST['nombre_seccion'];
    $desfalla = $_POST['desfalla'];
    $tecnicos = $_POST['tecnicos'];
    $nprogresivo = $_POST['nprogresivo'];
    $mac = $_POST['mac'];
    $ip = $_POST['ip'];
    $tomarazon = $_POST['tomarazon'];
    $desserea = $_POST['desserea'];
    $nomusuate = $_POST['nomusuate'];
    $firma = $_POST['firma'];

    // Consulta SQL con parámetros
    $sql = "INSERT INTO registros (
        fecha, horadellamada, horadeatencion, teloext, folio, noficio, ndetabla, secretarias,
        hardware, nomreqser, ubicacion, direccion, subdireccion, subarea,
        departamento, seccion, desfalla, tecnicos, nprogresivo, mac, ip, tomarazon,
        desserea, nomusuate, firma
    ) VALUES (
        :fecha, :horadellamada, :horadeatencion, :teloext, :folio, :noficio, :ndetabla, :secretarias,
        :hardware, :nomreqser, :ubicacion, :direccion, :subdireccion, :subarea, :departamento, :seccion,
        :desfalla, :tecnicos, :nprogresivo, :mac, :ip, :tomarazon, :desserea, :nomusuate, :firma
    )";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Enlazar parámetros con bindParam
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':horadellamada', $horadellamada);
    $stmt->bindParam(':horadeatencion', $horadeatencion);
    $stmt->bindParam(':teloext', $teloext);
    $stmt->bindParam(':folio', $folio);
    $stmt->bindParam(':noficio', $noficio);
    $stmt->bindParam(':ndetabla', $ndetabla);
    $stmt->bindParam(':secretarias', $secretarias);
    $stmt->bindParam(':hardware', $hardware);
    $stmt->bindParam(':nomreqser', $nomreqser);
    $stmt->bindParam(':ubicacion', $ubicacion);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':subdireccion', $subdireccion);
    $stmt->bindParam(':subarea', $subarea);
    $stmt->bindParam(':departamento', $departamento);
    $stmt->bindParam(':seccion', $seccion);
    $stmt->bindParam(':desfalla', $desfalla);
    $stmt->bindParam(':tecnicos', $tecnicos);
    $stmt->bindParam(':nprogresivo', $nprogresivo);
    $stmt->bindParam(':mac', $mac);
    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':tomarazon', $tomarazon);
    $stmt->bindParam(':desserea', $desserea);
    $stmt->bindParam(':nomusuate', $nomusuate);
    $stmt->bindParam(':firma', $firma);

    // Ejecutar la consulta y redirigir
    if ($stmt->execute()) {
        echo "<script>alert('Registro guardado exitosamente.'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Error al guardar el registro.'); window.location.href='../index.php';</script>";
    }
} catch (PDOException $e) {
    echo "<script>alert('Error al guardar el registro: " . $e->getMessage() . "'); window.location.href='../index.php';</script>";
}

// Cerrar conexión (opcional con PDO)
$conexion = null;