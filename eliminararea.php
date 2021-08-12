<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';

$consultanot = 'update  area set activo=0 where idarea=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     