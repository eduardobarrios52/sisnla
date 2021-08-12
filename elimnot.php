<?php
@session_start();
if ($_SESSION[access] == true) {
$id = $_SESSION["id"];
set_time_limit(0);

$id = $_SESSION["id"];
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
        <title>Transportes Julián de obregón</title>
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

                        <h2>Eliminacion de  <span>// Noticias...</span></h2>

                    </div>
                    <!-- /page header -->

                    <!-- content main container -->
                    <div class="main">
                        <!-- row -->
                        <div class="row">
                            <!-- col 12 -->
                            <div class="col-md-12">
                                <!-- tile -->
                                
                                <?php 
                                if(isset($_POST['ntelim'])){
                                    
                                     $ntelim = $_POST['ntelim'];

   foreach ($ntelim as $elim) {
      $queryq='update noticias set cve_cia=999 where cve_not=\''.$elim.'\'';
              $resultadoq = odbc_exec($conexion, $queryq) or die('error ' . odbc_errormsg($conexion));
                       
        }
                                    
                                    
                                    ?>
                                <section class="tile transparent">



                  <div class="jumbotron bg-transparent-black-3">

                    <div class="container text-center">
                      <h1>Noticias Eliminadas con exito!</h1>
                      <p>Las noticias fueron eliminadas</p>
                      
                    </div>

                  </div>


                </section>
                                <?php
                                    
                                }
                                ?>
                                
                                 <section class="tile color transparent-black">

                                <div class="tile-body color transparent-black rounded-corners">
                                    
                                    <div class="table-responsive">
                                        <table style=" display: block; overflow-x: auto; white-space: nowrap;"  class="table table-datatable table-custom  table-hover" id="basicDataTable">
                                            <thead>
                                                <tr >
                                                    <th>TITULO</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>URL</th>
                                                    <th>ARCHIVO</th>
                                                    <th>ELIMINAR</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'conexion.php';

                                                $consulta = "SELECT * FROM noticias where estatus=1";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                
                                                        <tr id="e<?php echo utf8_encode($rs['idnoticia']); ?>" class="odd gradeX">
                                                            
                                                             
                                                            <td id="tdnom<?php echo utf8_encode($rs['idnoticia']); ?>"><?php echo $rs['titulo']; ?></td>
                                                            <td id="tdrfc<?php echo utf8_encode($rs['idnoticia']); ?>"><?php echo $rs['descripcion']; ?></td>
                                                            <td id="tdnome<?php echo utf8_encode($rs['idnoticia']); ?>"><iframe width="320" height="200" 
src="http://www.youtube.com/embed/<?php echo getYoutubeIdFromUrl($rs['url']); ?>"  
allowfullscreen></iframe></td>
                                                            <td id="tddesc<?php echo utf8_encode($rs['idnoticia']); ?>">
                                                                <a href="docnoti/<?php echo $rs['ruta']; ?> " >Ver archivo </a>
                                                                </td>
                                                                 <td>
                                                                    
                                                                     
                                                                     <button dataidc="<?php echo $rs['idnoticia']; ?>" type="button" class="btn elimmarca btn-danger margin-bottom-20">Eliminar noticia</button>
                                           </td>
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
        <script src="http://code.jquery.com/jquery.js"></script>
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


$(".elimmarca").click(function () {

                marcaelim = $(this).attr("dataidc");
                //$('#modalactivar').modal('show');
                
                  var parametros = {
                    "idtalla": marcaelim

                };
                $.ajax({url: "eliminarnoti.php",
                    type: 'GET',
                    data: parametros,
                    success: function (result) {
                        //alert(result);
                        if (result == "ok") {
                            colorelim = 0;
                            location.reload();
                            /*$.ajax({url: "tablacli.php",
                                type: 'GET',
                                success: function (result) {
                                    $("#basicDataTable").html('');
                                    $("#basicDataTable").html(result);
                                }
                            });
                            $('#modalactivar').modal('toggle');*/
                        }
                    }
                });
                
                
                
            });

                // Add custom class to pagination div
                $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

                /*************************************************/
                /**************** BASIC DATATABLE ****************/
                /*************************************************/

                /* Define two custom functions (asc and desc) for string sorting 
                jQuery.fn.dataTableExt.oSort['string-case-asc'] = function (x, y) {
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                };
               
                jQuery.fn.dataTableExt.oSort['string-case-desc'] = function (x, y) {
                    return ((x < y) ? 1 : ((x > y) ? -1 : 0));
                }; */

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
                    "aaSorting": [],
                    //"order": [[ 3, "desc" ]],
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
    header('Location: admini.php');
}

function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}