<?php
include 'conexion.php';

$nombre= $_GET['Nombre'];
$claveprodserv = $_GET['claveprodserv'];
$claveunidad = $_GET['claveuniprod'];

$consultanot='insert into productos(nombre,claveprodserv,unidad,estatus)'.
'values(\'' . $nombre . '\',\'' . $claveprodserv . '\',\'' . $claveunidad . '\',\'1\')';
                                
$result = $mysqli->query($consultanot);

$result;