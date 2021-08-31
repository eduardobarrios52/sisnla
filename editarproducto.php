<?php
include 'conexion.php';

$idproducto = $_GET['idproducto'];
$nombre= $_GET['Nombre'];
$claveprodserv = $_GET['claveprodserv'];
$claveunidad = $_GET['claveuniprod'];

$consultanot='update productos set nombre=\'' . $nombre . '\', claveprodserv=\'' . $claveprodserv . '\', unidad=\'' . $claveunidad . '\' where idproducto=\'' . $idproducto . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}