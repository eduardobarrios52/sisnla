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
            <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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

                            <h2> Data Stage</h2>

                        </div>
                        <!-- /page header -->

                        <!-- content main container -->
                        <div class="main">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12">

                                <?php
                                if (isset($_POST['idform'])) {
                                   
                                    ?>
                                    
                                        <?php
                                        if (isset($_FILES["myfile"])) {
                                            $ret = array();
                                            $error = $_FILES["myfile"]["error"];
                                            if (!is_array($_FILES["myfile"]["name"])) { //single file
                                                $tipo = 'A';
                                                $status = 'A';
                                                $file_name = $_FILES['myfile']['name'];
                                                //$idses = strstr($file_name, '_', true);
                                                
                                                    $idses = date("YmdHis");
                                               
                                                // echo 'aqui es id'.$idses.'<br>';
                                                $file_size = $_FILES['myfile']['size'];
                                                $file_tmp = $_FILES['myfile']['tmp_name'];
                                                $file_type = $_FILES['myfile']['type'];
                                                $ruta = $idses . '.' . strtolower(verificaext($file_name));
                                                // echo $ruta;
                                                $ruta1 = "/contenidoaduanal/" . $ruta;
                                                $ruta2 = "contenidoaduanal/" . $ruta;
                                                //echo $_FILES['myfile']['type'];
                                                if ($_FILES['myfile']['type'] == 'application/zip' || $_FILES['myfile']['type'] == 'application/x-zip-compressed') {
                                                    if (move_uploaded_file($file_tmp, $ruta2)) {
                                                        $save = umask(0);
                                                        @chmod($ruta, 0777);
                                                        umask($save);

                                                        if (PHP_SAPI == 'cli')
                                                            die('This example should only be run from a Web Browser');

                                                        /** Include PHPExcel */
                                                        require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

                                                        $rutadelzip = '/contenidoaduanal/' . $idses . '/';
                                                        $rutadelzip2 = 'contenidoaduanal/' . $idses . '/';
//$rutadelzip=$ruta1;

                                                        if (!file_exists($rutadelzip2)) {

                                                            $save = umask(0);

                                                            if (mkdir($rutadelzip2, 0777, true)) {
                                                                @chmod($rutadelzip2, 0777);
                                                                umask($save);
                                                            }
                                                        }


                                                        $zip = new ZipArchive;
                                                        if ($zip->open($ruta2) === TRUE) {
                                                            $zip->extractTo($rutadelzip2);
                                                            $zip->close();
                                                            // echo 'ok';
                                                        } else {
                                                            //echo 'failed';
                                                        }
                                                        rcopy($rutadelzip2, $rutadelzip2);

                                                        $ficheros1 = scandir($rutadelzip2);
//print_r($ficheros1);
//$objPHPExcel = new PHPExcel();
// Set document properties
                                                        /* $objPHPExcel->getProperties()->setCreator("MXCLI")
                                                          ->setLastModifiedBy("MXCLI")
                                                          ->setTitle('MXCLI')
                                                          ->setSubject('Aduanas')
                                                          ->setDescription("Aduanas")
                                                          ->setKeywords("Excel")
                                                          ->setCategory('Aduanas');
                                                         */

                                                        $hojas = 0;
//print_r($ficheros1);
                                                        //$objPHPExcel->setActiveSheetIndexByName('Worksheet');
//$sheetIndex = $objPHPExcel->getActiveSheetIndex();
//$objPHPExcel->removeSheetByIndex($sheetIndex);


                                                        if (count($ficheros1) > 0) {
                                                            echo '<a href="dsdown.php?idarc='.$idses.'" type="button" class="btn btn-success btn-lg margin-bottom-20">Descargar DATASTAGE en Excel</a>';
                                                            $numtab = 0;
                                                            foreach ($ficheros1 as $archivo) {
                                                                $numtab++;
                                                                if (strlen($archivo) > 4) {
                                                                    if (!is_dir($rutadelzip2 . $archivo)) {



                                                                        // $objPHPExcel->createSheet();
                                                                        $tabla = obtenerarray($rutadelzip2 . $archivo);
                                                                        $stringtabla = ' <div class="col-md-12">
                                                                            <section class="tile transparent">
                                                                           
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    <div class="table-responsive">
                    <table class="table table-datatable table-custom  table-hover dataTable" id="tab' . $numtab . '" aria-describedby="basicDataTable_info">
';
//$objPHPExcel->setActiveSheetIndex($hojas);
                                                                        $reng = 0; // 1-based index
                                                                        $col = 0;
                                                                        //$idses = strstr($file_name, '_', true);


                                                                        foreach ($tabla as $rows => $row) {
                                                                            if ($reng == 0) {
                                                                                $stringtabla = $stringtabla . '<thead>';
                                                                            }

                                                                            $stringtabla = $stringtabla . '<tr>';
                                                                            for ($i = 0; $i < count($row); $i++) {
                                                                                //$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($i, $reng, $row[$i]);
                                                                                if ($reng == 0) {
                                                                                    $stringtabla = $stringtabla . '<th>' . $row[$i] . '</th>';
                                                                                } else {

                                                                                    if ($i == (count($row) - 1)) {
                                                                                        
                                                                                    } else {
                                                                                        $stringtabla = $stringtabla . '<td>' . $row[$i] . '</td>';
                                                                                    }
                                                                                }
                                                                            }
                                                                            $stringtabla = $stringtabla . '</tr>';
                                                                            if ($reng == 0) {
                                                                                $stringtabla = $stringtabla . '</thead>';
                                                                            }
                                                                            $reng++;
                                                                        }
                                                                        $idsfol = "";
                                                                        $titulo = "";
//$idsfol = strstr($archivo, '_', false);
                                                                        $idsfol = pathinfo(strstr_after($archivo, '_'), PATHINFO_FILENAME);
                                                                        $titulo = obtenertitulo($idsfol);
                                                                        if ($titulo == "") {
                                                                            $titulo = $idsfol;
                                                                        } else {
                                                                            $titulo = $idsfol . ' ' . $titulo;
                                                                        }

//$objPHPExcel->getActiveSheet()->setTitle(substr($titulo, 0, 30));





                                                                        $hojas++;
                                                                        $stringtabla = $stringtabla . '</table>   
       </div>
                  </div>
                               </section></div>';

                                                                    }
                                                                }
                                                                
                                                                echo $stringtabla;
                                                            }
//$objPHPExcel->setActiveSheetIndex(0);
                                                        }



                                                        /*

                                                          // Redirect output to a clientâ€™s web browser (Excel2007)
                                                          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                                                          header('Content-Disposition: attachment;filename="'.$idses.'.xlsx"');
                                                          header('Cache-Control: max-age=0');
                                                          // If you're serving to IE 9, then the following may be needed
                                                          header('Cache-Control: max-age=1');

                                                          // If you're serving to IE over SSL, then the following may be needed
                                                          header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                                                          header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                                                          header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                                                          header('Pragma: public'); // HTTP/1.0

                                                          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                                                          $objWriter->save('php://output');
                                                         */
                                                    }
                                                }
                                            }

                                            //$ret[] = $fileName;
                                        } else {
                                            echo "no existe variable";
                                        }
                                       
                                    } else {
                                        ?>
                                    <div class="col-md-6">
                                        <!-- tile -->
                                        <section class="tile color transparent-black">
                                            <!-- tile header -->
                                            <div class="tile-header">
                                                <h1><strong>Crear</strong> Data Stage</h1>
                                                <div class="controls">
                                                    <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                            <!-- /tile header -->
                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <form  class="form-horizontal" role="form" action="subirdatas.php" method="post" enctype="multipart/form-data" target="_blank">
                                                    <div class="form-group">
                                                        <label for="input03" class="col-sm-4 control-label">Adjuntar Archivo Data Stage en ZIP</label>
                                                        <div class="col-sm-8">
                                                            <input name="idform" maxlength="100" type="hidden" id="input02" value="<?php echo date("YmdHis"); ?>">
                                                            <input required type="file" name="myfile" accept="application/zip, application/x-zip-compressed">
                                                        </div>
                                                    </div>




                                                    <div class="form-group form-footer">
                                                        <div class="col-sm-offset-4 col-sm-8">
                                                            <input class="btn btn-primary" type="submit" value="Enviar datos">
                                                            <button type="reset" class="btn btn-default">Eliminar datos</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /tile body -->




                                        </section>
                                        <!-- /tile -->




                                    </div>
                                        </div>
                            </div>
                            </div>
                                        <?php } ?>
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

                            
                        <!-- /content container -->






                    </div>
                    <!-- Page content end -->










                </div>
                <!-- Make page fluid-->




            </div>
            <!-- Wrap all page content end -->



            <section class="videocontent" id="video"></section>




            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://code.jquery.com/jquery.js"></script>
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


            <script>
                $(function () {
    <?php
    if ($numtab > 0) {
        for ($i = 1; $i <= $numtab; $i++) {
            echo ' var tab' . $i . ' = $("#tab' . $i . '").DataTable({ 

                            dom: "Bfrtip",
                            buttons: [

                                {extend: "excel", className: "btn btn-success margin-bottom-20"},

                            ],
                    
            paging: true,
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
            "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"]],  });';
        }
    }
    ?>





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

