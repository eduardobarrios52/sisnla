<?php
include 'conexion.php';

$idcarro = $_GET['idcarro'];
$consultanot = 'update carros set fecbaja= NOW() where idcarros=\'' . $idcarro . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                              