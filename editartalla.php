<?php

$idtalla = $_GET['idtalla'];

$nombre = $_GET['nombre'];
$apaterno = $_GET['apaterno'];
$amaterno = $_GET['amaterno'];
$nome = $_GET['nome'];
$descripcion=$_GET['descripcion'];
$contra = $_GET["contra"];
$curp = $_GET["curp"];
$rfc = $_GET["rfc"];
$nuser = $_GET["nuser"];
$area = $_GET["area"];
$originalDate = $_GET["fecing"];
$fecing = @date("Y-m-d", strtotime($originalDate));
$originalDate = $_GET["fecnac"];
$fecnac= @date("Y-m-d", strtotime($originalDate));
$domi = $_GET["domi"];

$telcasa = $_GET["telcasa"];
$celular = $_GET["celular"];
$alergia = $_GET["alergia"];

$zoom=$_GET["zoom"];
 $celularins=$_GET["celularins"];
 $emailins=$_GET["emailins"];

include 'conexion.php';

//$consultanot = 'update ususis set nombre=\'' . $nombre . '\', puesto=\'' . $nome . '\',email=\'' . $descripcion . '\',contra=\'' .  . '\' where idusuarios=\'' . $idtalla . '\'';
//echo $consultanot;
$consultanot='update ususis set zoom=\'' . $zoom . '\',celularins=\'' . $celularins . '\',emailins=\'' . $emailins . '\',nombre=\'' . $nombre . '\',apaterno=\'' . $apaterno . '\',amaterno=\'' . $amaterno . '\',puesto=\'' . $nome . '\',email=\'' . $descripcion . '\',contra=\'' . $contra . '\',fechaingreso=\'' . $fecing . '\' ,fechanaci=\'' . $fecnac . '\' ,curp=\'' . $curp . '\' ,rfc=\'' . $rfc . '\' ,domicilio=\'' . $domi . '\' ,tipo=\'' . $nuser . '\', area=\'' . $area . '\',telcasa=\'' . $telcasa . '\',celular=\'' . $celular . '\',alergia=\'' . $alergia . '\' where idusuarios=\'' . $idtalla . '\'';

//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     