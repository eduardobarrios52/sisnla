<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';

$consultanot = 'update  ususis set activo=1 where idusuarios=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     