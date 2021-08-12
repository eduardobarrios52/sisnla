<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

@session_start();
include 'conexion.php';

$idatn = $_SESSION["id"];
$a = 'A';
$num =0;
$consulta = 'select cve_ses from sesiones where cve_atn=\'' . $idatn . '\' and estatus=\'' . $a . '\' and cve_cia=1';
if ($resultadocolp = $mysqli->query($consulta)) {
    $num=$resultadocolp->num_rows; 
}
echo $num;