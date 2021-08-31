<?php
include 'conexion.php';

$nombre= $_GET['Nombre'];
$claveprodserv = $_GET['claveprodserv'];
$claveunidad = $_GET['claveuniprod'];

$consultanot='insert into productos(nombre,claveprodserv,unidad)'.
'values(\'' . $nombre . '\',\'' . $claveprodserv . '\',\'' . $claveunidad . '\')';
                                
$result = $mysqli->query($consultanot);

$result;