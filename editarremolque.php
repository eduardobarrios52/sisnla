<?php
include 'conexion.php';
$idremolque = $_POST['idremolque'];
$economico = $_POST['economico'];
$SubTipRem = $_POST['SubTipRem'];
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];

$consultanot='update area set economico=\'' . $economico . '\', SubTipRem=\'' . $SubTipRem . '\', placa=\'' . $placa . '\', marca=\'' . $marca . '\', modelo=\'' . $modelo . '\' where idremolque=\'' . $idremolque . '\' ';
if($mysqli->query($consultanot)){
    echo 'ok';
}
?>