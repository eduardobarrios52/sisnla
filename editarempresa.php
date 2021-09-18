<?php
include 'conexion.php';

$idempresa = $_POST['idempresa'];
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

$consultanot='update empresa set nombre=\'' . $nombre . '\',rfc=\'' . $rfc . '\', nocertificado=\'' . $nocertificado . '\', certificado=\'' . $certificado . '\', regimenfiscal=\'' . $regimenfiscal . '\', usuariopac=\'' . $usuariopac . '\', contrapac=\'' . $contrapac . '\', nombrepac=\'' . $nombrepac . '\', keyp=\'' . $keyp . '\', pfx=\'' . $pfx . '\', passpfx=\'' . $passpfx . '\' where idempresa=\'' . $idempresa . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}