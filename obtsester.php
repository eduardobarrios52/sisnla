<?php

@session_start();
include 'conexion.php';

$idatn = $_GET["cve_ses"];
$a = 'I';
$num=0;
$consulta = 'select cve_ses from sesiones where cve_ses=\'' . $idatn . '\' and estatus=\'' . $a . '\' and cve_cia=1';
//$consulta = 'select cve_ses from sesiones where cve_atn=\'' . $idatn . '\' and estatus=\'' . $a . '\' and cve_cia=1';
if ($resultadocolp = $mysqli->query($consulta)) {
    $num=$resultadocolp->num_rows; 
}
echo $num;
