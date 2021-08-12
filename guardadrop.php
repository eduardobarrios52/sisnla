<?php

include 'conexion.php';


        $titulo = $_POST['nombre'];
        $idcli = $_POST['idcli'];
        $url = $_POST['url'];
        $tipoarc="0";
        
        $status = 'A';
            $consultanot = 'insert into archivosdrop(nombre,ruta,fecha,estatus,idcli,contrato)' .
                    'values(\'' . $titulo . '\',\'' . $url . '\',now(),\'' . $status . '\',\'' . $idcli . '\',\'' . $tipoarc . '\')';
//echo $consultanot;
            //odbc_exec($conexion, $consultanot) or die('error ' . odbc_errormsg($conexion));
            if($mysqli->query($consultanot)){
                 echo "ok";
            }
        

   
    







/*

  foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
  $titulo = $_POST['nombre'];
  $idpadre = $_POST['idpadre'];
  $consultamax = 'select max(idcarpeta)+1 as NUM from admon_proc ';
  $resmax = odbc_exec($conexion, $consultamax);
  while (odbc_fetch_row($resmax)) {
  $maximo = odbc_result($resmax, "NUM");
  if ($maximo >= 1) {
  $maximocons = $maximo;
  } else {
  $maximocons = 1;
  }
  }
  $tipo = 'A';
  $ruta = '';
  $status = '';
  $file_name = $key . $_FILES['imagen']['name'][$key];
  $file_size = $_FILES['imagen']['size'][$key];
  $file_tmp = $_FILES['imagen']['tmp_name'][$key];
  $file_type = $_FILES['imagen']['type'][$key];
  $ruta = $maximocons . '.' . strtolower(verificaext($file_name));
  $ruta1 = "imagenesp/" . $ruta;
  // echo $ruta;
  $stat = 'A';
  if (move_uploaded_file($file_tmp, $ruta1)) {
  $save = umask(0);
  //@chmod("/imagenesp/", 0777);
  @chmod($ruta, 0777);
  umask($save);
  $consultanot = 'insert into admon_proc(cve_cia,cve_ofi,idcarpeta,nombre,idpadre,tipo,ruta,fecha,cve_usr,status)' .
  'values(1,0,\'' . $maximocons . '\',\'' . $titulo . '\',\'' . $idpadre . '\',\'' . $tipo . '\',\'' . $ruta . '\',CURRENT TIMESTAMP,0,\'' . $status . '\')';
  //echo $consultanot;
  odbc_exec($conexion, $consultanot) or die('error ' . odbc_errormsg($conexion));
  }
  } */

function verificaext($nombre) {
    $path_parts = pathinfo($nombre);
    $extension = $path_parts['extension'];
    return $extension;
}


?>