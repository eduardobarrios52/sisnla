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
                        <h2><i class="fa fa-user" style="line-height: 48px;padding-left: 0;"></i> Usuarios </h2>
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
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <h1><strong>Agregar</strong> Usuario</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInput">Nombre</label>
                                                        <input type="text" class="form-control" id="anombre">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="exampleInput">A. Paterno</label>
                                                        <input type="text" class="form-control" id="aapaterno">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">A. Materno</label>
                                                        <input type="text" class="form-control" id="aamaterno">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">CURP</label>

                                                        <input type="text" class="form-control" id="curp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">RFC</label>

                                                        <input type="text" class="form-control" id="rfc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Domicilio</label>

                                                        <input type="text" class="form-control" id="domi">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="domi">Tel. casa</label>

                                                        <input type="text" class="form-control" id="atelcasa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Celular</label>

                                                        <input type="text" class="form-control" id="acelular">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Alergias</label>

                                                        <input type="text" class="form-control" id="aalergia">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInput">Fecha de nacimiento</label>

                                                        <input type="date" class="form-control" id="fecnac">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInput">Puesto</label>
                                                        <input type="text" class="form-control" id="anome">
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label for="nuser" class="col-sm-4 control-label">Nivel de Usuario</label>
                                                        <div class="col-sm-8">
                                                            <select class="chosen-select chosen-transparent form-control" id="nuser">
                                                                <option value="1">ADMINISTRADOR</option>
                                                                <option value="2">JEFE  DE AREA</option>
                                                                <option value="3">SUBORDINADO</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     <div class="form-group">
                                                  
                                                    <label  for="exampleFormControlSelect1">Area</label>
                                                    <select name="acategoria" class="form-control" id="acategoria">
                                                     
                                                        <?php 
                                                         $consulsel = 'SELECT * FROM area where activo =1;';
                                                                $resel = $mysqli->query($consulsel);
                                                                while ($rss = $resel->fetch_assoc()) {
                                                                    
                                                                        echo '<option  value="' . $rss['idarea'] . '">' . $rss['nombre'] . ' </option>';
                                                                    
                                                                }
                                                        ?>
                                                        
                                                        
                                                      
                                                    </select>
                                                </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInput">Email</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="adescripcion">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInput">Fecha de ingreso</label>

                                                        <input type="date" class="form-control" id="fecing">
                                                    </div>
                                                    


                                                    <div class="form-group">
                                                        <label for="exampleInput">Contraseña</label>

                                                        <input type="text" class="form-control" id="acontra">
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Id Zoom</label>

                                                        <input type="text" class="form-control" id="azoom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Celular Institucional</label>

                                                        <input type="text" class="form-control" id="acelularins">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Email Insttucional</label>

                                                        <input type="text" class="form-control" id="aemailins">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Foto</label>

                                                        <input type="text" class="form-control" id="afoto">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                        <button id="btnagregarc" type="button" class="btn btn-greensea">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    
                                    
                                    
                                    
                                    <div class="modal fade" id="modalactivar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Activar</strong> Usuario</h3>
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
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <h1><strong>Editar</strong> Usuario</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInput">Nombre</label>
                                                        <input type="text" class="form-control" id="enombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">A. Paterno</label>
                                                        <input type="text" class="form-control" id="eapaterno">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">A. Materno</label>
                                                        <input type="text" class="form-control" id="eamaterno">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">CURP</label>

                                                        <input type="text" class="form-control" id="ecurp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">RFC</label>

                                                        <input type="text" class="form-control" id="erfc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Domicilio</label>

                                                        <input type="text" class="form-control" id="edomi">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="domi">Tel. casa</label>

                                                        <input type="text" class="form-control" id="etelcasa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Celular</label>

                                                        <input type="text" class="form-control" id="ecelular">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domi">Alergias</label>

                                                        <input type="text" class="form-control" id="ealergia">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInput">Fecha de nacimiento</label>

                                                        <input type="date" class="form-control" id="efecnac">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInput">Puesto</label>
                                                        <input type="text" class="form-control" id="enome">
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label for="nuser" class="col-sm-4 control-label">Nivel de Usario</label>
                                                        <div class="col-sm-8">
                                                            <select class="chosen-select chosen-transparent form-control" id="enuser">
                                                                <option value="1">ADMINISTRADOR</option>
                                                                <option value="2">JEFE  DE AREA</option>
                                                                <option value="3">SUBORDINADO</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     <div class="form-group">
                                                  
                                                    <label  for="exampleFormControlSelect1">Area</label>
                                                    <select name="ecategoria" class="form-control" id="ecategoria">
                                                     
                                                        <?php 
                                                         $consulsel = 'SELECT * FROM area where activo =1;';
                                                                $resel = $mysqli->query($consulsel);
                                                                while ($rss = $resel->fetch_assoc()) {
                                                                    
                                                                        echo '<option  value="' . $rss['idarea'] . '">' . $rss['nombre'] . ' </option>';
                                                                    
                                                                }
                                                        ?>
                                                        
                                                        
                                                      
                                                    </select>
                                                </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInput">Email</label>
                                                        <!-- <textarea class="form-control" id="descripcion" rows="6"></textarea> -->
                                                        <input type="text" class="form-control" id="edescripcion">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInput">Fecha de ingreso</label>

                                                        <input type="date" class="form-control" id="efecing">
                                                    </div>
                                                    


                                                    <div class="form-group">
                                                        <label for="exampleInput">Contraseña</label>

                                                        <input type="text" class="form-control" id="econtra">
                                                    </div>
                                                    
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Id Zoom</label>

                                                        <input type="text" class="form-control" id="ezoom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Celular Institucional</label>

                                                        <input type="text" class="form-control" id="ecelularins">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Email Insttucional</label>

                                                        <input type="text" class="form-control" id="eemailins">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput">Foto</label>

                                                        <input type="text" class="form-control" id="efoto">
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                                        <button id="btneditartalla" type="button" class="btn btn-greensea">Editar</button>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 


                            <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                            <h3 class="modal-title" id="modalConfirmLabel"><strong>Desactivar</strong> Usuario</h3>
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
                                                    <th>A. PATERNO</th>
                                                    <th>A. MATERNO</th>
                                                     <th>PUESTO</th>
                                                    <th>EMAIL</th>
                                                    <th>CONTRASEÑA</th>
                                                    <th>TEL. CASA</th>
                                                    <th>CELULAR</th>
                                                    <th>ALERGIAS</th>
                                                    <th>FECHA INGRESO</th>
                                                    <th>FECHA DE NACIMIENTO</th>
                                                    <th>CURP</th>
                                                    <th>RFC</th>
                                                    <th>AREA</th>
                                                    <th>DOMICILIO</th>
                                                    <th>TIPO</th>
                                                    <th>EDITAR</th>
                                                    <th>DESACTIVAR</th>
                                                    <th>Id ZOOM</th>
                                                    <th>CELULAR INSTITUCIONAL</th>
                                                    <th>EMAIL INSTITUCIONAL</th>
                                                    <th>FOTO</th>
                                                    <th>AGREGAR FOTO</th>
                                                    <th>VER VipCard</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'conexion.php';

                                                $consulta = "SELECT * FROM ususis  ORDER BY activo, nombre";

                                                //$resultadocolp = $mysqli->query($consulta3);
                                                $res = $mysqli->query($consulta);
                                                $num = $res->num_rows;
                                                if ($num >= 1) {

                                                    while ($rs = $res->fetch_assoc()) {
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td id="tdnom<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['nombre']; ?></td>
                                                            <td id="tdapat<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['apaterno']; ?></td>
                                                            <td id="tdamat<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['amaterno']; ?></td>
                                                            <td id="tdnome<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['puesto']; ?></td>
                                                            <td id="tddesc<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['email']; ?></td>
                                                            <td id="tdcontra<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['contra']; ?></td>
                                                            
                                                            <td id="tdtelcasa<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['telcasa']; ?></td>
                                                            <td id="tdcelular<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['celular']; ?></td>
                                                            <td id="tdalergia<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['alergia']; ?></td>
                                                            
                                                            <td id="tdfecing<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['fechaingreso']; ?></td>
                                                            <td id="tdfecnac<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['fechanaci']; ?></td>
                                                            <td id="tdcurp<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['curp']; ?></td>
                                                            <td id="tdrfc<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['rfc']; ?></td>
                                                            <td id="tdarea<?php echo utf8_encode($rs['idusuarios']); ?>" data-id="<?php echo $rs['area']; ?>"><?php
                                                            $consulsel = 'SELECT * FROM area where activo =1 and idarea='.$rs['area'];
                                                                $resel = $mysqli->query($consulsel);
                                                                while ($rss = $resel->fetch_assoc()) {
                                                                    
                                                                        echo $rss['nombre'] ;
                                                                    
                                                                }
                                                            ?></td>
                                                            <td id="tddomi<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['domicilio']; ?></td>
                                                            <td id="tdtipo<?php echo utf8_encode($rs['idusuarios']); ?>"><?php if($rs['tipo']=='1'){echo 'ADMINISTRADOR';}else if($rs['tipo']=='2'){echo 'JEFE DE AREA';} else if($rs['tipo']=='3'){echo 'SUBORDINADO';}  ?></td>
                                                            <td><button dataidc="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn edittitle btn-warning margin-bottom-20">Editar Usuario</button></td>
                                                            <td><?php if($rs['activo']==1){ ?><button dataidc="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn elimmarca btn-danger margin-bottom-20">Desactivar Usuario</button><?php }else{?><button dataidc="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn acivarmarca btn-green margin-bottom-20">Activar Usuario</button> <?php } ?></td>
                                                        
                                                             <td id="tdzoom<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['zoom']; ?></td>
                                                            <td id="tdcelularins<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['celularins']; ?></td>
                                                            <td id="tdemailins<?php echo utf8_encode($rs['idusuarios']); ?>"><?php echo $rs['emailins']; ?></td>
                                                            <td><?php if($rs['foto']!=""){ ?><img style="width: 64px;" src="fotos/<?php echo utf8_encode($rs['foto']);
                                                            ?>"><?php } ?></td>
                                                            <td><button usuario="<?php echo utf8_encode($rs['idusuarios']); ?>" type="button" class="btn btn-warning imagenenv" style="float: left">Agregar imagen</button></td>
                                                            <td><a target="_blank" href="https://mxcli.com.mx/cardvip.php?id=<?php echo utf8_encode($rs['idusuarios']); ?>">VipCard <i class="fa fa-search"></i></a></td>
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
   
    <script src="jsusu.js"></script>
    
    

    
</body>
</html>
 <?php
} else {
    header('Location: index.php');
}    