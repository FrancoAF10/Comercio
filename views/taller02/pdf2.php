<?php
// Iniciar sesión
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location:/comercio/login.php");
    exit();
}

// Conexión a la base de datos
$connect = mysqli_connect("localhost", "root", "", "nuevo");
if (!$connect) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL para obtener los datos
$datos = "SELECT Nro_Taller, Nro_Maquina, Monitor, Serie_Monitor, Estado_Monitor, 
                  CPU, Serie_CPU, Descripcion_CPU, Estado_CPU, Teclado, 
                  Serie_Teclado, Estado_Teclado, Mouse, Serie_Mouse, Estado_Mouse 
          FROM EQUIPOS 
          WHERE Nro_Taller = 2
          ORDER BY Nro_Maquina ASC";
$conexion2 = mysqli_query($connect, $datos);

// Generar contenido HTML para el PDF
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario Taller 1</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      font-size: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      table-layout: fixed;
    }
    th, td {
      border: 1px solid black;
      padding: 5px;
      text-align: center;
      word-wrap: break-word;
      font-size: 8px;
    }
    th {
      background-color: #f2f2f2;
      font-size: 10px;
    }
    h2 {
      font-size: 14px;
      font-weight: bold;
    }
    /* Ajuste de los márgenes de la página */
    @page {
      margin: 10mm;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .header h3 {
      display: inline-block;
      margin-left: 10px;
      font-size: 18px;
      font-weight: bold;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="header"> 
    <h3>"Institución Educativa Andrés Avelino Cáceres"</h3>
  </div>

  <h2 align="center">Inventario Taller 2 - Contabilidad </h2>
  <table>
    <thead>
      <tr>
        <th>N° Maquina</th>
        <th>Monitor</th>
        <th>Serie Monitor</th>
        <th>Estado Monitor</th>
        <th>CPU</th>
        <th>Serie CPU</th>
        <th>Descripcion CPU</th>
        <th>Estado CPU</th>
        <th>Teclado</th>
        <th>Serie Teclado</th>
        <th>Estado Teclado</th>
        <th>Mouse</th>
        <th>Serie Mouse</th>
        <th>Estado Mouse</th>
      </tr>
    </thead>
    <tbody>';

    // Agregar cada fila de datos
    while ($mostrar = mysqli_fetch_assoc($conexion2)) {
        $html .= '<tr>';
        $html .= '<td>' . $mostrar['Nro_Maquina'] . '</td>';
        $html .= '<td>' . $mostrar['Monitor'] . '</td>';
        $html .= '<td>' . $mostrar['Serie_Monitor'] . '</td>';
        $html .= '<td>' . $mostrar['Estado_Monitor'] . '</td>';
        $html .= '<td>' . $mostrar['CPU'] . '</td>';
        $html .= '<td>' . $mostrar['Serie_CPU'] . '</td>';
        $html .= '<td>' . $mostrar['Descripcion_CPU'] . '</td>';
        $html .= '<td>' . $mostrar['Estado_CPU'] . '</td>';
        $html .= '<td>' . $mostrar['Teclado'] . '</td>';
        $html .= '<td>' . $mostrar['Serie_Teclado'] . '</td>';
        $html .= '<td>' . $mostrar['Estado_Teclado'] . '</td>';
        $html .= '<td>' . $mostrar['Mouse'] . '</td>';
        $html .= '<td>' . $mostrar['Serie_Mouse'] . '</td>';
        $html .= '<td>' . $mostrar['Estado_Mouse'] . '</td>';
        $html .= '</tr>';
    }

$html .= '</tbody></table></body></html>';

// Incluir la librería Dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Crear una nueva instancia de Dompdf
$dompdf = new Dompdf();

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// Establecer el tamaño de la página y orientación
$dompdf->setPaper('A4', 'landscape');

// Renderizar el PDF (esto genera el archivo PDF)
$dompdf->render();

// Descargar el archivo PDF
$dompdf->stream("reporte-taller-2.pdf", array("Attachment" => true));
?>
