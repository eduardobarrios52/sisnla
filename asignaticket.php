<?php

@session_start();
include 'conexion.php';


$cve_ses = $_GET['cve_ses'];
$idusuarios = $_GET['idusuarios'];
$consulta4 = 'update  sesiones set cve_atn=\'' . $idusuarios . '\' where cve_ses=\'' . $cve_ses . '\'';
if($mysqli->query($consulta4)){
    echo 'ok';
}else{
    echo 'no';
}

