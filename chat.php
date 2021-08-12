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

            <link rel="stylesheet" href="assets/js/vendor/summernote/css/summernote.css">
            <link rel="stylesheet" href="assets/js/vendor/summernote/css/summernote-bs3.css">
            <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen.min.css">
            <link rel="stylesheet" href="assets/js/vendor/chosen/css/chosen-bootstrap.css">
            <link rel="stylesheet" href="assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
            <link rel="stylesheet" href="assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
            <link rel="stylesheet" href="assets/js/vendor/colorpalette/bootstrap-colorpalette.css">

            <link rel="stylesheet" href="assets/css/uploadfile.css">

            <link href="assets/css/minimal.css" rel="stylesheet">
            <style> ​.parpadea {

                    animation-name: parpadeo;
                    animation-duration: 1s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;

                    -webkit-animation-name:parpadeo;
                    -webkit-animation-duration: 1s;
                    -webkit-animation-timing-function: linear;
                    -webkit-animation-iteration-count: infinite;
                }

                @-moz-keyframes parpadeo{  
                    0% { opacity: 1.0; }
                    50% { opacity: 0.0; }
                    100% { opacity: 1.0; }
                }

                @-webkit-keyframes parpadeo {  
                    0% { opacity: 1.0; }
                    50% { opacity: 0.0; }
                    100% { opacity: 1.0; }
                }

                @keyframes parpadeo {  
                    0% { opacity: 1.0; }
                    50% { opacity: 0.0; }
                    100% { opacity: 1.0; }
                }</style>


            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
            <script > var sesionsel = '';
                var nombrec = '';
                var correoc = '';
                var telc = '';
                var categot= '';
                var archivo= '';
                
            </script>
        </head>
        <body class="<?php echo $background; ?>" >
<audio  id="chatAudio" 
       ><source src="notify.mp3" type="audio/mpeg">
  Your browser does not support the <code>audio</code> element.
