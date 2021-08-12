<?php

include 'conexion.php';

$nombre = $_GET['nombre'];
//$ = $_GET[''];
$rfc = $_GET['rfc'];

$nome = $_GET['nome'];
$descripcion=$_GET['descripcion'];
$contra = $_GET["contra"];
$IMMEX = $_GET['IMMEX'];
$PROSEC = $_GET['PROSEC'];
$DRAWBACK = $_GET['DRAWBACK'];
$REGLAOCTAVA = $_GET['REGLAOCTAVA'];
$A = $_GET['A'];
$AA = $_GET['AA'];
$AAA = $_GET['AAA'];
$PADGENIMP = $_GET['PADGENIMP'];
$PADSECIMP = $_GET['PADSECIMP'];
$PADSEC3 = $_GET['PADSEC3'];
$OEA = $_GET['OEA'];
$CTPAT = $_GET['CTPAT'];
$C1NOM = $_GET['C1NOM'];
$C1MAIL = $_GET['C1MAIL'];
$C1PUESTO = $_GET['C1PUESTO'];
$C2NOM = $_GET['C2NOM'];
$C2MAIL = $_GET['C2MAIL'];
$C2PUESTO = $_GET['C2PUESTO'];
$C3NOM = $_GET['C3NOM'];
$C3MAIL = $_GET['C3MAIL'];
$C3PUESTO = $_GET['C3PUESTO'];
$descripcioemp = $_GET['descripcioemp'];
$adireccion = $_GET['adireccion'];
$aciudad = $_GET['aciudad'];
$aestado = $_GET['aestado'];
$acp = $_GET['acp'];



$consultanot='insert into clichat(CORREO,NOMBRE, TELEFONO,CONTRA,IMMEX,PROSEC,DRAWBACK, REGLAOCTAVA,A,AA,AAA,PADGENIMP, PADSECIMP,'
        . 'PADSEC3,OEA,CTPAT,C1NOM,C2NOM,C3NOM, C1PUESTO, C2PUESTO, C3PUESTO, C1MAIL, C2MAIL, C3MAIL,CIUDAD, ESTADO,DIRECCiON, CP, DESCRIPCIOEMP,RFC)'.
'values(\'' . $nome . '\',\'' . $nombre . '\',\'' . $descripcion . '\',\'' . $contra . '\',\'' . $IMMEX . '\',\'' . $PROSEC . '\',\'' . $DRAWBACK . '\',\'' . $REGLAOCTAVA . '\',\'' . $A . '\',\'' . $AA . '\',\'' . $AAA . '\',\'' . $PADGENIMP . '\','
        . '\'' . $PADSECIMP . '\',\'' . $PADSEC3 . '\',\'' . $OEA . '\',\'' . $CTPAT . '\',\'' . $C1NOM . '\',\'' . $C2NOM . '\',\'' . $C3NOM . '\',\'' . $C1PUESTO . '\',\'' . $C2PUESTO . '\',\'' . $C3PUESTO . '\','
        . '\'' . $C1MAIL . '\',\'' . $C2MAIL . '\',\'' . $C3MAIL . '\',\'' . $aciudad . '\',\'' . $aestado . '\',\'' . $adireccion . '\',\'' . $acp . '\',\'' . $descripcioemp . '\',\'' . $rfc . '\')';
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

