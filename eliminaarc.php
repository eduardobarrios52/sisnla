<?php

$idtalla = $_GET['idtalla'];
$B='B';
include 'conexion.php';

$consultanot = 'update  archivoscli set estatus=\'' . $B . '\' where idarchivoscli=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     