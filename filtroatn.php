<?php
include 'conexion.php';
$idusrcli = $_POST['usuario'];
$contra = $_POST['contra'];
$A = 'A';
$maxprec = 0;
$sqlbc = 'SELECT * FROM ususis where email=\'' . $idusrcli . '\'';
if ($resultadocolp = $mysqli->query($sqlbc)) {
    if ($resultadocolp->num_rows == 0) {
        @header('Location: index.php?error=3');
    } else {
        while ($rescolp = $resultadocolp->fetch_assoc()) {
            if ($rescolp['contra'] == $contra) {
                @session_start();
                $_SESSION[access] = true;
                $_SESSION["id"] = $rescolp['idusuarios'];
                $_SESSION["tipo"] = $rescolp['tipo'];
                $_SESSION["area"] = $rescolp['area'];
                if ($rescolp['nombre'] == '') {
                    $_SESSION["nombre"] = $rescolp['email'];
                } else {
                    $_SESSION["nombre"] = $rescolp['nombre'];
                }
                @header('Location: iniatn.php');
            }else{
                @header('Location: index.php?error=2');
            }
        }
    }
}

