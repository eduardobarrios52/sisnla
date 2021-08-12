<?php

include 'conexion.php';

$nombre = $_GET['nombre'];

$descripcioemp = $_GET['descripcioemp'];




$consultanot='insert into area(nombre,descripcion,activo)'.
'values(\'' . $nombre . '\',\'' . $descripcioemp . '\',1)';
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

