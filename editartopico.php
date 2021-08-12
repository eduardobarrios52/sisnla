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
$area = $_GET['area'];

$descripcioemp = $_GET['descripcioemp'];




$consultanot='update topicos set idarea=\'' . $area . '\', nombre=\'' . $nombre . '\', descripcion=\'' . $descripcioemp . '\' where idtopico=\'' . $idtalla . '\' ';
                                //echo $consultanot;
if($mysqli->query($consultanot)){
    echo 'ok';
}