<?php
include 'conexion.php';

$idempresa = $_GET['idempresa'];

$consultanot = 'update empresa set fecbaja=\'0000-00-00 00:00:00\' where idempresa=\'' . $idempresa . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               