<?php
include 'conexion.php';

$idoperador = $_GET['idoperador'];
$consultanot = 'update operadores set fecbaja= NOW() where idoperadores=\'' . $idoperador . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
              