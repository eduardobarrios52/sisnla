<?php
include 'conexion.php';

$nombre= $_GET['nombre'];
$rfc = $_GET['rfc'];
$nocertificado = $_GET['nocertificado'];
$certificado = $_GET['certificado'];
$regimenfiscal = $_GET['regimenfiscal'];
$usuariopac = $_GET['usuariopac'];
$contrapac = $_GET['contrapac'];
$nombrepac = $_GET['nombrepac'];

$consultanot='insert into empresa(nombre,rfc,nocertificado,certificado,regimenfiscal,usuariopac,contrapac,nombrepac)'.
'values(\'' . $nombre . '\',\'' . $rfc . '\',\'' . $nocertificado . '\',\'' . $certificado . '\',\'' . $regimenfiscal . '\',\'' . $usuariopac . '\',\'' . $contrapac . '\',\'' . $nombrepac . '\')';
                                
$mysqli->query($consultanot);