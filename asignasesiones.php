<?php

@session_start();
include 'conexion.php';

$idatn = $_SESSION["id"];
$a = 'A';
//sesiones de usuario

    

    $strli="";
    $consulta3 = 'select s.cve_cli,c.correo,c.nombre,c.telefono,s.cve_ses,s.fecha  from sesiones s inner join clichat c on s.cve_cli=c.cve_cli where cve_atn=\'' . $idatn . '\'  and   s.estatus=\'' . $a . '\' and s.cve_cia=1 order by s.fecha asc';
    $contador = 1;
    //echo $consulta3;
    
    
     if ($resultadocolp = $mysqli->query($consulta3)) {
    if ($resultadocolp->num_rows == 0) {
        
    } else {
        while ($rs = $resultadocolp->fetch_assoc()) {
                                                    if ($contador <= 15) {
                                                        $strli = $strli . '<li id="' . trim($rs['cve_ses']) . '" class="msg">
                    
                    <a href="#" class="mail-favourite"><i class="fa fa-envelope-o"></i></a>
                    <div>
                    <h5><strong><i class="fa fa-ticket "></i></strong> ' . $rs['cve_ses'] . ' </h5>
                      <h5><strong><i class="fa fa-user"></i></strong> ' . $rs['nombre'] . ' </h5>
                      <p>' . $rs['descripcion'] . '<strong>' . $rs['correo'] . '</strong> <i class="fa fa-phone"></i> ' . $rs['telefono'] . '</p>
                      <span class="delivery-time">' . date('d-m-Y H:i:s', strtotime($rs['fecha'])) . '</span>
                          <span id="nl' . trim($rs['cve_ses']) . '"  class="badge badge-red parpadea"></span>
                      
                      <div class="mail-label bg-red parpadea"></div>
                      <div class="mail-actions">
                      
                      
                      </div>
                    </div>
                  </li>';

                                                        $contador++;
                                                    }
                                                
            
            
        }
    }
}
////////////////////
    
    
    
    
    
    
    $parte1='<ul class="inbox" id="mail-inbox"><li class="heading"><h1>Inbox <br></h1></li>';
    $partefinal='</ul>';
    
    echo $strli;



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

