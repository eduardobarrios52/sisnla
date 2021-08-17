<?php
include 'conexion.php';

$NombreNotificado = $_GET['NombreNotificado'];
$NumRegIdTribArrendatario = $_GET['NumRegIdTribNotificado'];
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

$consultanot='insert into notificado(NombreNotificado,NumRegIdTribNotificado,ResidenciaFiscalNotificado,Calle,NumeroExterior,NumeroInterior,Colonia,Localidad,Referencia,Municipio,Estado,Pais,CodigoPostal,fecreg)'.
'values(\'' . $NombreNotificado . '\',\'' . $NumRegIdTribArrendatario . '\',\'' . $ResidenciaFiscalArrendatario . '\',\'' . $Calle . '\',\'' . $NumeroExterior . '\',\'' . $NumeroInterior . '\',\'' . $Colonia . '\',\'' . $Localidad . '\',\'' . $Referencia . '\',\'' . $Municipio . '\',\'' . $Estado . '\',\'' . $Pais . '\',\'' . $CodigoPostal . '\', CURDATE())';
                                
$mysqli->query($consultanot);
                        


