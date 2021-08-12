<?php

@session_start();
include 'conexion.php';

$sid = $_GET["cve_ses"];
$ina = 'I';
$consultai = 'update sesiones set estatus =\'' . $ina . '\', fechaterm=now(), tipoterm=2 where cve_ses=\'' . $sid . '\'';
$mysqli->query($consultai);

