<?php
include 'conexion.php';

$idpropierario = $_GET['idpropierario'];
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

$consultanot='update propietario set NombrePropietario=\'' . $NombrePropietario . '\', NumRegIdTribArrendatario=\'' . $NumRegIdTribArrendatario . '\', ResidenciaFiscalArrendatario=\'' . $ResidenciaFiscalArrendatario . '\', Calle=\'' . $Calle . '\', NumeroExterior=\'' . $NumeroExterior . '\', NumeroInterior=\'' . $NumeroInterior . '\', Colonia=\'' . $Colonia . '\', Localidad=\'' . $Localidad . '\', Referencia=\'' . $Referencia . '\', Municipio=\'' . $Municipio . '\', Estado=\'' . $Estado . '\', Pais=\'' . $Pais . '\', CodigoPostal=\'' . $CodigoPostal . '\' where idpropierario=\'' . $idpropierario . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>