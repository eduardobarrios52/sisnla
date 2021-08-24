<?php
include 'conexion.php';

$nombre= $_GET['Nombre'];
$empresa = $_GET['Empresa'];
$serie = $_GET['Serie'];
$folio = $_GET['Folio'];
$cp = $_GET['CodigoPostal'];;

$consultanot='insert into sucursal(nombre,idempresa,serie,folio,cp)'.
'values(\'' . $nombre . '\',\'' . $empresa . '\',\'' . $serie . '\',\'' . $folio . '\',\'' . $cp . '\')';
                                
$resul = $mysqli->query($consultanot);

$resul;