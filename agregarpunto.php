<?php
include 'conexion.php';

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

$consultanot='insert into puntos(nombre,rfc,residenciaf,numregidtrib,calle,estado,pais,cp,c_Colonia,c_Localidad)'.
'values(\'' . $nombre . '\',\'' . $rfc . '\',\'' . $residenciaf . '\',\'' . $numregidtrib . '\',\'' . $calle . '\',\'' . $estado . '\',\'' . $pais . '\',\'' . $cp . '\',\'' . $colonia . '\',\'' . $localidad . '\')';
                                
$mysqli->query($consultanot);
                        
