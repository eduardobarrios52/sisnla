<?php
include 'conexion.php';

$idsucursal = $_GET['idsucursal'];
$nombre= $_GET['Nombre'];
$empresa = $_GET['Empresa'];
$serie = $_GET['Serie'];
$folio = $_GET['Folio'];
$cp = $_GET['CodigoPostal'];;


$consultanot='update sucursal set nombre=\'' . $nombre . '\', empresa=\'' . $empresa . '\', serie=\'' . $serie . '\', folio=\'' . $folio . '\' where idsucursal=\'' . $idsucursal . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}