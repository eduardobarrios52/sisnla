<?php

include 'conexion.php';
header('Content-Type: application/json');
$ele = $_POST['term'];

$consulta = "SELECT clave,nombre FROM unidad where nombre Like '%".$ele['term']."%' ";
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        $i = 1;
        while ($rs = $res->fetch_assoc()) {
            $resp[$i]['id'] =$rs['clave'];
            $resp[$i]['desc'] = $rs['nombre'];
            $i++;
        }
    }
    
    echo json_encode($resp);
?>