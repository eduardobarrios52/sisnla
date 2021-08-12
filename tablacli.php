<table style=" display: block; overflow-x: auto; white-space: nowrap;"  class="table table-datatable table-custom  table-hover" id="basicDataTable">
                                            <thead>
                                                <tr >
                                                    <th>ACTIVO</th>
                                                    <th>NOMBRE</th>
                                                    <th>RFC</th>
                                                    <th>CORREO</th>
                                                    <th>TELEFONO</th>
                                                    <th>CONTRASEÑA</th>
                                                    <th>EDITAR</th>
                                                    <th>ELIMINAR</th>
                                                    <th>AGREGAR ARCHIVOS</th>
                                                    <th>ARCHIVOS DEL CLIENTE</th>
                                                    <th>IMMEX</th>
                                                    <th>PROSEC</th>
                                                    <th>DRAWBACK</th>
                                                    <th>REGLAOCTAVA</th>
                                                    <th>A</th>
                                                    <th>AA</th>
                                                    <th>AAA</th>
                                                    <th>PADGENIMP</th>
                                                    <th>PADSECIMP</th>
                                                    <th>PADSEC3</th>
                                                    <th>OEA</th>
                                                    <th>CTPAT</th>
                                                    <th>C1NOM</th>
                                                    <th>C1PUESTO</th>
                                                    <th>C1MAIL</th>
                                                    <th>C2NOM</th>
                                                    <th>C2PUESTO</th>
                                                    <th>C2MAIL</th>
                                                    <th>C3NOM</th>
                                                    <th>C3PUESTO</th>
                                                    <th>C3MAIL</th>
                                                    <th>CIUDAD</th>
                                                    <th>ESTADO</th>
                                                    <th>DIRECCiON</th>
                                                    <th>CP</th>
                                                    <th>DESCRIPCIOEMP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'conexion.php';

                                                $consulta = "SELECT * FROM clichat ORDER BY ACTIVO desc, nombre";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                
                                                        <tr class="odd gradeX">
                                                            
                                                             <td id="ACTIVO<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['ACTIVO'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="tdnom<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['NOMBRE']; ?></td>
                                                            <td id="tdrfc<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['RFC']; ?></td>
                                                            <td id="tdnome<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['CORREO']; ?></td>
                                                            <td id="tddesc<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['TELEFONO']; ?></td>
                                                            <td id="tdcontra<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['CONTRA']; ?></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['CVE_CLI']); ?>" type="button" class="btn edittitle btn-warning margin-bottom-20">Editar Cliente</button></td>
                                                           <?php if ($rs['ACTIVO'] == 1) {
                                                                ?>
                                                               <td><button dataidc="<?php echo utf8_encode($rs['CVE_CLI']); ?>" type="button" class="btn elimmarca btn-danger margin-bottom-20">Desactivar Cliente</button></td>
                                                              
                                                            <?php 
                                                           }else{
                                                                ?>
                                                               <td><button dataidc="<?php echo utf8_encode($rs['CVE_CLI']); ?>" type="button" class="btn acivarmarca btn-green margin-bottom-20">Activar   Cliente</button></td>
                                                              
                                                            <?php
                                                           }
                                                             ?>
                                                            
                                                            <td><button dataidc="<?php echo utf8_encode($rs['CVE_CLI']); ?>" type="button" class="btn agregaarc btn-success margin-bottom-20">Agregar archivos</button></td>
