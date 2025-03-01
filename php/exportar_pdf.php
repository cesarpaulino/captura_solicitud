<?php
require 'libs/Tcpdf/tcpdf.php';

$conexion = new mysqli("localhost", "root", "", "select_dinamico_busqueda"); // Inicializar una conexión entre MySQL y PHP
$sql = "SELECT d.nombre AS direccion, s.nombre AS subdireccion, a.nombre AS area /* Crear la consulta para obtener los datos requeridos */
        FROM direcciones d 
        LEFT JOIN subdirecciones s ON d.id = s.id_direccion 
        LEFT JOIN areas a ON s.id = a.id_subdireccion";
$resultado = $conexion->query($sql); // Ejecutar la consulta

// Crear el PDF y configurarlo
$pdf = new TCPDF();
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();
$pdf->SetFont('Helvetica', '', 12);

// Crear la tabla junto con su cabezado
$html = '<h2>Exportación de Datos</h2>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>Dirección</th>
                <th>Subdirección</th>
                <th>Área</th>
            </tr>';

// Llenar la tabla con los datos obtenidos de la consulta
while ($row = $resultado->fetch_assoc()) {
    $html .= "<tr>
                <td>{$row['direccion']}</td>
                <td>{$row['subdireccion']}</td>
                <td>{$row['area']}</td>
              </tr>";
}

// Terminar la tabla y generar el documento PDF
$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('exportacion.pdf', 'D');
exit;
?>
