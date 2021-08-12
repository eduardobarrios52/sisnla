<table style=" display: block; overflow-x: auto; white-space: nowrap;" class="table table-datatable table-custom  table-hover" id="basicDataTable">
                                            <thead>
                                                <tr >
                                                    <th>NOMBRE</th>
                                                    <th>A. PATERNO</th>
                                                    <th>A. MATERNO</th>
                                                     <th>PUESTO</th>
                                                    <th>EMAIL</th>
                                                    <th>CONTRASEÑA</th>
                                                    <th>FECHA INGRESO</th>
                                                    <th>FECHA DE NACIMIENTO</th>
                                                    <th>CURP</th>
                                                    <th>RFC</th>
                                                    <th>AREA</th>
                                                    <th>DOMICILIO</th>
                                                    <th>TIPO</th>
                                                    <th>EDITAR</th>
                                                    <th>ELIMINAR</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'conexion.php';

                                                $consulta = "SELECT * FROM ususis ORDER BY nombre";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td id="tdnom<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['nombre']; ?></td>
                                                            <td id="tdnom<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['apaterno']; ?></td>
                                                            <td id="tdnom<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['amaterno']; ?></td>
                                                            <td id="tdnome<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['puesto']; ?></td>
                                                            <td id="tddesc<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['email']; ?></td>
                                                            <td id="tdcontra<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['contra']; ?></td>
                                                            <td id="tdfecing<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['fechaingreso']; ?></td>
                                                            <td id="tdfecnac<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['fechanaci']; ?></td>
                                                            <td id="tdcurp<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['curp']; ?></td>
                                                            <td id="tdrfc<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['rfc']; ?></td>
                                                            <td id="tdarea<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['area']; ?></td>
                                                            <td id="tddomi<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['domicilio']; ?></td>
                                                            <td id="tdtipo<?php echo utf8_encode($rs['idusuarios']); ?>"><?php if($rs['tipo']=='1'){echo 'ADMINISTRADOR';}else if($rs['tipo']=='2'){echo 'JEFE DE AREA';} else if($rs['tipo']=='3'){echo 'SUBORDINADO';}  ?></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn edittitle btn-warning margin-bottom-20">Editar Usuario</button></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn elimmarca btn-danger margin-bottom-20">Eliminar Usuario</button></td>
                                                        </tr> 
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

<script src="jsusu.js"></script>