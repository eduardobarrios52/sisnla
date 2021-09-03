<?php
include 'conexion.php';

$idoperador = $_GET['idoperador'];

$consultanot = 'update operadores set fecbaja=\'0000-00-00 00:00:00\' where idoperadores=\'' . $idoperador . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               