<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';
/*
$nombre = $_GET["nombre"];
$nome = $_GET["nome"];
$descripcion = $_GET["descripcion"];
$contra = $_GET["contra"];




$consultanot = 'update clichat set NOMBRE=\'' . $nombre . '\', CORREO=\'' . $nome . '\',TELEFONO=\'' . $descripcion . '\',CONTRA=\'' . $contra . '\' where CVE_CLI=\'' . $idtalla . '\'';
//echo $consultanot;


if ($mysqli->query($consultanot)) {
    echo 'ok';
}
        */                        
                        
                        
                     


$nombre = $_GET['nombre'];
//$ = $_GET[''];
$rfc = $_GET['rfc'];

$nome = $_GET['nome'];
$descripcion=$_GET['descripcion'];
$contra = $_GET["contra"];
$IMMEX = $_GET['IMMEX'];
$PROSEC = $_GET['PROSEC'];
$DRAWBACK = $_GET['DRAWBACK'];
$REGLAOCTAVA = $_GET['REGLAOCTAVA'];
$A = $_GET['A'];
$AA = $_GET['AA'];
$AAA = $_GET['AAA'];
$PADGENIMP = $_GET['PADGENIMP'];
$PADSECIMP = $_GET['PADSECIMP'];
$PADSEC3 = $_GET['PADSEC3'];
$OEA = $_GET['OEA'];
$CTPAT = $_GET['CTPAT'];
$C1NOM = $_GET['C1NOM'];
$C1MAIL = $_GET['C1MAIL'];
$C1PUESTO = $_GET['C1PUESTO'];
$C2NOM = $_GET['C2NOM'];
$C2MAIL = $_GET['C2MAIL'];
$C2PUESTO = $_GET['C2PUESTO'];
$C3NOM = $_GET['C3NOM'];
$C3MAIL = $_GET['C3MAIL'];
$C3PUESTO = $_GET['C3PUESTO'];
$descripcioemp = $_GET['descripcioemp'];
$adireccion = $_GET['adireccion'];
$aciudad = $_GET['aciudad'];
$aestado = $_GET['aestado'];
$acp = $_GET['acp'];



$consultanot='update clichat set CORREO=\'' . $nome . '\',NOMBRE=\'' . $nombre . '\', TELEFONO=\'' . $descripcion . '\',CONTRA=\'' . $contra . '\',IMMEX=\'' . $IMMEX . '\',PROSEC=\'' . $PROSEC . '\',DRAWBACK=\'' . $DRAWBACK . '\','
        . ' REGLAOCTAVA=\'' . $REGLAOCTAVA . '\',A=\'' . $A . '\',AA=\'' . $AA . '\',AAA=\'' . $AAA . '\',PADGENIMP=\'' . $PADGENIMP . '\', PADSECIMP=\'' . $PADSECIMP . '\',PADSEC3=\'' . $PADSEC3 . '\','
        . 'OEA=\'' . $OEA . '\',CTPAT=\'' . $CTPAT . '\',C1NOM=\'' . $C1NOM . '\',C2NOM=\'' . $C2NOM . '\',C3NOM=\'' . $C3NOM . '\', C1PUESTO=\'' . $C1PUESTO . '\','
        . ' C2PUESTO=\'' . $C2PUESTO . '\', C3PUESTO=\'' . $C3PUESTO . '\', C1MAIL=\'' . $C1MAIL . '\', C2MAIL=\'' . $C2MAIL . '\', C3MAIL=\'' . $C3MAIL . '\','
        . 'CIUDAD=\'' . $aciudad . '\', ESTADO=\'' . $aestado . '\',DIRECCiON=\'' . $adireccion . '\', CP=\'' . $acp . '\', DESCRIPCIOEMP=\'' . $descripcioemp . '\',RFC=\'' . $rfc . '\' where CVE_CLI=\'' . $idtalla . '\' ';
                                //echo $consultanot;
if($mysqli->query($consultanot)){
    echo 'ok';
}