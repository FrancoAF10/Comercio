<?php
require '../../vendor2/autoload.php'; // Asegúrate de tener la ruta correcta a autoload.php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

// Conexión a la base de datos
$connect = mysqli_connect("localhost", "root", "", "nuevo");
$datos = "SELECT Nro_Taller, Nro_Maquina, Monitor, Serie_Monitor, Estado_Monitor, CPU, Serie_CPU, Descripcion_CPU, Estado_CPU, Teclado, Serie_Teclado, Estado_Teclado, Mouse, Serie_Mouse, Estado_Mouse FROM EQUIPOS WHERE Nro_Taller=4 ORDER BY Nro_Maquina ASC";
$conexion2 = mysqli_query($connect, $datos);

// Crear un nuevo archivo Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar el título "TALLER 4 - SECRETARIADO" comenzando en la celda B2
$sheet->setCellValue('B2', 'TALLER 4 - SECRETARIADO');

// Estilo para el título
$sheet->getStyle('B2')->getFont()->setBold(true)->setSize(16);
$sheet->getStyle('B2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B2')->getFont()->getColor()->setRGB('000000'); // Color del texto (negro)
$sheet->mergeCells('B2:E2'); // Fusiona las celdas de B2 a E2 para el título

// Agregar los encabezados de la tabla comenzando en B3
$sheet->setCellValue('B3', 'N° Maquina')
      ->setCellValue('C3', 'Pantalla')
      ->setCellValue('D3', 'Teclado')
      ->setCellValue('E3', 'Estado de Touchpad');

// Estilo de los encabezados (como en CSS)
$sheet->getStyle('B3:E3')->getFont()->setBold(true);
$sheet->getStyle('B3:E3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000'); // Rojo
$sheet->getStyle('B3:E3')->getFont()->getColor()->setRGB('FFFFFF'); // Blanco
$sheet->getStyle('B3:E3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Escribir los datos en las celdas correspondientes, comenzando desde la fila 4
$row = 4; // Empezamos desde la cuarta fila
while ($mostrar = mysqli_fetch_assoc($conexion2)) {
    $sheet->setCellValue('B' . $row, $mostrar['Nro_Maquina'])
          ->setCellValue('C' . $row, $mostrar['Estado_Monitor'])
          ->setCellValue('D' . $row, $mostrar['Estado_Teclado'])
          ->setCellValue('E' . $row, $mostrar['Estado_Mouse']);
    
    // Aplicar bordes a las celdas
    $sheet->getStyle('B' . $row . ':E' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

    $row++;
}

// Estilo para las filas (bordes y alineación)
$sheet->getStyle('B4:E' . ($row-1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Crear un escritor de Excel (Xlsx)
$writer = new Xlsx($spreadsheet);

// Enviar el archivo Excel al navegador
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Equipos-T4.xlsx"');
header('Cache-Control: max-age=0');

// Guardar el archivo en el flujo de salida
$writer->save('php://output');
exit;
?>
