<?php
if (isset($_GET['cve_ses'])) {
    $sesion = $_GET['cve_ses'];
    $a = 'A';
    include 'conexion.php';
   
    //$consulta3 = 'select s.cve_cli,c.correo,c.nombre,c.telefono,s.cve_ses,s.fecha  from sesiones s inner join clichat c on s.cve_cli=c.cve_cli where s.cve_atn is null and s.status=\'' . $a . '\' and s.cve_cia=1 order by s.fecha asc';
    $consulta3 = 'select s.cve_cli,c.correo,c.nombre,c.telefono,s.cve_ses,s.fecha,s.descripcion,s.archivo  from sesiones s inner join clichat c on s.cve_cli=c.cve_cli where s.cve_ses =\'' . $sesion . '\' and s.estatus=\'' . $a . '\' and s.cve_cia=1 order by s.fecha asc ';
    $res = $mysqli->query($consulta3);
    while ($rs = $res->fetch_assoc()) {
        $nombre = $rs['nombre'];
        $correo = $rs['correo'];
        $telefono = $rs['telefono'];
        $desc = $rs['descripcion'];
        $archivo = $rs['archivo'];
    }
    if(strlen($archivo)>1){
        $archivo='../../clientes/archivoscli/'.$archivo;
        //$archivo='../../clientesmxcli/archivoscli/'.$archivo;
    }else{
        $archivo='#';
    }
    
    
    ?>
<script>
nombrec='<?php echo $nombre ?>';
 correoc='<?php echo $correo ?>';
 telc='<?php echo $telefono ?>';
 categot='<?php echo $desc ?>';
 archivo='<?php echo $archivo ?>';
</script>
   

                <?php
                $consulta = 'select fecha, mensaje, tip_usu,cve_msj,archivo  from msjchat where cve_ses=\'' . $sesion . '\'  and cve_cia=1';
                $res = $mysqli->query($consulta);
                while ($rs = $res->fetch_assoc()) {

                    if ($rs['tip_usu'] == 1) {
                        if($rs['archivo']==0){
                            
                        ?>
                        <blockquote class="filled withoutHeader">
                            <p><img style="width: 32px;" class="pull-right" src="assets/images/cli.png"> <?php echo utf8_encode($rs['mensaje']) ?></p>
                            <span class="help-block"><?php echo utf8_encode($rs['fecha']) ?></span>
                        </blockquote>
                        <?php
                        }else{
                            
                            echo '<blockquote class="filled withoutHeader">
<p><a class="btn btn-info margin-bottom-20 pull-right" href="doctickets/' . $rs['mensaje'] . '" target="_blank">Ver Archivo</a></p>
   </blockquote>';
                            
                        }
                        
                        
                        
                           $consulta2 = 'update msjchat set visto =1 where cve_msj=\'' . $rs['cve_msj']. '\'';
    $res2 = $mysqli->query($consulta2);
                    } else if ($rs['tip_usu']== 2) {
                        
                        if($rs['archivo']==0){
                        
                        ?>



                        <blockquote class="filled withoutHeader">
                            <p>
                                <img style="width: 32px;" class="pull-left" src="assets/images/serv.png"> <?php echo utf8_encode($rs['mensaje']) ?>
                            </p>
                            <span class="help-block"><?php echo utf8_encode($rs['fecha']) ?></span>
                        </blockquote>
                        <?php
                        }else{
                            
                            echo '<blockquote class="filled withoutHeader">
<p><a class="btn btn-info margin-bottom-20 pull-left" href="doctickets/' . $rs['mensaje'] . '" target="_blank">Ver Archivo</a></p>';
                            echo'<br><span class="help-block text-left">'.$rs['fecha'].'</span>';
                                    
   echo '</blockquote>';
                            
                        }
                        
                        
                       
                    }

                   
                }
                ?>
               

    <?php
}
?>