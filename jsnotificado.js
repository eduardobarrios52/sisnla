
     
             $(function () {
                $('#CodigoPostal').focusout(function() {
                    if($(this).val() ){
                        $.ajax({
                            url: 'codigopostal.php',
                            type: 'GET',
                            data: {	'CodigoPostal' : $(this).val(),
                                    },
                            success: function (result) {
                                if(result){
                                    $.each(result.edo, function(index, element){
                                        $('#Estado').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.mun, function(index, element){
                                        $('#Municipio').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.cod, function(index, element){
                                        $('#Colonia').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.loc, function(index, element){
                                        $('#Localidad').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })
                                }
                            }
                        })
                    }
                })

                $('#CodigoPostale').focusout(function() {
                    if($(this).val() ){
                        $.ajax({
                            url: 'codigopostal.php',
                            type: 'GET',
                            data: {	'CodigoPostal' : $(this).val(),
                                    },
                            success: function (result) {
                                if(result){
                                    $.each(result.edo, function(index, element){
                                        $('#Estadoe').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.mun, function(index, element){
                                        $('#Municipioe').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.cod, function(index, element){
                                        $('#Coloniae').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })

                                    $.each(result.loc, function(index, element){
                                        $('#Localidade').append($('<option>', {
                                            value: index,
                                            text: element
                                        }));
                                    })
                                }
                            }
                        })
                    }
                })
           
                $('#fileuploader').hide();
                var idnotificadoedit = 0;
                var idnotificadoelim = 0;
                var imgmarcaed = 0;
                $("#btnagregarc").on('click', function () {
                    if ($("#NombreNotificado").val().trim().length >= 1 ) {
                        form = $('#agregar');
                        
                        $.ajax({url: "agregarnotificado.php",
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
                            'tipo': 'notificado'},
                        success: function (result) {
                            $.ajax({
                                url: 'codigopostal.php',
                                type: 'GET',
                                data: {	'CodigoPostal' : result['CodigoPostal'],
                                        },
                                success: function (result2) {
                                    if(result2){
                                        $('#Estadoe').html('');
                                        $('#Municipioe').html('');
                                        $('#Coloniae').html('');
                                        $('#Localidade').html('');
                                        $.each(result2.edo, function(index, element){
                                            $('#Estadoe').append($('<option>', {
                                                value: index,
                                                text: element
                                            }));
                                        })
        
                                        $.each(result2.mun, function(index, element){
                                            $('#Municipioe').append($('<option>', {
                                                value: index,
                                                text: element
                                            }));
                                        })
        
                                        $.each(result2.cod, function(index, element){
                                            $('#Coloniae').append($('<option>', {
                                                value: index,
                                                text: element
                                            }));
                                        })
        
                                        $.each(result2.loc, function(index, element){
                                            $('#Localidade').append($('<option>', {
                                                value: index,
                                                text: element
                                            }));
                                        })
                                        
                                        $("#idnotificado").val(marcaeditnom);
                                        $("#NombreNotificadoe").val(result.NombreNotificado);
                                        $("#NumRegIdTribArrendatarioe").val(result['NumRegIdTribNotificado']);
                                        $("#ResidenciaFiscale").val(result['ResidenciaFiscalNotificado']);
                                        $("#Callee").val(result['Calle']);
                                        $("#NumeroExteriore").val(result['NumeroExterior']);
                                        $("#NumeroInteriore").val(result['NumeroInterior']);
                                        $("#CodigoPostale").val(result['CodigoPostal']);
                                        $("#Coloniae").val(result['Colonia']);
                                        $("#Localidade").val(result['Localidad']);
                                        $("#Referenciae").val(result['Referencia']);
                                        $("#Municipioe").val(result['Municipio']);
                                        $("#Estadoe").val(result['Estado']);
                                        $("#Paise").val(result['Pais']);
                                    }
                                }
                            })
                                
                                
                        }
                    });

                    $('#editartalla').modal('show');
                });
    
                $("#btneditartalla").click(function () {
    
                    if ($("#NombreNotificadoe").val().trim().length >= 1 ) {
                        form = $('#editar');
    
                        $.ajax({url: "editarnotificado.php",
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
                    idnotificadoedit = $(this).attr("dataidc");
                    $('#modalactivar').modal('show');
                });
    
                    $("#btnactivar").click(function () {
    
                    var parametros = {
                        "idnotificado": idnotificadoedit
    
                    };
                    $.ajax({url: "activarnotificado.php",
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
                    idnotificadoelim = $(this).attr("dataidc");
                    $('#modaleliminar').modal('show');
                });
    
                $("#btnmelimtalla").click(function () {
                    var parametros = {
                        "idnotificado": idnotificadoelim
                    };
                    $.ajax({url: "eliminarnotificado.php",
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