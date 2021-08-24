<?php
include 'conexion.php';

$NombreArrendatario = $_GET['NombreArrendatario'];
$NumRegIdTribArrendatario = $_GET['NumRegIdTribArrendatario'];
$ResidenciaFiscalArrendatario = $_GET['ResidenciaFiscal'];
$Calle = $_GET['Calle'];
$NumeroExterior = $_GET['NumeroExterior'];
$NumeroInterior = isset($_GET['NumeroInterior']) ? $_GET['NumeroInterior'] : null ;;
$Colonia = $_GET['Colonia'];
$Localidad = isset($_GET['Localidad']) ? $_GET['Localidad'] : null ;;
$Referencia = isset($_GET['Referencia']) ? $_GET['Referencia'] : null ;;
$Municipio = $_GET['Municipio'];
$Estado = $_GET['Estado'];
$Pais = $_GET['Pais'];
$CodigoPostal = $_GET['CodigoPostal'];

$consultanot='insert into arrendatario(NombreArrendatario,NumRegIdTribArrendatario,ResidenciaFiscalArrendatario,Calle,NumeroExterior,NumeroInterior,Colonia,Localidad,Referencia,Municipio,Estado,Pais,CodigoPostal,fecreg)'.
'values(\'' . $NombreArrendatario . '\',\'' . $NumRegIdTribArrendatario . '\',\'' . $ResidenciaFiscalArrendatario . '\',\'' . $Calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $Colonia . '\',\'' . $Localidad . '\',\'' . $Referencia . '\',\'' . $Municipio . '\',\'' . $Estado . '\',\'' . $Pais . '\',\'' . $CodigoPostal . '\', CURDATE())';
                                
$resul = $mysqli->query($consultanot);

$result;
                        


