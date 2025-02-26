<?php
require 'conexion.php'; // Asegúrate de que el archivo de conexión usa "$conexion"
try {
    $sql = "SELECT * FROM registros WHERE 1 LIMIT 15 "; // Seleccionar registros
    $result = $conexion->query($sql);                   // y ejecutar la consulta

    // Mostrar en una tabla todos los registros obtenidos
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Usar PDO en lugar de fetch_assoc()
        echo "<tr class=table-info>
                <td>{$row['id']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['horadellamada']}</td>
                <td>{$row['horadeatencion']}</td>
                <td>{$row['teloext']}</td>
                <td>{$row['folio']}</td>
                <td>{$row['noficio']}</td>
                <td>{$row['ndetabla']}</td>
                <td>{$row['secretarias']}</td>
                <td>{$row['hardware']}</td>
                <td>{$row['nomreqser']}</td>
                <td>{$row['ubicacion']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['subdireccion']}</td>
                <td>{$row['subarea']}</td>
                <td>{$row['departamento']}</td>
                <td>{$row['seccion']}</td>
                <td>{$row['desfalla']}</td>
                <td>{$row['tecnicos']}</td>
                <td>{$row['nprogresivo']}</td>
                <td>{$row['mac']}</td>
                <td>{$row['ip']}</td>
                <td>{$row['tomarazon']}</td>
                <td>{$row['firma']}</td>
                <td>{$row['nomusuate']}</td>
                <td>{$row['desserea']}</td>
            </tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='24' class='text-center text-danger'>Error al obtener los registros: " . $e->getMessage() . "</td></tr>";
}

// Cerrar conexión
$conexion = null;
