<?php
include 'conexion.php';

$idremolque = $_GET['idremolque'];
$consultanot = 'update remolques set fecbaja= NOW() where idremolques=\'' . $idremolque . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     