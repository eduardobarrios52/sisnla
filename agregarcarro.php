<?php
include 'conexion.php';

$Economico= $_GET['Economico'];
$PermSCT = $_GET['PermSCT'];
$NumPermisoSCT = $_GET['NumPermisoSCT'];
$NombreAseg = $_GET['NombreAseg'];
$NumPolizaSeguro = $_GET['NumPolizaSeguro'];
$configVehicular = $_GET['configVehicular'];
$PlacaVM = $_GET['PlacaVM'];
$AnioModeloVM = $_GET['AnioModeloVM'];
$modelo = $_GET['modelo'];
$tipo = $_GET['tipo'];
$propietario = $_GET['propietario'];
$arrendatario = $_GET['arrendatario'];
$Notificado = $_GET['Notificado'];

$consultanot='insert into carros(Economico,PermSCT,NumPermisoSCT,NombreAseg,NumPolizaSeguro,configVehicular,PlacaVM,AnioModeloVM,modelo,tipo,propietario,arrendatario,Notificado,fecreg)'.
'values(\'' . $Economico . '\',\'' . $PermSCT . '\',\'' . $NumPermisoSCT . '\',\'' . $NombreAseg . '\',\'' . $NumPolizaSeguro . '\',\'' . $configVehicular . '\',\'' . $PlacaVM . '\',\'' . $AnioModeloVM . '\',\'' . $modelo . '\',\'' . $tipo . '\',\'' . $propietario . '\',\'' . $arrendatario . '\',\'' . $Notificado . '\', CURDATE())';
                                
$mysqli->query($consultanot);