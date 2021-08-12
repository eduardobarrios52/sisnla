<?php
$alfnum = "/^[a-z.&A-Z0-9ñÑ_@\-. ]{1,254}$/";
$passwordexp = "/^[a-z.A-Z0-9]{1,25}$/";
$c = 0;
session_start();
if (isset($_GET['cve_ses'])) {
    $sid = $_GET['cve_ses'];
    include 'conexion.php';
    
    $consulta = 'select fecha, mensaje, tip_usu,cve_msj from msjchat where cve_ses=\'' . $sid . '\' and tip_usu=1 and visto=0';
    
     $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                         ?>
            <blockquote class="filled withoutHeader">
                <p><img style="width: 32px;" class="pull-right" src="assets/images/cli.png"> <?php echo utf8_encode($rs['mensaje']) ?></p>
                <span class="help-block"><?php echo utf8_encode($rs['fecha']) ?></span>
            </blockquote>
            <?php
                                                }
                                                
                                                    }
    
   
}   