</audio>
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

                            <h2> Atencion al cliente</h2>

                        </div>
                        <!-- /page header -->

                        <!-- content main container -->
                        <div class="main vertical-mail">

                            <div class="modal fade" id="agregararchivo" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Menu </strong>Intranet</h3>
                                        </div>
                                        <div class="modal-body">



                                            <div class="form-group">

                                                <div id="fileuploader">Upload</div>
                                            </div>



                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>


                            <!-- row -->
                            <div class="row">


                                <div class="col-md-2">

                                    <ul class="navigation" id="mail-navigation">
                                        <li class="mark"><i class="fa fa-envelope-o"></i></li>

                                        <li class="folders heading">
                                            <h5><i class="fa fa-folder"></i> Administrcion del servicio <a href="#" class="pull-right"><i class="fa fa-plus"></i></a></h5>
                                            <ul>
                                                <li class="active"><a href="#"><span id="enlinea" class="badge badge-red"></span>En linea</a></li>


                                            </ul>
                                        </li>
                                    </ul>

                                </div>              

                                <div class="col-md-3">

                                    <ul class="inbox tile color greensea" id="mail-inbox">
                                        <li class="heading"><h1>Inbox <br></h1></li>

                                        <?php
                                        $strli = "";
                                        $a = 'A';
                                        $consulta3 = 'select s.cve_cli,c.correo,c.nombre,c.telefono,s.cve_ses,s.fecha,s.descripcion  from sesiones s inner join clichat c on s.cve_cli=c.cve_cli where s.cve_atn=\'' . $idatn . '\'  and s.estatus=\'' . $a . '\' and s.cve_cia=1 order by s.fecha asc';


                                        if ($resultadocolp = $mysqli->query($consulta3)) {
                                            if ($resultadocolp->num_rows == 0) {
                                                @header('Location: index.php?error=3');
                                            } else {
                                                while ($rs = $resultadocolp->fetch_assoc()) {
                                                    if ($contador <= 15) {
                                                        $strli = $strli . '<li id="' . trim($rs['cve_ses']) . '" class="msg">
                    
                    <a href="#" class="mail-favourite"><i class="fa fa-envelope-o"></i></a>
                    <div>
                    <h5><strong><i class="fa fa-ticket "></i></strong> ' . $rs['cve_ses'] . ' </h5>
                      <h5><strong><i class="fa fa-user"></i></strong> ' . $rs['nombre'] . ' </h5>
                      <p>' . $rs['descripcion'] . '<strong>' . $rs['correo'] . '</strong> <i class="fa fa-phone"></i> ' . $rs['telefono'] . '</p>
                      <span class="delivery-time">' . date('d-m-Y H:i:s', strtotime($rs['fecha'])) . '</span>
                          <span id="nl' . trim($rs['cve_ses']) . '"  class="badge badge-red parpadea"></span>
                      
                      <div class="mail-label bg-red parpadea"></div>
                      <div class="mail-actions">
                      
                      
                      </div>
                    </div>
                  </li>';

                                                        $contador++;
                                                    }
                                                }
                                            }
                                        }


                                        echo $strli;
                                        ?>





                                    </ul>
                                </div>


                                <div class="col-md-7">


                                    <div class="mail-content " id="mail-content">



                                        <div class="message">

                                            <div class="header">
                                                <h1><strong>Mensajes en linea</strong></h1>

                                                <ul class="message-info">
                                                    <li >Nombre: <em id="nombrec"></em></li>
                                                    <li>Correo: <em id="correoc"></em></li>
                                                    <li>Telefono: <em id="telc"></em></li>
                                                    <li>Descripcion: <em id="categot"></em></li>
                                                    <li><a id="archivocli" href="" class="btn btn-blue" target="_blank"> Ver archivo adjunto</a></li>

                                                </ul>

                                                <div class="actions">
                                                    <div class="btn-group">
                                                     <?php if($tipo==1){ ?>  <button id="btncer" type="button" class="btn btn-default"><i class="fa fa-times"></i> Cerrar Ticket</button> <?php } ?>

                                                    </div>



                                                </div>
                                            </div>

                                            <div class="content" tabindex="5002" style="overflow: hidden; outline: none;">
                                                <div id="screenchat" style=" padding: 10px; height: 400px;  overflow: hidden; overflow-y: scroll ">


                                                </div>
                                                <div>
                                                    <form>
                                                        <textarea  class="form-control" id="input05" rows="6"></textarea>
                                                        <button id="modalarchivo" type="button" class="btn btn-warning" style="float: left">Ajuntar archivo</button>
                                                        <button id="btnenvmsj" type="button" class="btn btn-greensea">Enviar</button>

                                                    </form>
                                                </div>


                                            </div>

                                        </div>
                                    </div>


                                </div>



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
            <script type="text/javascript" src="assets/js/vendor/blockui/jquery.blockUI.js"></script>

            <script src="assets/js/vendor/summernote/summernote.min.js"></script>

            <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

            <script src="assets/js/vendor/momentjs/moment-with-langs.min.js"></script>
            <script src="assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>

            <script src="assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>

            <script src="assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>

            <script src="assets/js/minimal.min.js"></script>

            <script src="assets/js/jquery.uploadfile.min.js"></script>
            <script>


