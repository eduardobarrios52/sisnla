<?php
include 'conexion.php';

$idpuntos = $_GET['idpunto'];

$consultanot = 'update puntos set fecbaja=\'0000-00-00 00:00:00\' where idpuntos=\'' . $idpuntos . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}