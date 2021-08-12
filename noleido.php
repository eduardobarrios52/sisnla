<?php

@session_start();
include 'conexion.php';

$idatn = $_GET["cve_ses"];
$a = 'A';
$consulta = 'SELECT * FROM msjchat where visto=0 and tip_usu=1 and cve_ses=\'' . $idatn . '\'';
$num=0;
//$consulta = 'select cve_ses from sesiones where cve_ses=\'' . $idatn . '\' and estatus=\'' . $a . '\' and cve_cia=1';
//$consulta = 'select cve_ses from sesiones where cve_atn=\'' . $idatn . '\' and estatus=\'' . $a . '\' and cve_cia=1';
if ($resultadocolp = $mysqli->query($consulta)) {
    $num=$resultadocolp->num_rows; 
}
echo $num;