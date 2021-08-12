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
                        <h2><i class="fa fa-users" style="line-height: 48px;padding-left: 0;"></i> Clientes </h2>
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
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <h1><strong>Agregar</strong> Cliente</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInput">Nombre o Razon social</label>
                                                        <input type="text" class="form-control" id="anombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">RFC</label>
                                                        <input type="text" class="form-control" id="rfc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Correo</label>
                                                        <input type="text" class="form-control" id="anome">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Telefono</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="adescripcion">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Direccion</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="adireccion">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Ciudad</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="aciudad">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Estado</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="aestado">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Codigo Postal</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="acp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Contraseña</label>

                                                        <input type="text" class="form-control" id="acontra">
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">PROGRAMA FOMENT</label>
                                                        <div class="col-sm-8">
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt1" >
                                                                <label style="color: #717171;" for="opt1">IMMEX</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt2">
                                                                <label style="color: #717171;" for="opt2">PROSEC</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt3">
                                                                <label style="color: #717171;" for="opt3">DRAWBACK</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt4">
                                                                <label style="color: #717171;" for="opt4">REGLA OCTAVA</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">CERTIFICACION IVA IEPS </label>
                                                        <div class="col-sm-8">
                                                            <div class="radio radio-transparent">
                                                                <input type="radio" value="1" id="opt5" name="ceriva"  >
                                                                <label style="color: #717171;" for="opt5">A</label>
                                                            </div>
                                                            <div class="radio radio-transparent">
                                                                <input type="radio" value="2" id="opt6" name="ceriva" >
                                                                <label style="color: #717171;" for="opt6">AA</label>
                                                            </div>
                                                            <div class="radio radio-transparent">
                                                                <input type="radio" value="3" id="opt7" name="ceriva" >
                                                                <label style="color: #717171;" for="opt7">AAA</label>
                                                            </div>

                                                        </div>
                                                    </div>




                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">PADRON </label>
                                                        <div class="col-sm-8">
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt8" >
                                                                <label style="color: #717171;" for="opt8">PADRON GENERAL DE IMPORTADORES</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt9">
                                                                <label style="color: #717171;" for="opt9">PADRON SECTORIAL DE IMPORTADORES</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt10">
                                                                <label style="color: #717171;" for="opt10">PADRON SECTORIAL DE EXPORTADORES</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <hr>


                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">OTRAS CERTIFICACIONES </label>
                                                        <div class="col-sm-8">
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt11">
                                                                <label style="color: #717171;" for="opt11">OEA</label>
                                                            </div>
                                                            <div class="checkbox check-transparent">
                                                                <input type="checkbox" value="1" id="opt12">
                                                                <label style="color: #717171;" for="opt12">CTPAT</label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">CONTACTO #1</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Nombre</label>
                                                            <input type="text" class="form-control" id="C1NOM">
                                                        </div>
                                                        <label for="exampleInput">Correo</label>
                                                        <input type="text" class="form-control" id="C1MAIL">

                                                        <label for="exampleInput">Puesto</label>

                                                        <input type="text" class="form-control" id="C1PUESTO">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">CONTACTO #2</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Nombre</label>
                                                            <input type="text" class="form-control" id="C2NOM">
                                                        </div>
                                                        <label for="exampleInput">Correo</label>
                                                        <input type="text" class="form-control" id="C2MAIL">

                                                        <label for="exampleInput">Puesto</label>

                                                        <input type="text" class="form-control" id="C2PUESTO">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">CONTACTO #3</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Nombre</label>
                                                            <input type="text" class="form-control" id="C3NOM">
                                                        </div>
                                                        <label for="exampleInput">Correo</label>
                                                        <input type="text" class="form-control" id="C3MAIL">

                                                        <label for="exampleInput">Puesto</label>

                                                        <input type="text" class="form-control" id="C3PUESTO">

                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">DESCRIPCION DE LA EMPRESA</label>

                                                        <div class="form-group">
                                                            <label for="exampleInput">Descripcion</label>

                                                            <input type="text" id="descripcioemp" class="form-control">

                                                        </div>

                                                    </div>







                                                    <div class="modal-footer">
                                                        <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                        <button id="btnagregarc" type="button" class="btn btn-greensea">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </section>
                            </div><!-- /.modal --> 

                            <div class="modal fade" id="editartalla" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h1><strong>Editar</strong> Cliente</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInput">Nombre o Razon social</label>
                                                <input type="text" class="form-control" id="enombre">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">RFC</label>
                                                <input type="text" class="form-control" id="erfc">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Correo</label>
                                                <input type="text" class="form-control" id="enome">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Telefono</label>
                                                <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                <input type="text" class="form-control" id="edescripcion">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Direccion</label>
                                                <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                <input type="text" class="form-control" id="edireccion">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Ciudad</label>
                                                <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                <input type="text" class="form-control" id="eciudad">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Estado</label>
                                                <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                <input type="text" class="form-control" id="eestado">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Codigo Postal</label>
                                                <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                <input type="text" class="form-control" id="ecp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInput">Contraseña</label>

                                                <input type="text" class="form-control" id="econtra">
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">PROGRAMA FOMENT</label>
                                                <div class="col-sm-8">
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt1" >
                                                        <label style="color: #717171;" for="eopt1">IMMEX</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt2">
                                                        <label style="color: #717171;" for="eopt2">PROSEC</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt3">
                                                        <label style="color: #717171;" for="eopt3">DRAWBACK</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt4">
                                                        <label style="color: #717171;" for="eopt4">REGLA OCTAVA</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">CERTIFICACION IVA IEPS </label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-transparent">
                                                        <input type="radio" value="1" id="eopt5" name="ceriva" >
                                                        <label style="color: #717171;" for="eopt5"  >A</label>
                                                    </div>
                                                    <div class="radio radio-transparent">
                                                        <input type="radio" value="2" id="eopt6" name="ceriva" >
                                                        <label style="color: #717171;" for="eopt6"  >AA</label>
                                                    </div>
                                                    <div class="radio radio-transparent">
                                                        <input type="radio" value="3" id="eopt7" name="ceriva" >
                                                        <label style="color: #717171;" for="eopt7">AAA</label>
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">PADRON </label>
                                                <div class="col-sm-8">
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt8" >
                                                        <label style="color: #717171;" for="eopt8">PADRON GENERAL DE IMPORTADORES</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt9">
                                                        <label style="color: #717171;" for="eopt9">PADRON SECTORIAL DE IMPORTADORES</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt10">
                                                        <label style="color: #717171;" for="eopt10">PADRON SECTORIAL DE EXPORTADORES</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <hr>


                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">OTRAS CERTIFICACIONES </label>
                                                <div class="col-sm-8">
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt11">
                                                        <label style="color: #717171;" for="eopt11">OEA</label>
                                                    </div>
                                                    <div class="checkbox check-transparent">
                                                        <input type="checkbox" value="1" id="eopt12">
                                                        <label style="color: #717171;" for="eopt12">CTPAT</label>
                                                    </div>


                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">CONTACTO #1</label>

                                                <div class="form-group">
                                                    <label for="exampleInput">Nombre</label>
                                                    <input type="text" class="form-control" id="eC1NOM">
                                                </div>
                                                <label for="exampleInput">Correo</label>
                                                <input type="text" class="form-control" id="eC1MAIL">

                                                <label for="exampleInput">Puesto</label>

                                                <input type="text" class="form-control" id="eC1PUESTO">

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">CONTACTO #2</label>

                                                <div class="form-group">
                                                    <label for="exampleInput">Nombre</label>
                                                    <input type="text" class="form-control" id="eC2NOM">
                                                </div>
                                                <label for="exampleInput">Correo</label>
                                                <input type="text" class="form-control" id="eC2MAIL">

                                                <label for="exampleInput">Puesto</label>

                                                <input type="text" class="form-control" id="eC2PUESTO">

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">CONTACTO #3</label>

                                                <div class="form-group">
                                                    <label for="exampleInput">Nombre</label>
                                                    <input type="text" class="form-control" id="eC3NOM">
                                                </div>
                                                <label for="exampleInput">Correo</label>
                                                <input type="text" class="form-control" id="eC3MAIL">

                                                <label for="exampleInput">Puesto</label>

                                                <input type="text" class="form-control" id="eC3PUESTO">

                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">DESCRIPCION DE LA EMPRESA</label>

                                                <div class="form-group">
                                                    <label for="exampleInput">Descripcion</label>

                                                    <input type="text" id="edescripcioemp" class="form-control">

                                                </div>

                                            </div>



                                            <div class="modal-footer">
                                                <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                <button id="btneditartalla" type="button" class="btn btn-greensea">Agregar</button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 


                            <div class="modal fade" id="modalactivar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Activar</strong> Cliente</h3>
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
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Desactivar</strong> Cliente</h3>
                                        </div>
                                        <div class="modal-body">


                                            <section class="tile transparent">



                                                <div class="jumbotron bg-transparent-black-3">

                                                    <div class="container text-center">
                                                        <h1>Desactivar <i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i><i class="fa fa-exclamation"></i></h1>
                                                        <p>¿Desea Desactivar el elemento seleccionado?</p>
                                                        <p><button id="btnmelimtalla" class="btn btn-red btn-large">Eliminar</button></p>
                                                    </div>

                                                </div>


                                            </section>




                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 
                            <div class="modal fade" id="agregararchivo" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Menu </strong>Intranet</h3>
                                        </div>
                                        <div class="modal-body">


                                            <div class="form-group">
                                                <label for="exampleInput">Nombre del archivo</label>
                                                <input type="text" class="form-control" id="nomarch">
                                                
                                            </div> 
                                            <br><br><br>
                                            <div class="form-group">
                                                        <label for="nuser" class="col-sm-4 control-label">Tipo de archivo</label>
                                                        <div class="col-sm-8">
                                                            <select class="chosen-select chosen-transparent form-control" id="tipoarc">
                                                                <option value="1">CONTRATO</option>
                                                                <option value="2">ARCHIVO GENERAL</option>
                                                                
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                             <br><br><br>
                                            <div class="form-group">

                                                <div id="fileuploader">Upload</div>
                                            </div>



                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            
                            <div class="modal fade" id="agregardrop" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Menu </strong>Intranet</h3>
                                        </div>
                                        <div class="modal-body">


                                            <div class="form-group">
                                                <label for="exampleInput">Nombre del Carpeta</label>
                                                <input type="text" class="form-control" id="nomarchd">
                                                
                                            </div> 
                                            <br><br><br>
                                            <div class="form-group">
                                                <label for="exampleInput">URL</label>
                                                <input type="text" class="form-control" id="urld">
                                                
                                            </div> 
                                           
                                             <br><br><br>
                                            <div class="form-group">

                                                
                                                <button id="gdrop" type="button" class="btn btn-success margin-bottom-20">Guardar carpeta</button>
                                            </div>



                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            

                            <section class="tile color transparent-black">

                                <div class="tile-body color transparent-black rounded-corners">
                                    <button id="btnmagr" type="button" class="btn btn-greensea">Agregar</button>
                                    <br><br><br>
                                    <div class="table-responsive">
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
                                                     <th>AGREGAR CARPETA DROPBOX</th>
                                                    <th>ARCHIVOS DE DROPBOX</th>
                                                    
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
                                                                            <td><button dataidc="<?php echo utf8_encode($rs['CVE_CLI']); ?>" type="button" class="btn agregadrop btn-success margin-bottom-20">Agregar Carp. DROPBOX</button></td>
