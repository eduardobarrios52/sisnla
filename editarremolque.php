<?php
include 'conexion.php';
$idremolque = $_GET['idremolque'];
$economico = $_GET['economico'];
$SubTipRem = $_GET['SubTipoRem'];
$placa = $_GET['placa'];
$marca = $_GET['marca'];
$modelo = $_GET['modelo'];

$consultanot='update remolques set economico=\'' . $economico . '\', SubTipoRem=\'' . $SubTipRem . '\', Placa=\'' . $placa . '\', marca=\'' . $marca . '\', modelo=\'' . $modelo . '\' where idremolques=\'' . $idremolque . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>