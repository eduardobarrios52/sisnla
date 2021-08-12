<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';

$consultanot = 'update  topicos set activo=1 where idtopico=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     