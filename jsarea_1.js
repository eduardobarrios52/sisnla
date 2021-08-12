 function borrararc(archivo) { 
             
             
                 var parametros = {
                    "idtalla": archivo

                };
                $.ajax({url: "eliminaarc.php",
                    type: 'GET',
                    data: parametros,
                    success: function (result) {
                        //alert(result);
                        console.log(result)
                        if (result == "ok") {
                        $("#tr"+archivo).hide(); 
        }
                    }
                });
                          
    
    }
     
             $(function () {
           
            $('#fileuploader').hide();
            var marcaelim = 0;
            var marcaeditnom = 0;
            var imgmarcaed = 0;
            $("#btnagregarc").on('click', function () {
                if ($("#anombre").val().trim().length >= 1 ) {




                    var parametros = {
                        "nombre": $("#anombre").val(),
                       
                        "descripcioemp": $("#descripcioemp").val(),
                        
                    };
                    $.ajax({url: "agregararea.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                           
                            $("#anombre").val('');
                          
                            $("#descripcioemp").val('');
                            location.reload();
                          
                            /*
                             * 
                             $.ajax({url: "tablacli.php",
                                type: 'GET',
                                success: function (result) {
                                    $("#basicDataTable").html('');
                                    $("#basicDataTable").html(result);
                                    //$("#nombrer").val('');
                                    



                                }
                            });
                            
                            $('#agregartalla').modal('toggle');
                                    */
                        }
                    });
                }
            });
            $("#btnmagr").on('click', function () {

                $("#guardanombrer").click(function () {
                    if ($("#nombrer").val().trim().length >= 1) {
                        // $("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');

                        var parametros = {
                            "nombre": $("#nombrer").val(),
                            "idpadre": ingraiz

                        };
                        $.ajax({url: "addcarpetar.php",
                            type: 'GET',
                            data: parametros,
                            success: function (result) {
                                //$("#carpetas0").html('');
                                //$("#carpetas0").html(result);
                                $("#nombrer").val('');
                                /* $("#"+sesionsel).remove();
                                 
                                 $("#correoc").text('');
                                 $("#telc").text('');
                                 $("#nombrec").text('');
                                 $("#input05").val('');
                                 */
                                var parametros2 = {
                                    "idcarpeta0": ingraiz

                                };
                                $.ajax({url: "creararbol.php",
                                    type: 'GET',
                                    data: parametros2,
                                    success: function (result) {
                                        $("#basicDataTable").html('');
                                        $("#basicDataTable").html(result);
                                        //$("#nombrer").val('');
                                        /* $("#"+sesionsel).remove();
                                         
                                         $("#correoc").text('');
                                         $("#telc").text('');
                                         $("#nombrec").text('');
                                         $("#input05").val('');
                                         */
                                    }
                                });
                            }
                        });
                        $('#creasubori').modal('toggle');
                    }
                });
                $('#agregartalla').modal('show');
            });
            $(".edittitle").click(function () {
                /*
                 
                 var IMMEX = 0;
                 var PROSEC = 0;
                 var DRAWBACK = 0;
                 var REGLAOCTAVA = 0;
                 var A = 0;
                 var AA = 0;
                 var AAA = 0;
                 var PADGENIMP = 0;
                 var PADSECIMP = 0;
                 var PADSEC3 = 0;
                 var OEA = 0;
                 var CTPAT = 0;
                 
                 
                 
                 if ($("#opt1").is(':checked')) {
                 IMMEX = 1;
                 }
                 if ($("#opt2").is(':checked')) {
                 PROSEC = 1;
                 }
                 if ($("#opt3").is(':checked')) {
                 DRAWBACK = 1;
                 }
                 if ($("#opt4").is(':checked')) {
                 REGLAOCTAVA = 1;
                 }
                 if ($("#opt5").is(':checked')) {
                 A = 1;
                 }
                 if ($("#opt6").is(':checked')) {
                 AA = 1;
                 }
                 if ($("#opt7").is(':checked')) {
                 AAA = 1;
                 }
                 if ($("#opt8").is(':checked')) {
                 PADGENIMP = 1;
                 }
                 if ($("#opt9").is(':checked')) {
                 PADSECIMP = 1;
                 }
                 if ($("#opt10").is(':checked')) {
                 PADSEC3 = 1;
                 }
                 if ($("#opt11").is(':checked')) {
                 OEA = 1;
                 }
                 if ($("#opt12").is(':checked')) {
                 CTPAT = 1;
                 }
                 
                 */
                marcaeditnom = $(this).attr("dataidc");

//var eopt1=$("#IMMEX" + marcaeditnom).html();
//cosole.log($("#IMMEX" + marcaeditnom).html());
//alert($("#IMMEX" + marcaeditnom).html());

                if ($("#IMMEX" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt1').prop('checked', true);
                } else {
                    $('#eopt1').prop('checked', false);
                }
                if ($("#PROSEC" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt2').prop('checked', true);
                } else {
                    $('#eopt2').prop('checked', false);
                }
                if ($("#DRAWBACK" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt3').prop('checked', true);
                } else {
                    $('#eopt3').prop('checked', false);
                }
                if ($("#REGLAOCTAVA" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt4').prop('checked', true);
                } else {
                    $('#eopt4').prop('checked', false);
                }
                if ($("#A" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt5').prop('checked', true);
                } else {
                    $('#eopt5').prop('checked', false);
                }
                if ($("#AA" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt6').prop('checked', true);
                } else {
                    $('#eopt6').prop('checked', false);
                }
                if ($("#AAA" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt7').prop('checked', true);
                } else {
                    $('#eopt7').prop('checked', false);
                }
                if ($("#PADGENIMP" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt8').prop('checked', true);
                } else {
                    $('#eopt8').prop('checked', false);
                }
                if ($("#PADSECIMP" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt9').prop('checked', true);
                } else {
                    $('#eopt9').prop('checked', false);
                }
                if ($("#PADSEC3" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt10').prop('checked', true);
                } else {
                    $('#eopt10').prop('checked', false);
                }
                if ($("#OEA" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt11').prop('checked', true);
                } else {
                    $('#eopt11').prop('checked', false);
                }
                if ($("#CTPAT" + marcaeditnom).html() == '<span class="badge badge-greensea">OK</span>') {
                    $('#eopt12').prop('checked', true);
                } else {
                    $('#eopt12').prop('checked', false);
                }



                $("#enombre").val($("#tdnom" + marcaeditnom).html());
                $("#erfc").val($("#tdrfc" + marcaeditnom).html());
                $("#enome").val($("#tdnome" + marcaeditnom).html());
                $("#edescripcion").val($("#tddesc" + marcaeditnom).html());
                $("#econtra").val($("#tdcontra" + marcaeditnom).html());
                //btneditarmarca
                //$("#").val($("#td" + marcaeditnom).html());
                //$("#").val($("#" + marcaeditnom).html());
                //$("#").val($("#" + marcaeditnom).html());
                $("#eC1NOM").val($("#C1NOM" + marcaeditnom).html());
                $("#eC1PUESTO").val($("#C1PUESTO" + marcaeditnom).html());
                $("#eC1MAIL").val($("#C1MAIL" + marcaeditnom).html());
                $("#eC2NOM").val($("#C2NOM" + marcaeditnom).html());
                $("#eC2PUESTO").val($("#C2PUESTO" + marcaeditnom).html());
                $("#eC2MAIL").val($("#C2MAIL" + marcaeditnom).html());
                $("#eC3NOM").val($("#C3NOM" + marcaeditnom).html());
                $("#eC3PUESTO").val($("#C3PUESTO" + marcaeditnom).html());
                $("#eC3MAIL").val($("#C3MAIL" + marcaeditnom).html());
                $("#eciudad").val($("#CIUDAD" + marcaeditnom).html());
                $("#eestado").val($("#ESTADO" + marcaeditnom).html());
                $("#edireccion").val($("#DIRECCiON" + marcaeditnom).html());
                $("#ecp").val($("#CP" + marcaeditnom).html());
                $("#edescripcioemp").val($("#DESCRIPCIOEMP" + marcaeditnom).html());


                $('#editartalla').modal('show');
            });
            $("#btneditartalla").click(function () {

                if ($("#enombre").val().trim().length >= 1 ) {
//alert(marcaeditnom+$("#editarnombre").val());
                    //$("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');

                    /*
                     var parametros = {
                     "idtalla": marcaeditnom,
                     "nombre": $("#enombre").val(),
                     "nome": $("#enome").val(),
                     "descripcion": $("#edescripcion").val(),
                     "contra": $("#econtra").val(),
                     };*/




                    var parametros = {
                        "idtalla": marcaeditnom,
                        "nombre": $("#enombre").val(),
                        "descripcioemp": $("#edescripcioemp").val()
                        

                    };


                    $.ajax({url: "editararea.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                            //alert(result);
                            if (result == "ok") {

                              
                                marcaeditnom = 0;
                                location.reload();
                                /*$.ajax({url: "tablacli.php",
                                    type: 'GET',
                                    success: function (result) {
                                        $("#basicDataTable").html('');
                                        $("#basicDataTable").html(result);
                                       
                                        $('#editartalla').modal('toggle');
                                $("#editarnombre").val('');
                                $("#editarnome").val('');
                                $("#editaredescripcion").val('');
                                    }
                                });
                                */
                            } else {

                            }
                            /* $("#"+sesionsel).remove();
                             
                             $("#correoc").text('');
                             $("#telc").text('');
                             $("#nombrec").text('');
                             $("#input05").val('');
                             */

                        }
                    });
                } else {

                }
            });
            $(".agregaarc").click(function () {
                marcaelim = $(this).attr("dataidc");
                // console.log(marcaelim);
                $('#agregararchivo').modal('show');
                //$('#fileuploader').hide();
            });
            
            $('#nomarch').keyup(function ()
            {
                //alert('1');
                console.log($('#nomarch').val().length);
                if ($(this).val().length != 0) {

                    $('#fileuploader').show();
                } else {

                    $('#fileuploader').hide();
                }

            });

            $("#fileuploader").uploadFile({
                url: "upintra.php",
                fileName: "myfile",
                acceptFiles: " .pdf, .png, .jpg",
                dynamicFormData: function ()
                {
//var data ="XYZ=1&ABCD=2";
                    var data = {"nombre": $('#nomarch').val(), "idcli": marcaelim};
                    return data;
                },

                onSuccess: function (files, data, xhr, pd)

                {
                    console.log(data);
                    
                    $('#agregararchivo').modal('toggle');
                    $('#fileuploader').hide();
                    $('#nomarch').val('');
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
$(".acivarmarca").click(function () {

                marcaelim = $(this).attr("dataidc");
                $('#modalactivar').modal('show');
            });
$("#btnactivar").click(function () {

                //$("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');

                var parametros = {
                    "idtalla": marcaelim

                };
                $.ajax({url: "activararea.php",
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
                $('#elimcolor').modal('toggle');
            });
            
            
            $(".elimmarca").click(function () {

                marcaelim = $(this).attr("dataidc");
                $('#modaleliminar').modal('show');
            });
            $("#btnmelimtalla").click(function () {

                //$("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');

                var parametros = {
                    "idtalla": marcaelim

                };
                $.ajax({url: "eliminararea.php",
                    type: 'GET',
                    data: parametros,
                    success: function (result) {
                        //alert(result);
                        if (result == "ok") {
                            colorelim = 0;
                            location.reload();
                           /* $.ajax({url: "tablacli.php",
                                type: 'GET',
                                success: function (result) {
                                    $("#basicDataTable").html('');
                                    $("#basicDataTable").html(result);
                                }
                            });
                            $('#modaleliminar').modal('toggle');*/
                        }
                    }
                });
                $('#elimcolor').modal('toggle');
            });



            $("#basicDataTable").on('click', '.editimage', function () {

                imgmarcaed = $(this).attr("dataidc");
                $('#editarimgmarca').modal('show');
            });
            $("#fileuploaderedit").uploadFile({
                url: "editarimgmarca.php",
                fileName: "myfile",
                acceptFiles: " .jpeg, .jpg, .png, .gif",
                dynamicFormData: function ()
                {
                    //var data ="XYZ=1&ABCD=2";
                    var data = {"nombre": imgmarcaed};
                    return data;
                },
                onSuccess: function (files, data, xhr, pd)

                {

                    $('#editarimgmarca').modal('toggle');
                    $('fileuploaderedit').hide();
                    imgmarcaed = 0;
                    $.ajax({url: "tablamarcas.php",
                        type: 'GET',
                        success: function (result) {
                            $("#basicDataTable").html('');
                            $("#basicDataTable").html(result);
                            //$("#nombrer").val('');
                            /* $("#"+sesionsel).remove();
                             
                             $("#correoc").text('');
                             $("#telc").text('');
                             $("#nombrec").text('');
                             $("#input05").val('');
                             */
                        }
                    });
                },
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
            $('#colorpicker').colorpicker();
            $('#colorpicker').colorpicker().on('showPicker', function (e) {
                var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 45;
                $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
            });
            /* Add a click handler to the rows - this could be used as a callback */
           
            /* Build the DataTable with third column using our custom sort functions */
            var oTable01 = $('#basicDataTable1').dataTable({
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
                "aaSorting": [[0, 'asc'], [1, 'asc'], [2, 'asc']],
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
     });