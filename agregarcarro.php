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
$marca = $_GET['marca'];
$tipo = $_GET['tipo'];
$propietario = $_GET['propietario'];
$arrendatario = $_GET['arrendatario'];
$Operador = $_GET['operador'];

$consultanot='insert into carros(Economico,PermSCT,NumPermisoSCT,NombreAseg,NumPolizaSeguro,configVehicular,PlacaVM,AnioModeloVM,marca,tipo,propietario,arrendatario,idoperador,fecreg)'.
'values(\'' . $Economico . '\',\'' . $PermSCT . '\',\'' . $NumPermisoSCT . '\',\'' . $NombreAseg . '\',\'' . $NumPolizaSeguro . '\',\'' . $configVehicular . '\',\'' . $PlacaVM . '\',\'' . $AnioModeloVM . '\',\'' . $marca . '\',\'' . $tipo . '\',\'' . $propietario . '\',\'' . $arrendatario . '\',\'' . $Operador . '\', CURDATE())';
                                
$res = $mysqli->query($consultanot);

$res;