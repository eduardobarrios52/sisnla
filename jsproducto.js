$(function () {

    $('#claveprodserv').select2({
        minimumInputLength: 3,
        dataType: 'json',
        ajax: {
            url: 'getprodserv.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.desc,
                            id: item.id
                        }
                    })
                };
            }
        }
    });

    $('#claveprodserve').select2({
        minimumInputLength: 3,
        dataType: 'json',
        ajax: {
            url: 'getprodserv.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.desc,
                            id: item.id
                        }
                    })
                };
            }
        }
    });

    $('#claveuniprod').select2({
        minimumInputLength: 3,
        dataType: 'json',
        ajax: {
            url: 'getclaveunidadservicio.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.desc,
                            id: item.id
                        }
                    })
                };
            }
        }
    });

    $('#claveuniprode').select2({
        minimumInputLength: 3,
        dataType: 'json',
        ajax: {
            url: 'getclaveunidadservicio.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.desc,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
           
    $('#fileuploader').hide();
    var idproductoedit = 0;
    var idproductoelim = 0;
    var imgmarcaed = 0;
    $("#btnagregarc").on('click', function () {
        if ($("#Nombre").val().trim().length >= 1 ) {
            form = $('#agregar');
            
            $.ajax({url: "agregarproducto.php",
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
    
        $.ajax({url: "getdatos.php",
            type: 'GET',
            data: {'id': marcaeditnom,
                    'tipo': 'producto'},
            success: function (result) {
                    $("#idproducto").val(marcaeditnom);
                    $("#Nombree").val(result.nombre);
                    $("#claveuniprode").html('<option value="'+result['unidad']+'" selected="selected">'+result['unidadn']+'</option>');
                    $("#claveprodserve").html('<option value="'+result['claveprodserv']+'" selected="selected">'+result['servicio']+'</option>');
            }
        });
    
        $('#editartalla').modal('show');
    });
    
    $("#btneditartalla").click(function () {
    
        if ($("#Nombree").val().trim().length >= 1 ) {
            form = $('#editar');
    
            $.ajax({url: "editarproducto.php",
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
        idproductoedit = $(this).attr("dataidc");
        $('#modalactivar').modal('show');
    });
    
        $("#btnactivar").click(function () {
    
        var parametros = {
            "idproducto": idproductoedit
    
        };
        $.ajax({url: "activarproducto.php",
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
        idproductoelim = $(this).attr("dataidc");
        $('#modaleliminar').modal('show');
    });
    
    $("#btnmelimtalla").click(function () {
        var parametros = {
            "idproducto": idproductoelim
        };
        $.ajax({url: "eliminarproducto.php",
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
            "sEmptyTable": "Ning??n dato disponible en esta tabla",
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
                "sLast": "??ltimo",
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
    //$('.dataTables_length select').chosen({disable_search_threshold: 10});
    });