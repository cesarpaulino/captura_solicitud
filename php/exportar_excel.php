<?php
require 'libs/PhpSpreadsheet'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$conexion = new mysqli("localhost", "root", "", "select_dinamico_busqueda");
$sql = "SELECT d.nombre AS direccion, s.nombre AS subdireccion, a.nombre AS area 
        FROM direcciones d 
        LEFT JOIN subdirecciones s ON d.id = s.id_direccion 
        LEFT JOIN areas a ON s.id = a.id_subdireccion";
$resultado = $conexion->query($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Dirección');
$sheet->setCellValue('B1', 'Subdirección');
$sheet->setCellValue('C1', 'Área');

$fila = 2;
while ($row = $resultado->fetch_assoc()) {
    $sheet->setCellValue("A$fila", $row['direccion']);
    $sheet->setCellValue("B$fila", $row['subdireccion']);
    $sheet->setCellValue("C$fila", $row['area']);
    $fila++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="exportacion.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>