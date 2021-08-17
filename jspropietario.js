
     
             $(function () {
           
                $('#fileuploader').hide();
                var idpropietarioedit = 0;
                var idpropietarioelim = 0;
                var imgmarcaed = 0;
                $("#btnagregarc").on('click', function () {
                    if ($("#NombrePropietario").val().trim().length >= 1 ) {
                        form = $('#agregar');
                        
                        $.ajax({url: "agregarpropietario.php",
                            type: 'GET',
                            data: form.serialize(),
                            success: function (result) {
                                location.reload();
                            }
                        });
                    }
                });
    
    
                $("#btnmagr").on('click', function () {
                    $('#agregartalla').modal('show');
                });
                $(".edittitle").click(function () {
                    marcaeditnom = $(this).attr("dataidc");
    
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
    
                    if ($("#NombrePropietario").val().trim().length >= 1 ) {
                        form = $('#agregar');
    
                        $.ajax({url: "editarpropietario.php",
                            type: 'GET',
                            data: form.serialize(),
                            success: function (result) {
                                //alert(result);
                                if (result == "ok") {
                                    marcaeditnom = 0;
                                    location.reload();
                                } else {
    
                                }
    
                            }
                        });
                    } else {
    
                    }
                });
    
                
                $(".acivarmarca").click(function () {
                    idpropietarioedit = $(this).attr("dataidc");
                    $('#modalactivar').modal('show');
                });
    
                    $("#btnactivar").click(function () {
    
                    var parametros = {
                        "idpropietario": idpropietarioedit
    
                    };
                    $.ajax({url: "activarpropietario.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                            //alert(result);
                            if (result == "ok") {
                                colorelim = 0;
                                location.reload();
                            }
                        }
                    });
                    $('#elimcolor').modal('toggle');
                });
                
                
                $(".elimmarca").click(function () {
                    idpropietarioelim = $(this).attr("dataidc");
                    $('#modaleliminar').modal('show');
                });
    
                $("#btnmelimtalla").click(function () {
                    var parametros = {
                        "idpropietario": idpropietarioelim
                    };
                    $.ajax({url: "eliminarpropietario.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                            //alert(result);
                            if (result == "ok") {
                                colorelim = 0;
                                location.reload();
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