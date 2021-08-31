<?php

include 'conexion.php';
header('Content-Type: application/json');
$ele = $_POST['term'];

$consulta = "SELECT c_ClaveProdServ,Descripcion FROM claveprodserv where Descripcion Like '%".$ele['term']."%' ";
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        $i = 1;
        while ($rs = $res->fetch_assoc()) {
            $resp[$i]['id'] =$rs['c_ClaveProdServ'];
            $resp[$i]['desc'] = $rs['Descripcion'];
            $i++;
        }
    }
    
    echo json_encode($resp);
?>