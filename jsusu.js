
$(function () {
    var marcaelim = 0;
    var marcaeditnom = 0;
    var imgmarcaed = 0;


    $(".imagenenv").click(function () {
        fotoaeditar = $(this).attr("usuario");
        console.log(fotoaeditar);
        if (fotoaeditar == '') {
            alert("Seleccione al usuario para subir la foto")
        } else {
            $('#agregararchivo').modal('show');
            // $('#fileuploader').hide();
        }
    });

    $("#fotoimg").uploadFile({
        url: "upfoto.php",
        fileName: "myfile",
        acceptFiles: " .png, .jpg",
        dynamicFormData: function ()
        {
            //var data ="XYZ=1&ABCD=2";
            var data = {"cve_ses": fotoaeditar};
            //console.log(data);
            return data;
        },

        onSuccess: function (files, data, xhr, pd)

        {

            $('#agregararchivo').modal('toggle');
            // console.log(data);

            // $("#input05").val('');
            //$("#input05").focus();
            //$("#screenchat").append(data);
            //$('#screenchat').scrollTop($('#screenchat')[0].scrollHeight);
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




    $("#btnagregarc").on('click', function () {
        if ($("#anombre").val().trim().length >= 1 && $("#anome").val().trim().length >= 1) {

            var parametros = {
                "nombre": $("#anombre").val(),
                "apaterno": $("#aapaterno").val(),
                "amaterno": $("#aamaterno").val(),
                "nombre": $("#anombre").val(),
                "nome": $("#anome").val(),
                "descripcion": $("#adescripcion").val(),
                "contra": $("#acontra").val(),

                "telcasa": $("#atelcasa").val(),
                "celular": $("#acelular").val(),
                "alergia": $("#aalergia").val(),

                "curp": $("#curp").val(),
                "rfc": $("#rfc").val(),
                "nuser": $("#nuser").val(),
                "area": $("#acategoria").val(),
                "fecing": $("#fecing").val(),
                "domi": $("#domi").val(),
                "fecnac": $("#fecnac").val(),

                "zoom": $("#azoom").val(),
                "celularins": $("#acelularins").val(),
                "emailins": $("#aemailins").val(),

            };
            $.ajax({url: "agregartalla.php",
                type: 'GET',
                data: parametros,
                success: function (result) {
                    //console.log(result) ;
                    //$("#carpetas0").html('');
                    //$("#carpetas0").html(result);
                    //$("#nombree0").val('');
                    $("#anombre").val('');
                    $("#anome").val('');
                    $("#adescripcion").val('');
                    $("#acontra").val('');
                    location.reload();

                    //location.reload();

                    /* $.ajax({url: "tablatallas.php",
                     type: 'GET',
                     
                     success: function (result) {
                     $("#divcontable").html('');
                     $("#divcontable").html(result);
                     
                     
                     
                     }
                     });
                     */

                    /* $("#"+sesionsel).remove();
                     
                     $("#correoc").text('');
                     $("#telc").text('');
                     $("#nombrec").text('');
                     $("#input05").val('');
                     */
                    $('#agregartalla').modal('toggle');
                }
            });
        }
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
        $.ajax({url: "activarusu.php",
            type: 'GET',
            data: parametros,
            success: function (result) {
                console.log(result);
                if (result == "ok") {
                    //colorelim = 0;
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



        marcaeditnom = $(this).attr("dataidc");
        $("#enombre").val($("#tdnom" + marcaeditnom).html());
        $("#eapaterno").val($("#tdapat" + marcaeditnom).html());
        $("#eamaterno").val($("#tdamat" + marcaeditnom).html());
        $("#enome").val($("#tdnome" + marcaeditnom).html());

        $("#etelcasa").val($("#tdtelcasa" + marcaeditnom).html());
        $("#ecelular").val($("#tdcelular" + marcaeditnom).html());
        $("#ealergia").val($("#tdalergia" + marcaeditnom).html());


        $("#edescripcion").val($("#tddesc" + marcaeditnom).html());
        $("#econtra").val($("#tdcontra" + marcaeditnom).html());
        $("#ecurp").val($("#tdcurp" + marcaeditnom).html());
        $("#erfc").val($("#tdrfc" + marcaeditnom).html());
        if ($("#tdtipo" + marcaeditnom).html() == 'ADMINISTRADOR') {
            $("#enuser").val("1");
        } else if ($("#tdtipo" + marcaeditnom).html() == 'JEFE DE AREA') {
            $("#enuser").val("2");
        } else if ($("#tdtipo" + marcaeditnom).html() == 'SUBORDINADO') {
            $("#enuser").val("3");
        }
        areaedit = $("#tdarea" + marcaeditnom).attr("data-id");
        //console.log(areaedit);

        $("#ecategoria").val(areaedit);

        //$("#ecategoria").val()
        //$("#nuser").val($("#td" + marcaeditnom).html());
        $("#efecing").val($("#tdfecing" + marcaeditnom).html());
        $("#edomi").val($("#tddomi" + marcaeditnom).html());
        $("#efecnac").val($("#tdfecnac" + marcaeditnom).html());



        //btneditarmarca

        $('#editartalla').modal('show');
    });
    $("#btneditartalla").click(function () {

        if ($("#enombre").val().trim().length >= 1 && $("#enome").val().trim().length >= 1) {
//alert(marcaeditnom+$("#editarnombre").val());
            //$("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');


            var parametros = {
                "idtalla": marcaeditnom,
                "nombre": $("#enombre").val(),
                "apaterno": $("#eapaterno").val(),
                "amaterno": $("#eamaterno").val(),
                "nome": $("#enome").val(),
                "descripcion": $("#edescripcion").val(),

                "telcasa": $("#etelcasa").val(),
                "celular": $("#ecelular").val(),
                "alergia": $("#ealergia").val(),

                "contra": $("#econtra").val(),
                "curp": $("#ecurp").val(),
                "rfc": $("#erfc").val(),
                "nuser": $("#enuser").val(),
                "area": $("#ecategoria").val(),
                "fecing": $("#efecing").val(),
                "domi": $("#edomi").val(),
                "fecnac": $("#efecnac").val(),
                "zoom": $("#ezoom").val(),
                "celularins": $("#ecelularins").val(),
                "emailins": $("#eemailins").val()

            };
            $.ajax({url: "editartalla.php",
                type: 'GET',
                data: parametros,
                success: function (result) {
                    console.log(result);
                    if (result == "ok") {

                        //$("#carpetas0").html('');
                        //$("#carpetas0").html(result);
                        //$("#nombree0").val('');
                        marcaeditnom = 0;
                        location.reload();

                        /*
                         $.ajax({url: "tablatallas.php",
                         type: 'GET',
                         success: function (result) {
                         $("#divcontable").html('');
                         $("#divcontable").html(result);
                         
                         
                         }
                         });
                         */
                        $('#editartalla').modal('toggle');
                        $("#editarnombre").val('');
                        $("#editarnome").val('');
                        $("#editaredescripcion").val('');
                    }
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


    $(".elimmarca").click(function () {

        marcaelim = $(this).attr("dataidc");


        $('#modaleliminar').modal('show');



    });
    $("#btnmelimtalla").click(function () {

        //$("#carpetas0").append('<li class="list-group-item">' + $("#nombre0").val() + '</li>');

        var parametros = {
            "idtalla": marcaelim

        };
        $.ajax({url: "eliminartalla.php",
            type: 'GET',
            data: parametros,
            success: function (result) {
                //alert(result);
                if (result == "ok") {
                    location.reload();
                    colorelim = 0;
                    /* $.ajax({url: "tablatallas.php",
                     type: 'GET',
                     success: function (result) {
                     $("#divcontable").html('');
                     $("#divcontable").html(result);
                     }
                     });*/

                    $('#modaleliminar').modal('toggle');
                }
            }
        });
        $('#elimcolor').modal('toggle');

    });



    $('#fileuploader').hide();
    $('#nomarch').keyup(function ()
    {
        //alert('1');
        if ($(this).val().length != 0) {

            $('#fileuploader').show();


        } else {

            $('#fileuploader').hide();
        }

    });



    $("#basicDataTable").on('click', '.editimage', function () {

        imgmarcaed = $(this).attr("dataidc");

        $('#editarimgmarca').modal('show');



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
    var oTable01 = $('#basicDataTable').DataTable({ 

                                dom: 'Bfrtip',
                                buttons: [

                                    {extend: 'excel', className: 'btn btn-success margin-bottom-20'},

                                ],
                    
                paging: true,
                "scrollX": false,
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
                "aaSorting": [[0, 'asc'], [1, 'asc'], [2, 'asc']],  });



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
    