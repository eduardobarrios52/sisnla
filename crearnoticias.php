<?php
@session_start();
if ($_SESSION[access] == true) {
    $id = $_SESSION["id"];
    $idofi = $_SESSION["idofi"];
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
            <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/vendor/animate/animate.css">
            <link type="text/css" rel="stylesheet" media="all" href="assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
            <link rel="stylesheet" href="assets/js/vendor/videobackground/css/jquery.videobackground.css">
            <link rel="stylesheet" href="assets/css/vendor/bootstrap-checkbox.css">

            <link rel="stylesheet" href="assets/js/vendor/summernote/css/summernote.css">
            <link rel="stylesheet" href="assets/js/vendor/summernote/css/summernote-bs3.css">
            <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen.min.css">
            <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen-bootstrap.css">
            <link rel="stylesheet" href="assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
            <link rel="stylesheet" href="assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
            <link rel="stylesheet" href="assets/js/vendor/colorpalette/bootstrap-colorpalette.css">

            <link href="assets/css/minimal.css" rel="stylesheet">



            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
        </head>
        <body class="<?php echo $background; ?>">

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

                            <h2> Noticias</h2>

                        </div>
                        <!-- /page header -->

                        <!-- content main container -->
                        <div class="main">
                            <!-- row -->
                            <div class="row">

                                <?php
                                if (isset($_POST['titulo'])) {
//select max(cve_not)+1 from noticias 
                                    //insert into noticias(cve_cia,cve_ofi,cve_not,nombre,descr,tipo,fecha,activo,cve_usr)
//values(1,1,(select max(cve_not)+1 from noticias),'titulo','descripcion',1,CURRENT TIMESTAMP,1,1)        
                                    $titulo = $_POST['titulo'];
                                    $descripcion = $_POST['descripcion'];
                                    
                                    $url = $_POST['url'];
//select max(cve_not)+1 from noticias 
                                    //insert into noticias(cve_cia,cve_ofi,cve_not,nombre,descr,tipo,fecha,activo,cve_usr)
//values(1,1,(select max(cve_not)+1 from noticias),'titulo','descripcion',1,CURRENT TIMESTAMP,1,1)   (select max(cve_not)+1 from noticias)     
                                    //$conexion = conectar();
                                    // $consinser = 'insert into accesoweb (CVE_CIA ,CVE_USR ,tip_usr ,IP1 ,IP2 ,fecha ,cve_pwb ,observ ,status,consec)'
                                    //. ' values(1,' . $idsocio . ',\'' . $tipo . '\',\'' . $ip . '\',\'' . $ip2 . '\',CURRENT TIMESTAMP,27002,\'' . $observ . '\',\'' . $stat . '\',\'' . $maximocons . '\')';
                                    // echo $consinser;

                                   
                                    $consultanot = 'insert into noticias(titulo,descripcion,url,estatus,fecha) ' .
                                            'values(\'' . $titulo . '\',\'' . $descripcion . '\',\'' . $url . '\',1,now())';
                                    //echo $consultanot;
                                   
                                    
$mysqli->query($consultanot);

$consultamax=$mysqli->insert_id;


if (isset($_FILES["adjunto"])) {
    $ret = array();
//	This is for custom errors;
    /* 	$custom_error= array();
      $custom_error['jquery-upload-file-error']="File already exists";
      echo json_encode($custom_error);
      die();
     */
    $error = $_FILES["adjunto"]["error"];
    //You need to handle  both cases
    //If Any browser does not support serializing of multiple files using FormData()
    if (!is_array($_FILES["adjunto"]["name"])) { //single file
        //$fileName = $_FILES["myfile"]["name"];
        //move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
        ////////////////////////////////////
       
        
 
        $tipo = 'A';

        $status = 'A';
        $file_name = $_FILES['adjunto']['name'];
        $file_size = $_FILES['adjunto']['size'];
        $file_tmp = $_FILES['adjunto']['tmp_name'];
        $file_type = $_FILES['adjunto']['type'];
        $ruta = $consultamax . '.' . strtolower(verificaext($file_name));
        $ruta1 = "docnoti/" . $ruta;
        // echo $ruta;

        if (move_uploaded_file($file_tmp, $ruta1)) {
            $save = umask(0);
            //@chmod("/imagenesp/", 0777);
            @chmod($ruta, 0777);
            umask($save);
            $consultanotup = 'update noticias set ruta=\'' . $ruta . '\' where idnoticia=\'' . $consultamax . '\'' ;
                 
//echo $consultanotup;
            //odbc_exec($conexion, $consultanot) or die('error ' . odbc_errormsg($conexion));
            $mysqli->query($consultanotup);
            
            ?>
                                <section class="tile transparent">



                  <div class="jumbotron bg-transparent-black-3">

                    <div class="container text-center">
                      <h1>NOTICIA CREADA</h1>
                      <p>La noticia fue creada con exito</p>
                      
                    </div>

                  </div>


                </section>
                                <?php
            
            
        }


    }
  
}

                                    ?>

                                    

        <?php
    } else {
        ?>
                                    <div class="col-md-6">
                                        <!-- tile -->
                                        <section class="tile color transparent-black">
                                            <!-- tile header -->
                                            <div class="tile-header">
                                                <h1><strong>Crear</strong> Noticias</h1>
                                                <div class="controls">
                                                    <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                            <!-- /tile header -->
                                            <!-- tile body -->
                                            <div class="tile-body">
                                                <form class="form-horizontal" role="form" method="post" action="crearnoticias.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="input03" class="col-sm-4 control-label">Titulo de noticia</label>
                                                        <div class="col-sm-8">
                                                            <input name="titulo" maxlength="100" type="text" class="form-control" id="input02" required>
                                                            <span class="help-block">Maximo 100 caracteres</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input03" class="col-sm-4 control-label">Descripción de noticia</label>
                                                        <div class="col-sm-8">
                                                            <textarea  name="descripcion"  class="form-control" id="input03" rows="6"></textarea>
                                                            <span class="help-block">Maximo 244 caracteres</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input07" class="col-sm-4 control-label">URL de YouTube</label>
                                                        <div class="col-sm-8">
                                                            <input name="url" maxlength="100" type="text" class="form-control" id="input04" >

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="input07" class="col-sm-4 control-label">Adjuntar archivo</label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="adjunto" accept=".pdf,.jpg,.png"  />

                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                        <label for="input07" class="col-sm-4 control-label">Nota:</label>
                                                        <div class="col-sm-8">
                                                             <span class="help-block">"El correcto uso del idioma es una carta de presentación, cuida la ortografía".</span>

                                                        </div>
                                                    </div>
                                                   

                                                    <div class="form-group form-footer">
                                                        <div class="col-sm-offset-4 col-sm-8">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="reset" class="btn btn-default">Eliminar datos</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /tile body -->




                                        </section>
                                        <!-- /tile -->




                                    </div><?php } ?>
    <?php
    $sep = "[/-.]";
//$alfnum = "#^(((0?[1-9]|1d|2[0-8]){$sep}(0?[1-9]|1[012])|(29|30){$sep}(0?[13456789]|1[012])|31{$sep}(0?[13578]|1[02])){$sep}(19|[2-9]d)d{2}|29{$sep}0?2{$sep}((19|[2-9]d)(0[48]|[2468][048]|[13579][26])|(([2468][048]|[3579][26])00)))$#";
    $numerico = "/^[0-9]{1,25}$/";
//$sep = "[/-.]";
//$alfnum = '^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/](19|20)\d{2}$';
//$alfnum = "\'/^\\d{1,2}\\/\\d{1,2}\\/\\d{4}$/\'";
    $alfnum = "/^[0-9-:punct:]{1,25}$/";
//echo validateDate($_POST["fecini"], 'd/m/Y');
    if (isset($_POST["fecini"]) && preg_match($alfnum, $_POST["fecini"]) && isset($_POST["fecfin"]) && preg_match($alfnum, $_POST["fecfin"])) {
        
    }
    ?>

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
            <script type="text/javascript" src="assets/js/vendor/blockui/jquery.blockUI.js"></script>

            <script src="assets/js/vendor/summernote/summernote.min.js"></script>

            <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

            <script src="assets/js/vendor/momentjs/moment-with-langs.min.js"></script>
            <script src="assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>

            <script src="assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>

            <script src="assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>

            <script src="assets/js/minimal.min.js"></script>


            <script>
                $(function () {

                    //load wysiwyg editor
                    $('#input06').summernote({
                        toolbar: [
                            //['style', ['style']], // no style button
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                                    //['insert', ['picture', 'link']], // no insert buttons
                                    //['table', ['table']], // no table button
                                    //['help', ['help']] //no help button
                        ],
                        height: 137   //set editable area's height
                    });

                    //chosen select input
                    $(".chosen-select").chosen({disable_search_threshold: 10});

                    //initialize datepicker
                    $('#datepicker').datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        }
                    });

                    $("#datepicker").on("dp.show", function (e) {
                        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;
                        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
                    });

                    //initialize colorpicker
                    $('#colorpicker').colorpicker();

                    $('#colorpicker').colorpicker().on('showPicker', function (e) {
                        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 45;
                        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
                    });

                    //initialize colorpicker RGB
                    $('#colorpicker-rgb').colorpicker({
                        format: 'rgb'
                    });

                    $('#colorpicker-rgb').colorpicker().on('showPicker', function (e) {
                        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 45;
                        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
                    });

                    //initialize file upload button
                    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                        var input = $(this).parents('.input-group').find(':text'),
                                log = numFiles > 1 ? numFiles + ' files selected' : label;

                        console.log(log);

                        if (input.length) {
                            input.val(log);
                        } else {
                            if (log)
                                alert(log);
                        }

                    });

                    // Initialize colorpalette
                    $('#event-colorpalette').colorPalette({
                        colors: [['#428bca', '#5cb85c', '#5bc0de', '#f0ad4e', '#d9534f', '#ff4a43', '#22beef', '#a2d200', '#ffc100', '#cd97eb', '#16a085', '#FF0066', '#A40778', '#1693A5']]
                    }).on('selectColor', function (e) {
                        var data = $(this).data();

                        $(data.returnColor).val(e.color);
                        $(this).parents(".input-group").css("border-bottom-color", e.color);
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
                        "aaSorting": [[0, 'desc']],
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
    header('Location: admini.php');
}

function validateDate($date, $format) {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function directorioe($rfc, $fechaf) {
    $anio = date("Y", strtotime($fechaf));
    $mes = date("m", strtotime($fechaf));
    //crear ruta de directorio
    $ruta3 = $anio . '/' . $mes . '/' . $rfc . '/';

    return $ruta3;
}


function verificaext($nombre) {
    $path_parts = pathinfo($nombre);
    $extension = $path_parts['extension'];
    return $extension;
}


?>