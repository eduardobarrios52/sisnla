<?php
include 'conexion.php';

$idcarro = $_GET['idcarro'];

$consultanot = 'update carros set activo=\'0000-00-00 00:00:00\' where idcarros=\'' . $idcarro . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                       