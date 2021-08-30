<?php
include 'conexion.php';

$idcarro = $_GET['idcarro'];
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
$Notificado = $_GET['notificado'];
$Operador = $_GET['operador'];

$consultanot='update carros set Economico=\'' . $Economico . '\', PermSCT=\'' . $PermSCT . '\', NumPermisoSCT=\'' . $NumPermisoSCT . '\', NombreAseg=\'' . $NombreAseg . '\', NumPolizaSeguro=\'' . $NumPolizaSeguro . '\', configVehicular=\'' . $configVehicular . '\', PlacaVM=\'' . $PlacaVM . '\', AnioModeloVM=\'' . $AnioModeloVM . '\', marca=\'' . $marca . '\', tipo=\'' . $tipo . '\', propietario=\'' . $propietario . '\', Notificado=\'' . $Notificado . '\', arrendatario=\'' . $arrendatario . '\',idoperador=\'' . $Operador . '\' where idcarros=\'' . $idcarro. '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>