enlinea='';

                title = "Tienes un mensaje nuevo";
                more = {

                    body: "Hay un nuevo mensaje del chat"
                };

                title2 = "Nuevo cliente";
                more2 = {

                    body: "Hay un nuevo cliente en el chat"
                };

                function permission() {
                    Notification.requestPermission();
                }
                ;

                function showNotification() {
                    if (Notification) {

                        if (Notification.permission == "granted") {

                            var n = new Notification(title, more);
                            setTimeout(function () {
                                n.close()
                            }, 5000);
                            permission();
                        } else if (Notification.permission == "default") {
                            alert("Primero da los permisos de notificación");

                        } else {
                            alert("Bloqueaste los permisos de notificación");
                        }
                    } else {
                        alert("Tu navegador no es compatible con API Notification");
                    }
                }
                ;

                function nuevocliente() {
                    if (Notification) {

                        if (Notification.permission == "granted") {

                            var n = new Notification(title2, more2);
                            setTimeout(function () {
                                n.close()
                            }, 5000);
                            permission();
                        } else if (Notification.permission == "default") {
                            alert("Primero da los permisos de notificación");

                        } else {
                            alert("Bloqueaste los permisos de notificación");
                        }
                    } else {
                        alert("Tu navegador no es compatible con API Notification");
                    }
                }
                ;



                $(function () {
                    var msj = new Audio('1.mp3');
                    var nvocli = new Audio('2.mp3');
                    var nls = new Audio('3.mp3');

                    //setInterval(mostrarsesiones, 3000);
                    //
                    //

                    setInterval(function () {
                        $.ajax({url: "obtenersesiones.php",
                            type: 'GET',
                            success: function (result) {
                                $("#enlinea").html(result);
                                
                                //
                                if(enlinea!=result){
                                  
                                    enlinea=result;
                                
                                $.ajax({url: "asignasesiones.php",
                                    type: 'GET',
                                    success: function (result) {
                                      
                                        $("#mail-inbox").html(' <li class="heading"><h1>Inbox <br></h1></li>'+result);
                                        if (result != '') {
                                            nvocli.play();
                                           $('#chatAudio')[0].play();
                                        }
                                    }});}
                                $("#mail-inbox li.msg").each(function () {
                                    // alert($(this).attr("id"));
                                    var aborrar = $(this).attr("id");
                                    var parametros = {"cve_ses": $(this).attr("id")};
                                    $.ajax({url: "obtsester.php",
                                        type: 'GET',
                                        data: parametros,
                                        success: function (result) {
                                            if (result == '0') {
                                            } else {

                                                $("#" + aborrar).remove();
                                                $("#screenchat").html('');
                                                $("#correoc").text('');
                                                $("#telc").text('');
                                                $("#nombrec").text('');
                                                $("#archivocli").attr("href","");
                                                
                                                $("#categot").text('');
                                                $("#input05").val('');

                                            }


                                        }});
                                    $.ajax({url: "noleido.php",
                                        type: 'GET',
                                        data: parametros,
                                        success: function (result) {
                                            if (result != '0') {
                                                valnl = $("#nl" + aborrar).text();
                                                if (valnl != result) {
                                                    nls.play();
                                                   // showNotification();
                                                }
                                                $("#nl" + aborrar).text(result);

                                                //msj.play();
                                            } else {
                                                $("#nl" + aborrar).text('');



                                            }


                                        }});

                                });

                                ///       

                            }});
                    }, 3000);



                    setInterval(function () {

                        if (sesionsel == '') {
                        } else {
                            var parametros = {
                                "cve_ses": sesionsel};
                            $.ajax({url: "recibirmsj.php",
                                type: 'GET',
                                data: parametros,
                                success: function (result) {
                                    if (result == '') {
                                    } else {
                                        $("#screenchat").append(result);
                                        $('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
                                        msj.play();


                                    }


                                }});
                        }

                    }, 3000);



                    //////////////////////////////////////



                    $("#mail-inbox").on('click', 'li.msg', function () {
                        var oID = $(this).attr("id");
                        sesionsel = oID;
                        var parametros = {
                            "cve_ses": oID};

                        //"valorCaja1" : valorCaja1,
                        $.ajax({url: "mostrarchat.php",
                            type: 'GET',
                            data: parametros,
                            success: function (result) {

                                $("#screenchat").html(result);
                                //var $target = $('#screenchat'); 
                                $('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
                                $("#correoc").text(correoc);
                                $("#telc").text(telc);
                                $("#nombrec").text(nombrec);
                                $("#archivocli").attr("href",""+archivo);
                                $("#categot").text(categot);
                                $("#input05").val('');
                            }});


                    });

                    ////////////////////////

                    $("#btnenvmsj").click(function () {
                        if (sesionsel == '') {
                            alert("Seleccione al cliente para iniciar el Chat")
                        } else {
                            var msj1 = $("#input05").val();

                            var parametros = {
                                "cve_ses": sesionsel,
                                "msj": msj1
                            };
                            if (msj1.length === 0 || !msj1.trim()) {
                                $("#input05").val('');
                                $("#input05").focus();
                            } else {

                                //"valorCaja1" : valorCaja1,
                                $.ajax({url: "envmsj.php",
                                    type: 'GET',
                                    data: parametros,
                                    success: function (result) {
                                        $("#input05").val('');
                                        $("#input05").focus();
                                        $("#screenchat").append(result);
                                        $('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);


                                    }
                                });

                            }


                        }
                    });


                    $("#modalarchivo").click(function () {
                        //marcaelim = $(this).attr("dataidc");
                        // console.log(marcaelim);
                        if (sesionsel == '') {
                            alert("Seleccione al cliente para iniciar el Chat")
                        } else {
                            $('#agregararchivo').modal('show');
                            //$('#fileuploader').hide();
                        }
                    });

                    $("#fileuploader").uploadFile({
                        url: "uparcchat.php",
                        fileName: "myfile",
                        acceptFiles: " .pdf, .png, .jpg",
                        dynamicFormData: function ()
                        {
    //var data ="XYZ=1&ABCD=2";
                            var data = {"cve_ses": sesionsel};
                            //console.log(data);
                            return data;
                        },

                        onSuccess: function (files, data, xhr, pd)

                        {

                            $('#agregararchivo').modal('toggle');
                           // console.log(data);

                            $("#input05").val('');
                            $("#input05").focus();
                            $("#screenchat").append(data);
                            $('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
                            //console.log(data);

                            /*           
                             var parametros2 = {
                             "idcarpeta0": ingraiz
                                 
                             };
                             $.ajax({url: "creararbol.php",
                             type: 'GET',
                             data: parametros2,
                             success: function (result) {
                             $("#arbolcentral").html('');
                             $("#arbolcentral").html(result);
                                 
                             }
                             });*/
                        },

                    });


                    $("#btncer").click(function () {
                        if (sesionsel == '') {
                            alert("Seleccione al cliente para iniciar el Chat")
                        } else {


                            var parametros = {
                                "cve_ses": sesionsel

                            };


                            //"valorCaja1" : valorCaja1,
                            $.ajax({url: "cerses.php",
                                type: 'GET',
                                data: parametros,
                                success: function (result) {
                                    $("#" + sesionsel).remove();
                                    sesionsel = '';
                                    $("#screenchat").html('');
                                    $("#correoc").text('');
                                    $("#telc").text('');
                                    $("#nombrec").text('');
                                     $("#categot").text(categot);
                                    
                                    $("#input05").val('');
                                }
                            });




                        }
                    });





                    $("#input05").keypress(function (e) {
                        if (e.which == 13) {
                            // Acciones a realizar, por ej: enviar formulario.
                            if (sesionsel == '') {
                                alert("Seleccione al cliente para iniciar el Chat");
                            } else {
                                var msj1 = $("#input05").val();

                                var parametros = {
                                    "cve_ses": sesionsel,
                                    "msj": msj1
                                };
                                if (msj1.length === 0 || !msj1.trim()) {
                                    $("#input05").val('');
                                    $("#input05").focus();
                                } else {

                                    //"valorCaja1" : valorCaja1,
                                    $.ajax({url: "envmsj.php",
                                        type: 'GET',
                                        data: parametros,
                                        success: function (result) {
                                            $("#input05").val('');
                                            $("#input05").focus();
                                            $("#screenchat").append(result);
                                            $('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
                                        }
                                    });

                                }


                            }
                        }
                    });




                    /*
                         
                     $("#btnenvmsj").click(function () {
                     // var msjatn = $("#input05").val();
                         
                     alert("hola boton apretado");
                         
                         
                     var parametros = {
                     "cve_ses": sesionsel,
                     "msj": $("#msjatn").val()
                     };
                     if (msj.length === 0 || !msj.trim()) {
                     document.getElementById(mensaje).value = '';
                     document.getElementById(mensaje).focus();
                     } else {
                         
                     //"valorCaja1" : valorCaja1,
                     $.ajax({url: "envmsj.php",
                     type: 'GET',
                     data: parametros,
                     success: function (result) {
                     $("#msjatn").val() = '';
                     $("#screenchat").append(result);
                         
                     //$("#mail-content").html(result);
                     //var $target = $('#screenchat'); 
                     //$('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
                     }});
                         
                     }
                         
                     });
                         
                     */



                    ////////////////////////////////

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

                        //console.log(log);

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
?>