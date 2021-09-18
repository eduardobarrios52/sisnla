<?php
include 'conexion.php';

$idpuntos =  $_GET['idpunto'];
$nombre = $_GET['Nombre'];
$rfc = $_GET['rfc'];
$residenciaf = $_GET['ResidenciaFiscal'];
$numregidtrib = isset($_GET['NumRegIdTrib']) ? $_GET['NumRegIdTrib'] : null;
$calle = $_GET['Calle'];
$estado = $_GET['Estado'];
$pais = $_GET['Pais'];
$colonia = $_GET['Colonia'];
$localidad = $_GET['Localidad'];
$cp = $_GET['CodigoPostal'];

$consultanot='update puntos set nombre=\'' . $nombre . '\',rfc=\'' . $rfc . '\', residenciaf=\'' . $residenciaf . '\', numregidtrib=\'' . $numregidtrib . '\', calle=\'' . $calle . '\', estado=\'' . $estado . '\', pais=\'' . $pais . '\', cp=\'' . $cp . '\', c_Colonia=\'' . $colonia . '\', c_Localidad=\'' . $localidad . '\' where idpuntos=\'' . $idpuntos . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
$resp = $mysqli;