<?php
include 'conexion.php';

$idtalla = $_GET['idpropietario'];

$consultanot = 'update propietario set fecbaja=\'0000-00-00 00:00:00\' where idpropietario=\'' . $idpropietario . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               