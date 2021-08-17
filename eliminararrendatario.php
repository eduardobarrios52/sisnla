<?php
include 'conexion.php';

$idarrendatario = $_GET['idarrendatario'];
$consultanot = 'update arrendatario set fecbaja= NOW() where idarrendatario=\'' . $idarrendatario . '\'';

if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                                
                        