<?php
include 'conexion.php';

$idsucursal = $_GET['idsucursal'];
$consultanot = 'update sucursal set fecbaja= NOW() where idsucursal=\'' . $idsucursal . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
              