function strstr_after($haystack, $needle, $case_insensitive = false) {
    $strpos = ($case_insensitive) ? 'stripos' : 'strpos';
    $pos = $strpos($haystack, $needle);
    if (is_int($pos)) {
        return substr($haystack, $pos + strlen($needle));
    }
    // Most likely false or null
    return $pos;
}

function obtenertitulo($id) {

    $tiulo = "";
    if ($id == 501) {
        $tiulo = 'DATOS GENERALES';
    }
    if ($id == 502) {
        $tiulo = ' TRANSPORTE DE LAS MERCANCÍAS';
    }
    if ($id == 503) {
        $tiulo = ' GUIAS';
    }
    if ($id == 504) {
        $tiulo = ' CONTENEDORES';
    }
    if ($id == 505) {
        $tiulo = ' FACTURAS';
    }
    if ($id == 506) {
        $tiulo = ' FECHAS DEL PEDIMENTO';
    }
    if ($id == 507) {
        $tiulo = ' CASOS DEL PEDIMENTO';
    }
    if ($id == 508) {
        $tiulo = ' CUENTAS ADUANERAS DE GARANTÍA DEL PEDIMENTO';
    }
    if ($id == 509) {
        $tiulo = ' TASAS DEL PEDIMENTO';
    }
    if ($id == 510) {
        $tiulo = ' CONTRIBUCIONES DEL PEDIMENTO';
    }
    if ($id == 511) {
        $tiulo = ' OBSERVACIONES DEL PEDIMENTO';
    }
    if ($id == 512) {
        $tiulo = ' DESCARGO DE MERCANCÍAS';
    }
    if ($id == 514) {
        $tiulo = ' MOVIMIENTOS EN CUENTA ADUANERA';
    }
    if ($id == 520) {
        $tiulo = ' DESTINATARIOS DE LA MERCANCÍA';
    }
    if ($id == 551) {
        $tiulo = ' PARTIDAS';
    }
    if ($id == 552) {
        $tiulo = ' MERCANCÍAS';
    }
    if ($id == 553) {
        $tiulo = ' PERMISOS DE LA PARTIDA';
    }
    if ($id == 554) {
        $tiulo = ' CASOS DE LA PARTIDA';
    }
    if ($id == 555) {
        $tiulo = ' CUENTAS ADUANERAS DE GARANTÍA';
    }
    if ($id == 556) {
        $tiulo = ' TASAS DE LAS CONTRIBUCIONES DE LA PARTIDA';
    }
    if ($id == 557) {
        $tiulo = ' CONTRIBUCIONES DE LA PARTIDA';
    }
    if ($id == 558) {
        $tiulo = ' OBSERVACIONES DE LA PARTIDA';
    }
    if ($id == 701) {
        $tiulo = ' RECTIFICACIONES';
    }
    if ($id == 702) {
        $tiulo = ' DIFERENCIAS DE CONTRIBUCIONES DEL PEDIMENTO';
    }
    return $tiulo;

    /*
      501 DATOS GENERALES
      502 TRANSPORTE DE LAS MERCANCÍAS
      503 GUIAS
      504 CONTENEDORES
      505 FACTURAS
      506 FECHAS DEL PEDIMENTO
      507 CASOS DEL PEDIMENTO
      508 CUENTAS ADUANERAS DE GARANTÍA DEL PEDIMENTO
      509 TASAS DEL PEDIMENTO
      510 CONTRIBUCIONES DEL PEDIMENTO
      511 OBSERVACIONES DEL PEDIMENTO
      512 DESCARGO DE MERCANCÍAS
      514 MOVIMIENTOS EN CUENTA ADUANERA
      520 DESTINATARIOS DE LA MERCANCÍA
      551 PARTIDAS
      552 MERCANCÍAS
      553 PERMISOS DE LA PARTIDA
      554 CASOS DE LA PARTIDA
      555 CUENTAS ADUANERAS DE GARANTÍA
      556 TASAS DE LAS CONTRIBUCIONES DE LA PARTIDA
      557 CONTRIBUCIONES DE LA PARTIDA
      558 OBSERVACIONES DE LA PARTIDA
      701 RECTIFICACIONES
      702 DIFERENCIAS DE CONTRIBUCIONES DEL PEDIMENTO
      SELECCIÓN AUTOMATIZADA
      INCIDENCIAS DEL RECONOCIMIENTO ADUANERO
     */
}

