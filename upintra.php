<?php

include 'conexion.php';


if (isset($_FILES["myfile"])) {
    $ret = array();
//	This is for custom errors;
    /* 	$custom_error= array();
      $custom_error['jquery-upload-file-error']="File already exists";
      echo json_encode($custom_error);
      die();
     */
    $error = $_FILES["myfile"]["error"];
    //You need to handle  both cases
    //If Any browser does not support serializing of multiple files using FormData()
    if (!is_array($_FILES["myfile"]["name"])) { //single file
        //$fileName = $_FILES["myfile"]["name"];
        //move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
        ////////////////////////////////////
        $titulo = $_POST['nombre'];
        $idcli = $_POST['idcli'];
        $tipoarc=$_POST['tipoarc'];
        $consultamax = 'select IFNULL(MAX(idarchivoscli), 0)+1 as NUM from archivoscli ';
        
//$resmax = odbc_exec($conexion, $consultamax);
        $resmax = $mysqli->query($consultamax);
//while (odbc_fetch_row($resmax)) {
        while ($rs = $resmax->fetch_assoc()) {
            // $maximo = odbc_result($resmax, "NUM");
            $maximo = $rs['NUM'];
            if ($maximo >= 1) {
                $maximocons = $maximo;
            } else {
                $maximocons = 1;
            }
        }
        $tipo = 'A';

        $status = 'A';
        $file_name = $_FILES['myfile']['name'];
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_type = $_FILES['myfile']['type'];
        $ruta = $maximocons . '.' . strtolower(verificaext($file_name));
        $ruta1 = "doccli/" . $ruta;
        // echo $ruta;

        if (move_uploaded_file($file_tmp, $ruta1)) {
            $save = umask(0);
            //@chmod("/imagenesp/", 0777);
            @chmod($ruta, 0777);
            umask($save);
            $consultanot = 'insert into archivoscli(nombre,ruta,fecha,estatus,idcli,contrato)' .
                    'values(\'' . $titulo . '\',\'' . $ruta . '\',now(),\'' . $status . '\',\'' . $idcli . '\',\'' . $tipoarc . '\')';
//echo $consultanot;
            //odbc_exec($conexion, $consultanot) or die('error ' . odbc_errormsg($conexion));
            $mysqli->query($consultanot);
        }

        ///////////////////////////////////




        $ret[] = $fileName;
    }
    /* else  //Multiple files, file[]
      {
      $fileCount = count($_FILES["myfile"]["name"]);
      for($i=0; $i < $fileCount; $i++)
      {
      $fileName = $_FILES["myfile"]["name"][$i];
      move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
      $ret[]= $fileName;
      }

      } */
    echo json_encode($ret);
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