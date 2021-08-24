<?php
@session_start();
if ($_SESSION['access'] == true) {
    $idatn = $_SESSION["id"];

    set_time_limit(0);
    if (isset($_COOKIE['back'])) {
        $alfnum = "/^[a-z.&A-Z0-9-]{1,25}$/";

        if (preg_match($alfnum, $_COOKIE['back'])) {
            $background = $_COOKIE['back'];
        }
    } else {
        $background = 'bg-1';
    }
    include 'conexion.php';
    //conectar();
    //mysql_query("SET CHARACTER SET utf8");
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CLI &#8211; Consorcio Logistico Integral</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />

        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <!-- Bootstrap -->
        <link href="assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/vendor/animate/animate.css">
        <link type="text/css" rel="stylesheet" media="all" href="assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
        <link rel="stylesheet" href="assets/js/vendor/videobackground/css/jquery.videobackground.css">
        <link rel="stylesheet" href="assets/css/vendor/bootstrap-checkbox.css">

        <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen.min.css">
        <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen-bootstrap.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/ColVis.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/TableTools.css">

        <link rel="stylesheet" href="assets/css/uploadfile.css">
        <link href="assets/css/minimal.css" rel="stylesheet">

        <style>
            button.btn.add::before {
                font-family: fontAwesome;
                content: "\f067\00a0";
            }

            button.btn.edittitle::before {
                font-family: fontAwesome;
                content: "\f035\00a0";
            }
            button.btn.editimage::before {
                font-family: fontAwesome;
                content: "\f03e\00a0";
            }
            button.btn.save::before {
                font-family: fontAwesome;
                content: "\f00c\00a0";
            }

            button.btn.cancel::before {
                font-family: fontAwesome;
                content: "\f00d\00a0";
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class=" <?php echo $background; ?> ">

        <!-- Preloader -->
        <div class="mask"><div id="loader"></div></div>
        <!--/Preloader -->

        <!-- Wrap all page content here -->
        <div id="wrap">




            <!-- Make page fluid -->
            <div class="row">





                <!-- Fixed navbar -->
                <?php
                include 'menuatn.php';
                ?>
                <!-- Fixed navbar end -->

                <!-- Page content -->
                <div id="content" class="col-md-12">
                    <!-- page header -->
                    <div class="pageheader">
                        <h2><i class="fa fa-user" style="line-height: 48px;padding-left: 0;"></i> Operadores </h2>
                    </div>
                    <!-- /page header -->
                    <!-- content main container -->
                    <div class="main">
                        <!-- row -->
                        <div class="row">
                            <!-- col 12 -->
                            <div class="col-md-12">
                                <!-- tile -->
                                <section class="tile transparent">
                                    <!-- tile header -->
                                    <!-- /tile header -->
                                    
                                    <div class="modal fade" id="agregararchivo" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Subir </strong>Imagen</h3>
                                        </div>
                                        <div class="modal-body">



                                            <div class="form-group">

                                                <div id="fotoimg">Upload</div>
                                            </div>



                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                                    
                                    
                                    
                                    
                                    <!-- tile body -->
                                    <div class="modal fade" id="agregartalla" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                    <form id="agregar">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <h1><strong>Agregar</strong> Operador</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInput">Nombre</label>
                                                        <input type="text" class="form-control" id="Nombre" name="Nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">RFC</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Numero de Licencia</label>
                                                        <input type="text" class="form-control" id="NumLicencia" name="NumLicencia">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Codigo Postal</label>
                                                        <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Calle</label>
                                                        <input type="text" class="form-control" id="Calle" name="Calle">
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="exampleInput">Numero Exterior</label>
                                                            <input type="text" class="form-control" id="NumeroExterior" name="NumeroExterior">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Numero Interior</label>
                                                            <input type="text" class="form-control" id="NumeroInterior" name="NumeroInterior">
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="col-sm-12 control-label">Colonia</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Colonia" name="Colonia" class="form-control">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">Localidad</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Localidad" name="Localidad" class="form-control">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Referencia</label>
                                                            <input type="text" class="form-control" id="Referencia" name="Referencia">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">Municipio</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Municipio" name="Municipio" class="form-control">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">Estado</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Estado" name="Estado" class="form-control">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">País</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Pais" name="Pais" class="form-control">
                                                                    <?php
                                                                        $consultareg = "SELECT * FROM pais ORDER BY idpais";

                                                                        $resreg = $mysqli->query($consultareg);
                                                                        $numrem = $resreg->num_rows;
                                                                        if ($numrem >= 1) {

                                                                            while ($rs = $resreg->fetch_assoc()) {
                                                                    ?>
                                                                    <option <?php if($rs['clave'] == 'MEX') echo 'selected'?> value = "<?php echo $rs['clave']?>"><?php echo $rs['descripcion']?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>

                                                            </div>

                                                        </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                        <button id="btnagregarc" type="button" class="btn btn-greensea">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </form>
                                    </div><!-- /.modal-dialog -->
                                    
                                    
                                    
                                    
                                    <div class="modal fade" id="modalactivar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Activar</strong> Operador</h3>
                                        </div>
                                        <div class="modal-body">


                                            <section class="tile transparent">



                                                <div class="jumbotron bg-transparent-black-3">

                                                    <div class="container text-center">
                                                        <h1>Activar <i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i></h1>
                                                        <p>¿Desea Activar el elemento seleccionado?</p>
                                                        <p><button id="btnactivar" class="btn btn-green btn-large">Activar</button></p>
                                                    </div>

                                                </div>


                                            </section>




                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 
                                    
                                </section>
                            </div><!-- /.modal --> 

                            <div class="modal fade" id="editartalla" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                            <form id="editar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <h1><strong>Editar</strong> Operador</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInput">Nombre</label>
                                                        <input type="text" class="form-control" id="Nombree" name="Nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">RFC</label>

                                                        <input type="text" class="form-control" id="rfce" name="rfc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Numero de Licencia</label>

                                                        <input type="text" class="form-control" id="NumLicenciae" name="NumLicencia">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Codigo Postal</label>
                                                        <input type="text" class="form-control" id="CodigoPostale" name="CodigoPostal">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Calle</label>
                                                        <input type="text" class="form-control" id="Callee" name="Calle">
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="exampleInput">Numero Exterior</label>
                                                            <input type="text" class="form-control" id="NumeroExteriore" name="NumeroExterior">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Numero Interior</label>
                                                            <input type="text" class="form-control" id="NumeroInteriore" name="NumeroInterior">
                                                        </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">Colonia</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput"></label>
                                                            <select id="Coloniae" name="Colonia" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">Localidad</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput"></label>
                                                            <select id="Localidade" name="Localidad" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInput">Referencia</label>
                                                        <input type="text" class="form-control" id="Referenciae" name="Referencia">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">Municipio</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput"></label>
                                                            <select id="Municipioe" name="Municipio" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">Estado</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput"></label>
                                                            <select id="Estadoe" name="Estado" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">País</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput"></label>
                                                            <select id="Paise" name="Pais" class="form-control">
                                                                <?php
                                                                    $consultareg = "SELECT * FROM pais ORDER BY idpais";

                                                                    $resreg = $mysqli->query($consultareg);
                                                                    $numrem = $resreg->num_rows;
                                                                    if ($numrem >= 1) {

                                                                        while ($rs = $resreg->fetch_assoc()) {
                                                                ?>
                                                                <option <?php if($rs['clave'] == 'MEX') echo 'selected'?> value = "<?php echo $rs['clave']?>"><?php echo $rs['descripcion']?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                        <button id="btneditartalla" type="button" class="btn btn-greensea">Editar</button>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </form>
                            </div><!-- /.modal --> 


                            <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Desactivar</strong> Operador</h3>
                                        </div>
                                        <div class="modal-body">


                                            <section class="tile transparent">



                                                <div class="jumbotron bg-transparent-black-3">

                                                    <div class="container text-center">
                                                        <h1>Desactivar <i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i></h1>
                                                        <p>¿Desea desactivar el elemento seleccionado?</p>
                                                        <p><button id="btnmelimtalla" class="btn btn-red btn-large">Desactivar</button></p>
                                                    </div>

                                                </div>


                                            </section>




                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 


                            <section class="tile color transparent-black">

                                <div class="tile-body color transparent-black rounded-corners">
                                    <button id="btnmagr" type="button" class="btn btn-greensea">Agregar</button>
                                    <br><br><br>
                                    <div class="table-responsive" id="divcontable">
                                        <table style="  display: block; overflow-x: auto; white-space: nowrap;" class="table table-datatable table-custom dataTable" id="basicDataTable">
                                            <thead>
                                                <tr >
                                                    <th>NOMBRE</th>
                                                    <th>RFC</th>
                                                    <th>NUM. LICENCIA</th>
                                                    <th>CALLE</th>
                                                    <th>NUM. EXT</th>
                                                    <th>NUM. INT</th>
                                                    <th>COLONIA</th>
                                                    <th>LOCALIDAD</th>
                                                    <th>REFERENCIA</th>
                                                    <th>MUNICIPIO</th>
                                                    <th>ESTADO</th>
                                                    <th>PAIS</th>
                                                    <th>CODIGO POSTAL</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'conexion.php';

                                                $consulta = "SELECT p.* , pai.descripcion as paiss, e.nombre as Esta, m.descripcion as Mun, c.nombre as col FROM operadores p inner join pais pai on p.Pais = pai.clave inner join estados e on e.c_Estado = p.Estado inner join municipios m on m.c_municipio = p.Municipio and m.c_Estado = p.Estado inner join colonias c on c.c_Colonia = p.Colonia and c.c_CodigoPostal = p.CodigoPostal ORDER BY idoperadores";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td id="tdnom<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['NombreOperador']; ?></td>
                                                            <td id="tdamat<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['RFCOperador']; ?></td>
                                                            <td id="tdnome<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['NumLicencia']; ?></td>
                                                            <td id="tddesc<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['Calle']; ?></td>
                                                            <td id="tdcontra<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['NumeroExterior']; ?></td>
                                                            
                                                            <td id="tdtelcasa<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['NumeroInterior']; ?></td>
                                                            <td id="tdcelular<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['col']; ?></td>
                                                            <td id="tdalergia<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['Localidad']; ?></td>
                                                            
                                                            <td id="tdfecing<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['Referencia']; ?></td>
                                                            <td id="tdfecnac<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['Mun']; ?></td>
                                                            <td id="tdcurp<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['Esta']; ?></td>
                                                            <td id="tdrfc<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['paiss']; ?></td>
                                                            
                                                            <td id="tddomi<?php echo utf8_encode($rs['idoperadores']); ?>"><?php echo $rs['CodigoPostal']; ?></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['idoperadores']); ?>" type="button" class="btn edittitle btn-warning margin-bottom-20">Editar Operador</button></td>
                                                            
                                                        </tr> 
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /tile body -->
                            </section>
                            <!-- /tile -->
                            <!-- tile -->
                            <!-- /tile -->
                            <!-- tile -->
                            <!-- /tile -->
                            <!-- tile -->
                            <!-- /tile -->


                        </div>
                        <!-- /col 12 -->



                    </div>
                    <!-- /row -->



                </div>
                <!-- /content container -->






            </div>
            <!-- Page content end -->










        </div>
        <!-- Make page fluid-->




    </div>
    <!-- Wrap all page content end -->



    <section class="videocontent" id="video"></section>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="../../google-code-prettify.googlecode.com/svn/loader/run_prettifyf793.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script type="text/javascript" src="assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="assets/js/vendor/blockui/jquery.blockUI.js"></script>\

      <script src="assets/DataTables/datatables.min.js"></script>
            <script src="assets/DataTables/datatables.js"></script>
            <script src="assets/DataTables/dataTables.buttons.min.js"></script>
            <script src="assets/DataTables/buttons.flash.min.js"></script>
            <script src="assets/DataTables/jszip.min.js"></script>
            <script src="assets/DataTables/pdfmake.min.js"></script>
            <script src="assets/DataTables/vfs_fonts.js"></script>
            <script src="assets/DataTables/buttons.html5.min.js"></script>
            <script src="assets/DataTables/buttons.print.min.js"></script>
            <script src="assets/DataTables/dataTables.fixedColumns.min.js"></script>

    <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
    <script src="assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/jquery.uploadfile.min.js"></script>

    <script src="assets/js/vendor/parsley/parsley.min.js"></script>

    <script src="assets/js/minimal.min.js"></script>
   
    <script src="jsoperadores.js"></script>
    
    

    
</body>
</html>
 <?php
} else {
    header('Location: index.php');
}    