<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';

$consultanot = 'update noticiasweb set estatus=0 where idnoticia=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     