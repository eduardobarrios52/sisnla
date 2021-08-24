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
                        <h2><i class="fa fa-users" style="line-height: 48px;padding-left: 0;"></i> SUCURSALES </h2>
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
                                    <!-- tile body -->
                                    <div class="modal fade" id="agregartalla" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                        <form id="agregar">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                        <h1><strong>Agregar</strong> Sucursal</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInput">Nombre</label>
                                                            <input type="text" class="form-control" id="Nombre" name="Nombre">
                                                        </div>
                            

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">Empresa</label>

                                                            <div class="form-group">
                                                                <label for="exampleInput"></label>
                                                                <select id="Empresa" name="Empresa" class="form-control">
                                                                    <?php
                                                                        $consultarem = "SELECT * FROM empresa ORDER BY idempresa";

                                                                        $resrem = $mysqli->query($consultarem);
                                                                        $numrem = $resrem->num_rows;
                                                                        if ($numrem >= 1) {

                                                                            while ($rs = $resrem->fetch_assoc()) {
                                                                    ?>
                                                                    <option value = "<?php echo $rs['idempresa']?>"><?php echo $rs['nombre']?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Serie</label>
                                                            <input type="text" class="form-control" id="Serie" name="Serie">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Folio</label>
                                                            <input type="text" class="form-control" id="Folio" name="Folio">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Codigo Postal</label>
                                                            <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal">
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
                                </section>
                            </div><!-- /.modal --> 

                            <div class="modal fade" id="editartalla" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <form id="editar">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                <h1><strong>Editar</strong> Area</h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInput">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombree" name="Nombre">
                                                </div>
                    

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Empresa</label>

                                                    <div class="form-group">
                                                        <label for="exampleInput"></label>
                                                        <select id="Empresae" name="Empresa" class="form-control">
                                                            <?php
                                                                $consultarem = "SELECT * FROM empresa ORDER BY idempresa";

                                                                $resrem = $mysqli->query($consultarem);
                                                                $numrem = $resrem->num_rows;
                                                                if ($numrem >= 1) {

                                                                    while ($rs = $resrem->fetch_assoc()) {
                                                            ?>
                                                            <option value = "<?php echo $rs['idempresa']?>"><?php echo $rs['nombre']?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInput">Serie</label>
                                                    <input type="text" class="form-control" id="Seriee" name="Serie">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInput">Folio</label>
                                                    <input type="text" class="form-control" id="Folioe" name="Folio">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInput">Codigo Postal</label>
                                                    <input type="text" class="form-control" id="CodigoPostale" name="CodigoPostal">
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                    <button id="btneditartalla" type="button" class="btn btn-greensea">Agregar</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </form>
                            </div><!-- /.modal --> 


                            <div class="modal fade" id="modalactivar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Activar</strong> Area</h3>
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
                            
                            <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Desactivar</strong> Area</h3>
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
                                    <div class="table-responsive">
                                        <table style=" display: block; overflow-x: auto; white-space: nowrap;"  class="table table-datatable table-custom  table-hover" id="basicDataTable">
                                            <thead>
                                                <tr >
                                                   
                                                    <th>Nombre</th>
                                                    <th>Empresa</th>
                                                    <th>Serie</th>
                                                    <th>Folio</th>
                                                    <th>Codigo Postal</th>
                                                    <th>Editar</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                

                                                $consulta = "SELECT * FROM sucursal ORDER BY idsucursal";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                
                                                        <tr class="odd gradeX">
                                                            
                                                             
                                                            <td id="tdnom<?php echo utf8_encode($rs['idsucursal']); ?>"><?php echo $rs['nombre']; ?></td>
                                                            <td id="TIPO<?php echo utf8_encode($rs['idsucursal']); ?>"><?php echo $rs['idempresa']; ?></td>
                                                            <td id="PLACA<?php echo utf8_encode($rs['idsucursal']); ?>"><?php echo $rs['serie']; ?></td>
                                                            <td id="MARCA<?php echo utf8_encode($rs['idsucursal']); ?>"><?php echo $rs['folio']; ?></td>
                                                            <td id="MONDELO<?php echo utf8_encode($rs['idsucursal']); ?>"><?php echo $rs['cp']; ?></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['idsucursal']); ?>" type="button" class="btn edittitle btn-warning margin-bottom-20">Editar Sucursal</button></td>

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

    <script src="assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="assets/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
    <script src="assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script src="assets/js/vendor/datatables/dataTables.bootstrap.js"></script>

    <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
    <script src="assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/jquery.uploadfile.min.js"></script>

    <script src="assets/js/vendor/parsley/parsley.min.js"></script>

    <script src="assets/js/minimal.min.js"></script>

    <script src="jssucursal.js"></script>
</body>
</html>
 <?php
} else {
    header('Location: index.php');
}    