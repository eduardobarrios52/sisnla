<?php

$alfnum = "/^[a-z.&A-Z0-9ñÑ_@\-. ,?!¡¿]{1,254}$/";
$passwordexp = "/^[a-z.A-Z0-9]{1,25}$/";
$c = 0;
include 'scapestr.php';
include 'conexion.php';

if ( preg_match($alfnum, $_GET["cve_ses"])) {
    $msj = strReplaceAssoc($replace,substr($_GET["msj"], 0, 253)); 
    $cve_ses = $_GET["cve_ses"];
       session_start();
    $id = $_SESSION["id"];
       $ip = $_SERVER['REMOTE_ADDR'];
        $consulta1 = 'select cve_cli from sesiones where cve_ses=\'' . $cve_ses . '\'';
            $res1 =  $mysqli->query($consulta1);
               while ($rs = $res1->fetch_assoc()) {
                $receptor=$rs['cve_cli'];
                //echo $receptor;
            }
       $consulta = 'insert into msjchat(emisor,receptor,mensaje,fecha,dir_ip,tip_usu,cve_ses,cve_cia,visto) 
        values(\'' . $id . '\',\'' . $receptor . '\',\'' . $msj . '\',now(),\'' . $ip . '\',2,\'' . $cve_ses . '\',1,0)';
    //echo $consulta;
    $mysqli->query($consulta);
    echo '<blockquote class="filled withoutHeader">
<p><img style="width: 32px;" class="pull-left" src="assets/images/serv.png">'.$msj.'</p>
    <span class="help-block text-left">'.date("Y-m-d H:i:s").'</span>
   </blockquote>';
} else {
    echo '2';
}
