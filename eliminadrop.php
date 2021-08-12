<?php

$idtalla = $_GET['idtalla'];
$B='B';
include 'conexion.php';

$consultanot = 'update  archivosdrop set estatus=\'' . $B . '\' where idarchivosdrop=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     