<?php

session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:/comercio/login.php");
    exit();
}
?>
<?php
require "./models/conexion.php";

$registros=['Nro_Taller','Nro_Maquina', 'Monitor', 'Serie_Monitor', 'Estado_Monitor', 'CPU', 'Serie_CPU','Descripcion_CPU', 'Estado_CPU',
 'Teclado', 'Serie_Teclado', 'Estado_Teclado', 'Mouse', 'Serie_Mouse', 'Estado_Mouse'];
$tabla="EQUIPOS";

$buscar=isset($_POST['buscar'])? $conexion->real_escape_string($_POST['buscar']) : null;

$where="";
if($buscar != null){
    $where="WHERE (";

    $cont=count($registros);
    for($i=0;$i<$cont;$i++){
        $where.=$registros[$i] . " LIKE '%" .$buscar. "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where.= ")";
}

$consulta="SELECT " . implode(", ",$registros) . " 
FROM $tabla 
$where ORDER BY Nro_Taller ASC";
$resultado=$conexion->query($consulta);
$num_filas=$resultado->num_rows;

$html='';

if($num_filas>0){
    while($fila=$resultado->fetch_assoc()){
        $html.="<tr>";
        $html.="<td>".$fila["Nro_Taller"]."</td>";
        $html.="<td>".$fila["Nro_Maquina"]."</td>";
        $html.="<td>".$fila["Monitor"]."</td>";
        $html.="<td>".$fila["Serie_Monitor"]."</td>";
        $html.="<td>".$fila["Estado_Monitor"]."</td>";
        $html.="<td>".$fila["CPU"]."</td>";
        $html.="<td>".$fila["Serie_CPU"]."</td>";
        $html.="<td>".$fila["Descripcion_CPU"]."</td>";
        $html.="<td>".$fila["Estado_CPU"]."</td>";
        $html.="<td>".$fila["Teclado"]."</td>";
        $html.="<td>".$fila["Serie_Teclado"]."</td>";
        $html.="<td>".$fila["Estado_Teclado"]."</td>";
        $html.="<td>".$fila["Mouse"]."</td>";
        $html.="<td>".$fila["Serie_Mouse"]."</td>";
        $html.="<td>".$fila["Estado_Mouse"]."</td>";
        $html.="</tr>";
    }
}else{
    $html.= '<tr>';
    $html.= '<td colspan="15"> SIN RESULTADOS</td>';
    $html.= '</tr>';

}

echo json_encode($html,JSON_UNESCAPED_UNICODE);
?>