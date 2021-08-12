<?php

include 'conexion.php';

$nombre = $_GET['nombre'];
$apaterno = $_GET['apaterno'];
$amaterno = $_GET['amaterno'];
$area = $_GET['area'];
$nome = $_GET['nome'];
$descripcion = $_GET['descripcion'];
$contra = $_GET["contra"];
$curp = $_GET["curp"];
$rfc = $_GET["rfc"];
$nuser = $_GET["nuser"];
$originalDate = $_GET["fecing"];
$fecing = date("Y-m-d", strtotime($originalDate));
$originalDate = $_GET["fecnac"];
$fecnac = date("Y-m-d", strtotime($originalDate));
$domi = $_GET["domi"];

$telcasa = $_GET["telcasa"];
$celular = $_GET["celular"];
$alergia = $_GET["alergia"];

$zoom=$_GET["zoom"];
 $celularins=$_GET["celularins"];
 $emailins=$_GET["emailins"];
 $consultanot = 'insert into ususis(nombre,apaterno,amaterno,puesto,email,contra,fechaingreso,fechanaci,curp,rfc,domicilio,tipo,activo,area,telcasa,celular,alergia,zoom,celularins,emailins)' .
        'values(\'' . $nombre . '\',\'' . $apaterno . '\',\'' . $amaterno . '\',\'' . $nome . '\',\'' . $descripcion . '\',\'' . $contra . '\',\'' . $fecing . '\',\'' . $fecnac . '\',\'' . $curp . '\',\'' . $rfc . '\',\'' . $domi . '\',\'' . $nuser . '\',1,\'' . $area . '\',\'' . $telcasa . '\',\'' . $celular . '\',\'' . $alergia . '\',\'' . $zoom . '\',\'' . $celularins . '\',\'' . $emailins . '\' )';
//echo $consultanot;
$mysqli->query($consultanot);



/*
  $consulta = "SELECT * from admon_proc WHERE cve_cia=1 and idpadre=0 ORDER BY nombre";
  $res = odbc_exec($conexion, $consulta) or die('error ' . odbc_errormsg($conexion));
  $num = odbc_num_rows($res);
  if ($num >= 1) {

  while (odbc_fetch_row($res)) {
  ?>

  <li class="list-group-item"><span class="badge badge-orange"><a>E</a></span><span class="badge badge-red">-</span><span dataidc="<?php echo utf8_encode(odbc_result($res, "idcarpeta")); ?>" class="badge badge-green">+</span><?php echo utf8_encode(odbc_result($res, "nombre")); ?></li>


  <?php
  }
  }
 */

