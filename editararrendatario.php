<?php
include 'conexion.php';

$idarrendatario = $_GET['idarrendatario'];
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

$consultanot='update arrendatario set NombreArrendatario=\'' . $NombreArrendatario . '\', NumRegIdTribArrendatario=\'' . $NumRegIdTribArrendatario . '\', ResidenciaFiscalArrendatario=\'' . $ResidenciaFiscalArrendatario . '\', Calle=\'' . $Calle . '\', NumeroExterior=\'' . $NumeroExterior . '\', NumeroInterior=\'' . $NumeroInterior . '\', Colonia=\'' . $Colonia . '\', Localidad=\'' . $Localidad . '\', Referencia=\'' . $Referencia . '\', Municipio=\'' . $Municipio . '\', Estado=\'' . $Estado . '\', Pais=\'' . $Pais . '\', CodigoPostal=\'' . $CodigoPostal . '\' where idarrendatario=\'' . $idarrendatario . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>