<td class="text-center ">
                                                                                                                                                                <a href="#m<?php echo utf8_encode($rs['CVE_CLI']); ?>" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-search"></i></a>
                                                                                <div class="modal fade" id="m<?php echo utf8_encode($rs['CVE_CLI']); ?>" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true" style="display: none;">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                                                                <h3 class="modal-title" id="modalDialogLabel"><strong>Vista Rapida</strong> de Archivos</h3>
                                                                                                <section class="tile">
                                                                                                    <!-- tile header -->
                                                                                                    <div class="tile-header">
                                                                                                        <h3>Documentos del cliente <strong><?php echo $rs['NOMBRE']; ?></strong> </h3>
                                                                                                        <div class="controls">
                                                                                                            <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                                                                                                            <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- /tile header -->
                                                                                                    <!-- tile body -->
                                                                                                    <div class="tile-body nopadding">
                                                                                                        <table class="table table-hover">
                                                                                                            <tbody style="color: #000">
                                                                                                                <?php
                                                                                                                $A='A';
                                                                                                                $consultaar = 'SELECT * FROM archivoscli where idcli=\'' . $rs['CVE_CLI'] . '\' and estatus=\'' . $A . '\'  order by fecha';
                                                                                                                
                                                                                                                
                                                                                                                $resar = $mysqli->query($consultaar);
                                                $numar = $resar->num_rows;
                                                if ($numar >= 1) {
                                                    
                                                     while ($rsar = $resar->fetch_assoc()) {
                                                         
                                                         echo '<tr id="tr'.$rsar['idarchivoscli'].'">';
                                                         echo ' <td>'.$rsar['nombre'].'</td>';
                                                         echo ' <td><a href="doccli/'.$rsar['ruta'].'" target="_blank" role="button" class="btn btn-info" >Ver archivo</a></td>';
                                                          echo ' <td><button  dataidc="'.$rsar['idarchivoscli'].'" target="_blank" role="button" class="btn btn-red" onclick="borrararc('.$rsar['idarchivoscli'].')" >Borrar archivo</button> </td>';
                                                         echo '</tr>';
                                                         
                                                     }
                                                    
                                                    
                                                }else{    echo '<tr>
                                                                                                                    <td>0 Archivos Encontrados</td>
                                                                                                                    

                                                                                                                </tr>';}
                                                                                                                
                                                                                                                
                                                                                                                
                                                                                                                
                                                                                                                ?>
                                                                                                                
                                                                                                                
                                                                                                               

                                                                                                            </tbody>
                                                                                                        </table>

                                                                                                    </div>
                                                                                                    <!-- /tile body -->
                                                                                                </section>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <p></p>
                                                                                            </div>
                                                                                        </div><!-- /.modal-content -->
                                                                                    </div><!-- /.modal-dialog -->
                                                                                </div><!-- /.modal -->
                                                                            </td>
                                                            <td id="IMMEX<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['IMMEX'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="PROSEC<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['PROSEC'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="DRAWBACK<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['DRAWBACK'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="REGLAOCTAVA<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['REGLAOCTAVA'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="A<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['A'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="AA<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['AA'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="AAA<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['AAA'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="PADGENIMP<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['PADGENIMP'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="PADSECIMP<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['PADSECIMP'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="PADSEC3<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['PADSEC3'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="OEA<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['OEA'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="CTPAT<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php
                                                                if ($rs['CTPAT'] == 1) {
                                                                    echo '<span class="badge badge-greensea">OK</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-red">NO</span>';
                                                                }
                                                                ?></td>
                                                            <td id="C1NOM<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C1NOM']; ?></td>
                                                            <td id="C1PUESTO<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C1PUESTO']; ?></td>
                                                            <td id="C1MAIL<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C1MAIL']; ?></td>
                                                            <td id="C2NOM<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C2NOM']; ?></td>
                                                            <td id="C2PUESTO<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C2PUESTO']; ?></td>
                                                            <td id="C2MAIL<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C2MAIL']; ?></td>
                                                            <td id="C3NOM<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C3NOM']; ?></td>
                                                            <td id="C3PUESTO<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C3PUESTO']; ?></td>
                                                            <td id="C3MAIL<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['C3MAIL']; ?></td>
                                                            <td id="CIUDAD<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['CIUDAD']; ?></td>
                                                            <td id="ESTADO<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['ESTADO']; ?></td>
                                                            <td id="DIRECCiON<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['DIRECCiON']; ?></td>
                                                            <td id="CP<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['CP']; ?></td>
                                                            <td id="DESCRIPCIOEMP<?php echo utf8_encode($rs['CVE_CLI']); ?>"><?php echo $rs['DESCRIPCIOEMP']; ?></td>

                                                        </tr> 
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
<script src="jscli.js"></script>