<?php
include 'conexion.php';

$idpuntos = $_GET['idpunto'];
$consultanot = 'update puntos set fecbaja= NOW() where idpuntos=\'' . $idpuntos . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
              