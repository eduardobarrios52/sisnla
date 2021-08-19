<?php
include 'conexion.php';

$NombreOpe = $_GET['Nombre'];
$RFCOperador = $_GET['rfc'];
$NumLicencia = $_GET['NumLicencia'];
$Calle = $_GET['Calle'];
$NumeroExterior = $_GET['NumeroExterior'];
$NumeroInterior = isset($_GET['NumeroInterior']) ? $_GET['NumeroInterior'] : null ;
$Colonia = $_GET['Colonia'];
$Localidad = isset($_GET['Localidad']) ? $_GET['Localidad'] : null ;
$Referencia = isset($_GET['Referencia']) ? $_GET['Referencia'] : null ;
$Municipio = $_GET['Municipio'];
$Estado = $_GET['Estado'];
$Pais = $_GET['Pais'];
$CodigoPostal = $_GET['CodigoPostal'];

$consultanot='insert into operadores(NombreOperador,RFCOperador,NumLicencia,Calle,NumeroExterior,NumeroInterior,Colonia,Localidad,Referencia,Municipio,Estado,Pais,CodigoPostal)'.
'values(\'' . $NombreOpe . '\',\'' . $RFCOperador . '\',\'' . $NumLicencia . '\',\'' . $Calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $Colonia . '\',\'' . $Localidad . '\',\'' . $Referencia . '\',\'' . $Municipio . '\',\'' . $Estado . '\',\'' . $Pais . '\',\'' . $CodigoPostal . '\')';
                                
$mysqli->query($consultanot);
                        
