<?php
include 'conexion.php';

$idcarro = $_GET['idcarro'];
$consultanot = 'update carros set fecbaja= NOW() where idcarro=\'' . $idcarro . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                              