<td class="text-center ">
                                                                                                                                                                <a href="#n<?php echo utf8_encode($rs['CVE_CLI']); ?>" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-search"></i></a>
                                                                                <div class="modal fade" id="n<?php echo utf8_encode($rs['CVE_CLI']); ?>" tabindex="-1" role="dialog" aria-labelledby="modalDialogLabel" aria-hidden="true" style="display: none;">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                                                                <h3 class="modal-title" id="modalDialogLabel"><strong>Vista Rapida</strong> de Carpetas</h3>
                                                                                                <section class="tile">
                                                                                                    <!-- tile header -->
                                                                                                    <div class="tile-header">
                                                                                                        <h3>Carpetas de Dropbox del cliente <strong><?php echo $rs['NOMBRE']; ?></strong> </h3>
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
                                                                                                                $consultaar2 = 'SELECT * FROM archivosdrop where idcli=\'' . $rs['CVE_CLI'] . '\' and estatus=\'' . $A . '\'  order by fecha';
                                                                                                                echo $consultaar2;
                                                                                                                
                                                                                                                $resar2 = $mysqli->query($consultaar2);
                                                $numar2 = $resar2->num_rows;
                                                echo 'num '.$numar2;
                                                if ($numar2 == 0) {
                                                    
                                                    echo '<tr>
                                                                                                                    <td>0 Archivos Encontrados</td>
                                                                                                                    

                                                                                                                </tr>';
                                                }else{ 
                                                    
                                                    
                                                     while ($rsar2 = $resar2->fetch_assoc()) {
                                                         
                                                         echo '<tr id="tr'.$rsar2['idarchivosdrop'].'">';
                                                         echo ' <td>'.$rsar2['nombre'].'</td>';
                                                         echo ' <td><a href="'.$rsar2['ruta'].'" target="_blank" role="button" class="btn btn-info" >Ver archivo</a></td>';
                                                          echo ' <td><button  dataidc="'.$rsar2['idarchivosdrop'].'" target="_blank" role="button" class="btn btn-red" onclick="borrardrop('.$rsar2['idarchivosdrop'].')" >Borrar archivo</button> </td>';
                                                         echo '</tr>';
                                                         
                                                     }
                                                    }
                                                                                                                
                                                                                                                
                                                                                                                
                                                                                                                
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

    <script src="jscli.js"></script>
</body>
</html>
 <?php
} else {
    header('Location: index.php');
}    