<?php
include 'conexion.php';

$idpropietario = $_GET['idpropietario'];
$consultanot = 'update propietario set fecbaja= NOW() where idpropietario=\'' . $idpropietario . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        