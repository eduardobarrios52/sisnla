<?php
include 'conexion.php';

$NombrePropietario = $_GET['NombrePropietario'];
$NumRegIdTribArrendatario = $_GET['NumRegIdTribArrendatario'];
$ResidenciaFiscalArrendatario = $_GET['ResidenciaFiscalArrendatario'];
$Calle = $_GET['Calle'];
$NumeroExterior = $_GET['NumeroExterior'];
$NumeroInterior = $_GET['NumeroInterior'];
$Colonia = $_GET['Colonia'];
$Localidad = $_GET['Localidad'];
$Referencia = $_GET['Referencia'];
$Municipio = $_GET['Municipio'];
$Estado = $_GET['Estado'];
$Pais = $_GET['Pais'];
$CodigoPostal = $_GET['CodigoPostal'];

$consultanot='insert into propietario(NombrePropietario,NumRegIdTribArrendatario,ResidenciaFiscalArrendatario,Calle,NumeroExterior,NumeroInterior,Colonia,Localidad,Referencia,Municipio,Estado,Pais,CodigoPostal,fecreg)'.
'values(\'' . $NombrePropietario . '\',\'' . $NumRegIdTribArrendatario . '\',\'' . $ResidenciaFiscalArrendatario . '\',\'' . $Calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $Colonia . '\',\'' . $Localidad . '\',\'' . $Referencia . '\',\'' . $Municipio . '\',\'' . $Estado . '\',\'' . $Pais . '\',\'' . $CodigoPostal . '\', CURDATE())';
                                
$mysqli->query($consultanot);
                        


