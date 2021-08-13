<?php

include 'conexion.php';

$economico = $_GET['economico'];
$SubTipRem = $_GET['SubTipoRem'];
$placa = $_GET['placa'];
$marca = $_GET['marca'];
$modelo = $_GET['modelo'];

$consultanot='insert into remolques(economico,SubTipoRem,placa,marca,modelo,fecreg)'.
'values(\'' . $economico . '\',\'' . $SubTipRem . '\',\'' . $placa . '\',\'' . $marca . '\',\'' . $modelo . '\', CURDATE())';
                                
$mysqli->query($consultanot);
                        


