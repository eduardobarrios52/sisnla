<?php
include 'conexion.php';

$idremolque = $_GET['idremolque'];
$consultanot = 'update remolques set fecbaja= \'0000-00-00 00:00:00\' where idremolques=\'' . $idremolque . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                        