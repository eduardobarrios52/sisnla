<?php
include 'conexion.php';

$NombreArrendatario = $_GET['NombreArrendatario'];
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

$consultanot='insert into remolques(NombreArrendatario,NumRegIdTribArrendatario,ResidenciaFiscalArrendatario,Calle,NumeroExterior,NumeroInterior,Colonia,Localidad,Referencia,Municipio,Estado,Pais,CodigoPostal,fecreg)'.
'values(\'' . $NombreArrendatario . '\',\'' . $NumRegIdTribArrendatario . '\',\'' . $ResidenciaFiscalArrendatario . '\',\'' . $Calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $Colonia . '\',\'' . $Localidad . '\',\'' . $Referencia . '\',\'' . $Municipio . '\',\'' . $Estado . '\',\'' . $Pais . '\',\'' . $CodigoPostal . '\', CURDATE())';
                                
$mysqli->query($consultanot);
                        


