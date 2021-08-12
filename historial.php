<?php
@session_start();
if ($_SESSION[access] == true) {
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

            <link href="assets/css/minimal.css" rel="stylesheet">

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

                            <h2><i class="fa fa-mobile" style="line-height: 48px;padding-left: 0;"></i> Historial <span>// de conversaciones...</span></h2>

                        </div>
                        <!-- /page header -->

                        <!-- content main container -->
                        <div class="main">
                            <!-- row -->
                            <div class="row">
                                <!-- col 12 -->
                                <div class="col-md-12">
                                    <!-- tile -->
                                    <section class="tile color redbrown">
                                        <!-- tile header -->
                                        <!-- /tile header -->
                                        <!-- tile body -->
                                        <div class="tile-body color transparent-black rounded-corners">
                                            <div class="table-responsive">
                                                <table  class="table table-datatable table-custom  table-hover" id="basicDataTable">

                                                    <thead>
                                                        <tr>
                                                            <th># Ticket</th>
                                                            <th>NOMBRE</th>
                                                            <th>CORREO</th>
                                                            <th>TELEFONO</th>
                                                            <th>FECHA-HORA</th>
                                                            <th>ATENDIDO POR</th>
                                                            <th>MENSAJES</th>
                                                            <th>ASIGANAR Ticket</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody><?php
                                                        $i = 'I';
                                                        $consulta3 = 'SELECT c.nombre,c.correo,c.telefono,s.fecha,s.fechaterm,s.cve_ses,s.cve_cli,s.cve_atn,s.tipoterm FROM sesiones s inner join clichat c on s.cve_cli=c.cve_cli where s.cve_cia=1  order by fecha;';
                                                        //$res3 = mysql_query($consulta3) or die(mysql_error());
                                                        $contar = 1;




                                                        if ($resultadocolp = $mysqli->query($consulta3)) {
                                                            if ($resultadocolp->num_rows == 0) {
                                                                
                                                            } else {
                                                                while ($rs = $resultadocolp->fetch_assoc()) {
                                                                    echo '<tr>';
                                                                    echo '<td>' . $rs['cve_ses'] . '</td>';
                                                                    echo '<td>' . $rs['nombre'] . '</td>';
                                                                    echo '<td>' . $rs['correo'] . '</td>';
                                                                    echo '<td>' . $rs['telefono'] . '</td>';
                                                                    
                                                                    echo '<td>' . $rs['fecha'] . '</td>';

                                                                    $consulta = 'select nombre, apaterno from ususis where idusuarios=\'' . $rs['cve_atn'] . '\';';
                                                                    $res = $mysqli->query($consulta);
                                                                    $n = $res->num_rows;
                                                                    if ($n >= 1) {
                                                                        while ($rs1 = $res->fetch_assoc()) {
                                                                            echo '<td>' . $rs1['nombre'] .' '.$rs1['apaterno'] . '</td>';
                                                                        }
                                                                    } else {
                                                                        echo '<td>NO Asignado</td>';
                                                                    }

                                                                   






                                                                    echo '<td><a href="#modalDialog' . $contar . '" role="button" class="btn btn-redbrown" data-toggle="modal">Ver conversación</a>'
                                                                    . '    <div class="modal fade" id="modalDialog' . $contar . '" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                            <h3 class="modal-title" id="modalDialogLabel"><strong>' . $rs['correo'] . '</strong> ' . $rs['nombre'] . ' ' . $rs['fecha'] . '</h3>
                          </div>
                          <div class="modal-body">';

                                                                    $consultap = 'select  fecha, mensaje, tip_usu,cve_msj,archivo   from msjchat where cve_ses=\'' . $rs['cve_ses'] . '\'  and cve_cia=1';
                                                                    $resp = $mysqli->query($consultap);
                                                                    while ($rsp = $resp->fetch_assoc()) {

                                                                        if ($rsp['tip_usu'] == 1) {
                                                                            if ($rsp['archivo'] == 0) {
                                                                                ?>
                                                                            <blockquote class="filled withoutHeader">
                                                                                <p><img style="width: 32px;" class="pull-right" src="assets/images/cli.png"> <?php echo utf8_encode($rsp['mensaje']) ?></p>
                                                                            </blockquote>
                                                                            <?php
                                                                        } else {

                                                                            echo '<blockquote class="filled withoutHeader">
<p><a class="btn btn-info margin-bottom-20 pull-right" href="doctickets/' . $rsp['mensaje'] . '" target="_blank">Ver Archivo</a></p>
   </blockquote>';
                                                                        }



                                                                        $consulta2 = 'update msjchat set visto =1 where cve_msj=\'' . $rsp['cve_msj'] . '\'';
                                                                        $res2 = $mysqli->query($consulta2);
                                                                    } else if ($rsp['tip_usu'] == 2) {

                                                                        if ($rsp['archivo'] == 0) {
                                                                            ?>



                                                                            <blockquote class="filled withoutHeader">
                                                                                <p>
                                                                                    <img style="width: 32px;" class="pull-left" src="assets/images/serv.png"> <?php echo utf8_encode($rsp['mensaje']) ?>
                                                                                </p>
                                                                            </blockquote>
                                                                            <?php
                                                                        } else {

                                                                            echo '<blockquote class="filled withoutHeader">
<p><a class="btn btn-info margin-bottom-20 pull-left" href="doctickets/' . $rsp['mensaje'] . '" target="_blank">Ver Archivo</a></p>
   </blockquote>';
                                                                        }
                                                                    }
                                                                }



                                                                /////////////////////////FIN


                                                                echo '</div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
'
                                                                . '</td>';
                                                                echo '<td> <select class="chosen-select chosen-transparent form-control" cveses="' . $rs['cve_ses'] . '" id="sel' . $rs['cve_ses'] . '"><option selected value="0">Sin asignar</option>';

                                                                $consulsel = 'SELECT idusuarios,nombre,apaterno,amaterno FROM ususis where activo =1;';
                                                                $resel = $mysqli->query($consulsel);
                                                                while ($rss = $resel->fetch_assoc()) {
                                                                    if ($rs['cve_atn'] == $rss['idusuarios']) {
                                                                        echo '<option selected value="' . $rss['idusuarios'] . '">' . $rss['nombre'] . ' ' . $rss['apaterno'] . ' ' . $rss['amaterno'] . ' </option>';
                                                                    } else {
                                                                        echo '<option value="' . $rss['idusuarios'] . '">' . $rss['nombre'] . ' ' . $rss['apaterno'] . ' ' . $rss['amaterno'] . ' </option>';
                                                                    }
                                                                }
                                                                echo '</select> </td>';


                                                                echo '</tr>';
                                                                $contar++;
                                                            }
                                                        }
                                                    }








                                                    /*

                                                      while ($rs = mysql_fetch_assoc($res3)) {
                                                      echo '<tr>';
                                                      echo '<td>' . $rs['nombre'] . '</td>';
                                                      echo '<td>' . $rs['correo'] . '</td>';
                                                      echo '<td>' . $rs['telefono'] . '</td>';
                                                      echo '<td>' . $rs['cve_ses'] . '</td>';
                                                      echo '<td>' . $rs['fecha'] . '</td>';
                                                      //echo '<td>'.$rs['cve_atn'].'</td>';


                                                      $consulta = 'select nombre from usuarios where cve_usr=\'' . $rs['cve_atn'] . '\';';
                                                      $res = mysql_query($consulta) or die(mysql_error());
                                                      $n = mysql_num_rows($res);
                                                      if ($n >= 1) {
                                                      while ($rs1 = mysql_fetch_assoc($res)) {
                                                      echo '<td>' . $rs1['nombre'] . '</td>';
                                                      }
                                                      } else {
                                                      echo '<td>NO IDENTIFICADO</td>';
                                                      }



                                                      /////////////////////////////////////////////


                                                      $consultac = 'SELECT calificacion FROM calichat where cve_ses=\'' . $rs['cve_ses'] . '\';';
                                                      $resc = mysql_query($consultac) or die(mysql_error());
                                                      $nc = mysql_num_rows($resc);
                                                      if ($nc == 1) {
                                                      while ($rs1c = mysql_fetch_assoc($resc)) {
                                                      echo '<td>';
                                                      for ($i = 1; $i <= $rs1c['calificacion']; $i++) {
                                                      echo '<i class="fa fa-star" style="line-height: 48px;padding-left: 0;"></i> ';
                                                      }
                                                      echo '</td>';
                                                      }
                                                      } else {
                                                      echo '<td>NO CALIFICADO</td>';
                                                      }


                                                      /*
                                                      echo '<td><a href="#modalDialog' . $contar . '" role="button" class="btn btn-redbrown" data-toggle="modal">Ver conversación</a>'
                                                      . '    <div class="modal fade" id="modalDialog' . $contar . '" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                      <div class="modal-content">
                                                      <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                      <h3 class="modal-title" id="modalDialogLabel"><strong>' . $rs['correo'] . '</strong> ' . $rs['nombre'] . ' ' . $rs['fecha'] . '</h3>
                                                      </div>
                                                      <div class="modal-body">';

                                                      $consulta = 'select fecha, mensaje, tip_usu,cve_msj  from msjchat where cve_ses=\'' . $rs['cve_ses'] . '\'  and cve_cia=1';
                                                      $res = mysql_query($consulta) or die(mysql_error());
                                                      while ($rs = mysql_fetch_assoc($res)) {

                                                      if ($rs['tip_usu'] == 1) {
                                                      ?>
                                                      <blockquote class="filled withoutHeader">
                                                      <p><img style="width: 32px;" class="pull-right" src="assets/images/cli.png"> <?php echo $rs['mensaje'] ?></p>
                                                      </blockquote>
                                                      <?php
                                                      $consulta2 = 'update msjchat set visto =1 where cve_msj=\'' . $rs['cve_msj'] . '\'';
                                                      $res2 = mysql_query($consulta2) or die(mysql_error());
                                                      } else if ($rs['tip_usu'] == 2) {
                                                      ?>

                                                      <blockquote class="filled withoutHeader">
                                                      <p>
                                                      <img style="width: 32px;" class="pull-left" src="assets/images/serv.png"> <?php echo $rs['mensaje'] ?>
                                                      </p>
                                                      </blockquote>
                                                      <?php
                                                      }
                                                      }
                                                      echo '</div>
                                                      </div><!-- /.modal-content -->
                                                      </div><!-- /.modal-dialog -->
                                                      </div><!-- /.modal -->
                                                      '
                                                      . '</td>';
                                                      echo '</tr>';
                                                      $contar++;
                                                      }

                                                     */
                                                    ?> </tbody>

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

<div class="modal fade" id="modalDialog" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                            <h3 class="modal-title" id="modalDialogLabel"><strong>Ticket</strong> Asignado</h3>
                          </div>
                          <div class="modal-body">
                            <p>Se ha asignado el ticket</p>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div>
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

            <script src="assets/js/minimal.min.js"></script>

            <script>
                $(function () {


                    $('.chosen-select').on('change', function () {
                        var $input = $(this);
                        var valsel=this.value;
                        //alert( this.value+" "+$input.attr("cveses") );

                        var parametros = {
                            "cve_ses": $input.attr("cveses"),
                            "idusuarios":this.value
                                                    
        };
                        $.ajax({url: "asignaticket.php",
                            type: 'GET',
                            data: parametros,
                            success: function (result) {
                                if (result == 'ok') {
if(valsel>=1){$('#modalDialog').modal('show');}
    }


                            }});



                    });

                    // Add custom class to pagination div
                    $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

                    /*************************************************/
                    /**************** BASIC DATATABLE ****************/
                    /*************************************************/

                    /* Define two custom functions (asc and desc) for string sorting */
                    jQuery.fn.dataTableExt.oSort['string-case-asc'] = function (x, y) {
                        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                    };

                    jQuery.fn.dataTableExt.oSort['string-case-desc'] = function (x, y) {
                        return ((x < y) ? 1 : ((x > y) ? -1 : 0));
                    };

                    /* Add a click handler to the rows - this could be used as a callback */
                    $("#basicDataTable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable01.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }

                        // FadeIn/Out delete rows button
                        if ($('#basicDataTable tr.row_selected').length > 0) {
                            $('#deleteRow').stop().fadeIn(300);
                        } else {
                            $('#deleteRow').stop().fadeOut(300);
                        }
                    });

                    /* Build the DataTable with third column using our custom sort functions */
                    var oTable01 = $('#basicDataTable').dataTable({
                        paging: false,
                        "scrollX": true,
                        "oLanguage": {
                            "sProcessing": "Procesando...",
                            "sLengthMenu": "Mostrar _MENU_ registros",
                            "sZeroRecords": "No se encontraron resultados",
                            "sEmptyTable": "Ningún dato disponible en esta tabla",
                            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sSearch": "Buscar:",
                            "sSearchPlaceholder": "Buscar:",
                            "sUrl": "",
                            "sInfoThousands": ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast": "Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        },
                        "aaSorting": [[0, 'desc'], [1, 'asc'], [2, 'asc']],
                        //"order": [[ 0, "desc" ]],
                        "fnInitComplete": function (oSettings, json) {
                            $('.dataTables_filter input').attr("placeholder", "Busqueda");



                        }
                    });



                    /*******************************************************/
                    /**************** INLINE EDIT DATATABLE ****************/
                    /*******************************************************/

                    /******************************************************/
                    /**************** DRILL DOWN DATATABLE ****************/
                    /******************************************************/

                    /****************************************************/
                    /**************** ADVANCED DATATABLE ****************/
                    /****************************************************/




                    //initialize chosen
                    $('.dataTables_length select').chosen({disable_search_threshold: 10});

                })
            </script>
        </body>
    </html>
    <?php
} else {
    header('Location: index.php');
}    