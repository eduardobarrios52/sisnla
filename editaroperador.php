<?php
include 'conexion.php';

$idoperadores = $_GET['idoperadores'];
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

$consultanot='update operadores set NombreOperador=\'' . $NombreOpe . '\', RFCOperador=\'' . $RFCOperador . '\', NumLicencia=\'' . $NumLicencia . '\', Calle=\'' . $Calle . '\', NumeroExterior=\'' . $NumeroExterior . '\', NumeroInterior=\'' . $NumeroInterior . '\', Colonia=\'' . $Colonia . '\', Localidad=\'' . $Localidad . '\', Referencia=\'' . $Referencia . '\', Municipio=\'' . $Municipio . '\', Estado=\'' . $Estado . '\', Pais=\'' . $Pais . '\', CodigoPostal=\'' . $CodigoPostal . '\' where idoperadores=\'' . $idoperadores . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>