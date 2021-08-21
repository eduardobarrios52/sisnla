<?php
include 'conexion.php';

$nombre= $_GET['Nombre'];
$rfc = $_GET['RFC'];
$nocertificado = $_GET['nocertificado'];
$certificado = $_GET['certificado'];
$regimenfiscal = $_GET['NumRegIdTribNotificado'];
$usuariopac = $_GET['usuariopac'];
$contrapac = $_GET['contrapac'];
$nombrepac = $_GET['nombrepac'];

$consultanot='insert into empresa(nombre,rfc,nocertificado,certificado,regimenfiscal,usuariopac,contrapac,nombrepac)'.
'values(\'' . $nombre . '\',\'' . $rfc . '\',\'' . $nocertificado . '\',\'' . $certificado . '\',\'' . $regimenfiscal . '\',\'' . $usuariopac . '\',\'' . $contrapac . '\',\'' . $nombrepac . '\')';
                                
$mysqli->query($consultanot);