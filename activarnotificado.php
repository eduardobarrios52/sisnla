<?php
include 'conexion.php';

$idtalla = $_GET['idnotificado'];

$consultanot = 'update notificado set fecbaja=\'0000-00-00 00:00:00\' where idnotificado=\'' . $idnotificado . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               