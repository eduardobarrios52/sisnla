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

$descripcioemp = $_GET['descripcioemp'];




$consultanot='update area set nombre=\'' . $nombre . '\', descripcion=\'' . $descripcioemp . '\' where idarea=\'' . $idtalla . '\' ';
                                //echo $consultanot;
if($mysqli->query($consultanot)){
    echo 'ok';
}