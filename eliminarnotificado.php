<?php
include 'conexion.php';

$idpropietario = $_GET['idnotificado'];
$consultanot = 'update notificado set fecbaja= NOW() where idnotificado=\'' . $idnotificado . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        