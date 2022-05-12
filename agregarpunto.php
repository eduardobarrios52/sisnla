<?php
include 'conexion.php';

$nombre = $_GET['Nombre'];
$rfc = $_GET['rfc'];
$residenciaf = $_GET['ResidenciaFiscal'];
$numregidtrib = isset($_GET['NumRegIdTrib']) ? $_GET['NumRegIdTrib'] : null;
$calle = $_GET['Calle'];
$estado = $_GET['Estado'];
$NumeroExterior = $_GET['NumeroExterior'];
$NumeroInterior = isset($_GET['NumeroInterior']) ? $_GET['NumeroInterior'] : null ;
$pais = $_GET['Pais'];
$colonia = $_GET['Colonia'];
$Municipio = $_GET['Municipio'];
$localidad = $_GET['Localidad'];
$cp = $_GET['CodigoPostal'];

$consultanot='insert into puntos(nombre,rfc,residenciaf,numregidtrib,calle,NumeroExterior,NumeroInterior,estado,pais,cp,c_Colonia,c_Localidad,Municipio)'.
'values(\'' . $nombre . '\',\'' . $rfc . '\',\'' . $residenciaf . '\',\'' . $numregidtrib . '\',\'' . $calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $estado . '\',\'' . $pais . '\',\'' . $cp . '\',\'' . $colonia . '\',\'' . $localidad . '\',\'' . $Municipio . '\')';
                                
$mysqli->query($consultanot);
                        
