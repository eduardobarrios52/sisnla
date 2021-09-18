<?php
include 'conexion.php';

$nombre= $_POST['Nombre'];
$rfc = $_POST['RFC'];
$nocertificado = $_POST['nocertificado'];
$certificado = $_POST['certificado'];
$regimenfiscal = $_POST['NumRegIdTribNotificado'];
$usuariopac = $_POST['usuariopac'];
$contrapac = $_POST['contrapac'];
$nombrepac = $_POST['nombrepac'];
$keyp = $_POST['keyp'];
$pfx = $_POST['pfx'];
$passpfx = $_POST['passpfx'];

$consultanot='insert into empresa(nombre,rfc,nocertificado,certificado,regimenfiscal,usuariopac,contrapac,nombrepac,keyp,pfx,passpfx)'.
'values(\'' . $nombre . '\',\'' . $rfc . '\',\'' . $nocertificado . '\',\'' . $certificado . '\',\'' . $regimenfiscal . '\',\'' . $usuariopac . '\',\'' . $contrapac . '\',\'' . $nombrepac . '\',\'' . $keyp . '\',\'' . $pfx . '\',\'' . $passpfx . '\')';
                                
$mysqli->query($consultanot);