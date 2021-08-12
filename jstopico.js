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
                       "area": $("#aarea").val(),
                        "descripcioemp": $("#descripcioemp").val(),
                        
                    };
                    $.ajax({url: "agregartopico.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                          // console.log(result);
                            $("#anombre").val('');
                           $("#aarea").val(''),
                            $("#descripcioemp").val('');
                            //location.reload();
                          
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
               
                marcaeditnom = $(this).attr("dataidc");

//var eopt1=$("#IMMEX" + marcaeditnom).html();
//cosole.log($("#IMMEX" + marcaeditnom).html());
//alert($("#IMMEX" + marcaeditnom).html());

               


                $("#enombre").val($("#tdnom" + marcaeditnom).html());
                
                $("#edescripcion").val($("#tddesc" + marcaeditnom).html());
                
                areaedit=$("#tdarea" + marcaeditnom).attr("data-id");
        console.log(areaedit);
        
        $("#ecategoria").val(areaedit);

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
                        "area": $("#ecategoria").val(),
                        "descripcioemp": $("#edescripcion").val()
                        

                    };


                    $.ajax({url: "editartopico.php",
                        type: 'GET',
                        data: parametros,
                        success: function (result) {
                           // alert(result);
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
                $.ajax({url: "activartopico.php",
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
                $.ajax({url: "eliminartopico.php",
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