<?php
include 'conexion.php';

$idoperadores = $_GET['idoperadores'];
$NombreNotificado = $_GET['NombreNotificado'];
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

$consultanot='update notificado set NombreNotificado=\'' . $NombreNotificado . '\', NumRegIdTribArrendatario=\'' . $NumRegIdTribArrendatario . '\', ResidenciaFiscalArrendatario=\'' . $ResidenciaFiscalArrendatario . '\', Calle=\'' . $Calle . '\', NumeroExterior=\'' . $NumeroExterior . '\', NumeroInterior=\'' . $NumeroInterior . '\', Colonia=\'' . $Colonia . '\', Localidad=\'' . $Localidad . '\', Referencia=\'' . $Referencia . '\', Municipio=\'' . $Municipio . '\', Estado=\'' . $Estado . '\', Pais=\'' . $Pais . '\', CodigoPostal=\'' . $CodigoPostal . '\' where idoperadores=\'' . $idoperadores . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>