<?php



//$mysqli = new mysqli("localhost", "mxclicom_help", "medicenel24", "mxclicom_chat");

$mysqli = new mysqli("localhost", "root", "", "mxclicom_chat");

//$mysqli = new mysqli("localhost", "calzad13_llalosc", "85Weblalo", "calzad13_sivpi");

$mysqli->set_charset("utf8");



/* check connection */

if (mysqli_connect_errno()) {

    printf("Error de conexión: \n");

    exit();

}

