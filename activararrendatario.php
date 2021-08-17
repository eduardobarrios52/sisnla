<?php
include 'conexion.php';

$idarrendatario = $_GET['idarrendatario'];

$consultanot = 'update arrendatario set activo=\'0000-00-00 00:00:00\' where idarrendatario=\'' . $idarrendatario . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               