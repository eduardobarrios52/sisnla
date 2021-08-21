<?php
include 'conexion.php';

$idempresa = $_GET['idempresa'];
$nombre= $_GET['Nombre'];
$rfc = $_GET['RFC'];
$nocertificado = $_GET['nocertificado'];
$certificado = $_GET['certificado'];
$regimenfiscal = $_GET['NumRegIdTribNotificado'];
$usuariopac = $_GET['usuariopac'];
$contrapac = $_GET['contrapac'];
$nombrepac = $_GET['nombrepac'];

$consultanot='update empresa set nombre=\'' . $nombre . '\', nocertificado=\'' . $nocertificado . '\', certificado=\'' . $certificado . '\', regimenfiscal=\'' . $regimenfiscal . '\', usuariopac=\'' . $usuariopac . '\', contrapac=\'' . $contrapac . '\', nombrepac=\'' . $nombrepac . '\' where idempresa=\'' . $idempresa . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}