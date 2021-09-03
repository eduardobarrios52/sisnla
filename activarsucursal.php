<?php
include 'conexion.php';

$idsucursal = $_GET['idsucursal'];

$consultanot = 'update sucursal set fecbaja=\'0000-00-00 00:00:00\' where idsucursal=\'' . $idsucursal . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               