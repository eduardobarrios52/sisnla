<?php

$idtalla = $_GET['idtalla'];
include 'conexion.php';

$consultanot = 'update  clichat set activo=0 where CVE_CLI=\'' . $idtalla . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        
                        
                     