function obtenerarray($archivo) {


    $archivo = fopen($archivo, 'r');

    while ($linea = fgets($archivo)) {
        //$linea = str_replace("| \n", '', $linea);
        $data = explode("|", $linea);
        $contador = count($data);
        $tabla[] = $data;
    }
//print_r($tabla);
    fclose($archivo);
    return $tabla;
}

// Function to remove folders and files 
function rrmdir($dir) {
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file)
            if ($file != "." && $file != "..")
                rrmdir("$dir/$file");
        rmdir($dir);
    }
    else if (file_exists($dir)) {
        //unlink($dir);
    }
}

// Function to Copy folders and files       
function rcopy($src, $dst) {/*
  if (file_exists ( $dst )){
  rrmdir ( $dst );

  }
  if (is_dir ( $src )) {
  $save = umask(0);
  @chmod($src, 0777);
  umask($save);
  echo $src.'<br>';
  // mkdir ( $dst );
  $files = scandir ( $src );
  foreach ( $files as $file ){
  echo $file.'<br>';
  if ($file != "." && $file != ".."){
  rcopy ( "$src/$file", "$dst/$file" );
  }
  }
  } else if (file_exists ( $src )){
  copy ( $src, $dst );}

 */
    $ficheros1 = scandir($src);
    //print_r($ficheros1);
    foreach ($ficheros1 as $archivo) {

        if ($archivo == "." || $archivo == "..") {
            
        } else {
            //rcopy ( "$src/$file", "$dst/$file" );
            if (is_dir("$src/$archivo")) {
                rcopy("$src/$archivo/", $dst);
                // echo "$src/$archivo" .' es directorio<br>';
            } else if (file_exists("$src/$archivo")) {
                rename("$src/$archivo", "$dst/$archivo");
                //echo $archivo .'es archivo<br>';
                // echo 'copiar '.$archivo .' a '.$dst.'<br>';
            }
        }
    }
}

function recurse_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ( $file = readdir($dir))) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                //copy($src . '/' . $file,$dst . '/' . $file); 
            }
        }
    }
    closedir($dir);
}
?>