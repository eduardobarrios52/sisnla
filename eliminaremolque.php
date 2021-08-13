<?php

$idremolque = $_POST['idremolque'];
include 'conexion.php';

$consultanot = 'update  remolque set fecbaja= CURDATE() where idremolques=\'' . $idremolque . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     