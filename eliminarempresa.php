<?php
include 'conexion.php';

$idempresa = $_GET['idempresa'];
$consultanot = 'update empresa set fecbaja= NOW() where idempresa=\'' . $idempresa . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
              