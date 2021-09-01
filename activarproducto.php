<?php
include 'conexion.php';

$idproducto = $_GET['idproducto'];

$consultanot = 'update productos set estatus=\'1\' where idproducto=\'' . $idproducto . '\'';
//echo $consultanot;
if ($mysqli->query($consultanot)) {
    echo 'ok';
}
                               