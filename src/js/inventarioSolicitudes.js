/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
//$(document).ready(function() {

  
   $('#confirm-delete').on('click', '.btn-ok', function(e) {
                    var $modalDiv = $(e.delegateTarget);
                    var id = $(this).data('recordId');
                    var tipo = $(this).data('recordTipo');
                    console.log(id+' '+tipo);
                    $.ajax({
                        data:'idPrestamoR='+id+'&tipo='+tipo,
                        url: "../control/ControlPrestamo.php", 
                        type: 'post',
                        success: function(data) {
                                location.reload();                           
                        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }
                      });
                    
                    
                    $modalDiv.addClass('loading');
                    setTimeout(function() {
                        $modalDiv.modal('hide').removeClass('loading');
                    }, 1000)
                });
    $('#confirm-delete').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();
        //alert(data.recordTitle);
        $('.title', this).text(data.recordTitle);
        $('.btn-ok', this).data('recordId', data.recordId);
        $('.btn-ok', this).data('recordTipo', data.recordTipo);
    });

    $('#confirm-aprobar').on('click', '.btn-ok', function(e) {
                    var $modalDiv = $(e.delegateTarget);
                    var id = $(this).data('recordId');
                    var tipo = $(this).data('recordTipo');
                    console.log(id+' '+tipo);
                    $.ajax({
                        data:'idPrestamoAS='+id+'&tipo='+tipo,
                        url: "../control/ControlPrestamo.php", 
                        type: 'post',
                        success: function(data) {
                                location.reload();                           
                        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }
                      });
                    
                    
                    $modalDiv.addClass('loading');
                    setTimeout(function() {
                        $modalDiv.modal('hide').removeClass('loading');
                    }, 1000)
                });
    $('#confirm-aprobar').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();
        //alert(data.recordTitle);
        $('.title', this).text(data.recordTitle);
        $('.btn-ok', this).data('recordId', data.recordId);
        $('.btn-ok', this).data('recordTipo', data.recordTipo);
    });


    $('#solicitudes').DataTable({
      "language": {
            "lengthMenu": "Mostrar _MENU_ filas por página",
            "zeroRecords": "No hay registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "search":"Buscar",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
      }
    });

 $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
           $('#msalida').val($('#cantidadMaterialEntregado').val());

          });




    $( "#formMaterialEntregado" ).validate( {
        rules: {
            recursoMaterial: "required",
            cantidadMaterialEntregado:{required:true,                                        
                                        min:1,
                                        number:true},         
        

        },
        messages: {
            recursoMaterial: "Este campo es obligatorio",
            cantidadMaterialEntregado: {required:"Este campo es obligatorio", 
           min:"La cantidad debe ser mayor a 0."},
           msalida:"La cantidad es mayor que la existencia del recurso"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
                                $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
                                $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    } );

 $( "#formHerramientaEntregada" ).validate( {
        rules: {
            recursoHerramienta: "required",
            cantidadHerramientaEntregada: {required:true,                                        
                                        min:1,
                                        number:true},            
        },
        messages: {
            recursoHerramienta: "Este campo es obligatorio",
            cantidadHerramientaEntregado: {required:"Este campo es obligatorio", 
             min:"La cantidad debe ser mayor a 0."},            
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
                                $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
                                $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    } );
    
    /////////MATERIAL//////////////////////////////////////////
     $('#btnRegistrarMaterialEntregado').click(function(){
         var recurso = $('#recursoMaterial').val();
         var existente = $('#mexistente').val();
         var msalida = $('#msalida').val();
         var idRecibe = $('#trabajadorRecibeMaterial').val();        
         var total = $('#cantidadMaterialEntregado').val();
         var tipo = "2";
         var estatus = "7";
         if ($( "#formMaterialEntregado" ).valid()){
           
             $.ajax({
                data: "recurso="+recurso+"&totalRecurso="+total+"&tipoTransaccion="+tipo+"&recibe="+idRecibe+"&max="+existente+"&estatus="+estatus,
                url: "../control/ControlInventario.php", 
                type: "post",
                success: function(result){
                   if(result == 0){   
                    //alert("as");
                    $('div').addClass('has-error ');
                     $("#msgMaterial2").html("La cantidad es mayor que la existencia del Recurso");
                     $("#msgMaterial2").css({'color':'red'});
                     $('#cantidadMaterialEntregado').focus();
                   }   else{
                    $("#msgMaterial2").html(" ");
                      $("#msgMaterial").css({'color':'green'});          
                       $('#formMaterialEntregado')[0].reset();
                       $('div').removeClass('has-error ');
                        $("#cantidadMaterialDisponible").html(" ");
                      $('div').removeClass('has-success ');
                      $('.help-block').remove();
                      $("#msgMaterial").html(result);
                      }
            },
                            error: function(jqXHR, textStatus, error) {
                                 alert('error: ' + jqXHR.responseText);
                            }});
       
            }  
       
   });


      $('#recursoMaterial').change(function() {


         if ($( "#recursoMaterial" ).val() > 0){
          var recurso = $('#recursoMaterial').val();
          
        $.ajax({
            data: "idRecurso="+recurso,
            url: "../control/ControlInventario.php", 
            type: "post",
            dataType: "json",
            cache: false,
            success: function(result){
              var msg =" ";
               total = result[0]['total'];
               if(total <= "0"){   
                $('#btnRegistrarMaterialEntregado').prop('disabled', true);
                $('#cantidadMaterialEntregado').prop('disabled', true);
                $("#cantidadMaterialDisponible").css({'color':'red'});
                 msg ="No hay "+result[0]['nombre']+" disponible para entregar.";
               }else{     
                $('#btnRegistrarMaterialEntregado').prop('disabled', false);

                $('#mexistente').val(total);
                 //$("#cantidadMaterialEntregado").rules("add", {max:total,messages: {max:"La cantidad es mayor que la existencia del recurso."}});
                 $('#cantidadMaterialEntregado').prop('disabled', false);
                msg ="Hay <b>"+total+ "</b> "+result[0]['nombre']+" en existencia.";
                 $("#cantidadMaterialDisponible").css({'color':'green'}); 
                 
              }
                  $("#cantidadMaterialDisponible").html(msg);

        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }});
        
      }  
        /* Act on the event */
      });


/////////HERRAMIENTA//////////////////////////////////////////
          $('#btnRegistrarHerramientaEntregada').click(function(){
         var recurso = $('#recursoHerramienta').val();
         var idRecibe = $('#trabajadorRecibe').val();         
         var existente = $('#hexistente').val();
         var total = $('#cantidadHerramientaEntregada').val();
         var tipo = "2";
         var estatus = "7";
         
         if ($( "#formHerramientaEntregada" ).valid()){
          
        $.ajax({
            data: "recurso="+recurso+"&totalRecurso="+total+"&tipoTransaccion="+tipo+"&recibe="+idRecibe+"&max="+existente+"&estatus="+estatus,
            url: "../control/ControlInventario.php", 
            type: "post",
            success: function(result){
               if(result == 0){   
                    //alert("as");
                    $('div').addClass('has-error ');
                     $("#msgHerramienta2").html("La cantidad es mayor que la existencia del Recurso");
                     $("#msgHerramienta2").css({'color':'red'});
                     $('#cantidadHerramientaEntregada').focus();
                   }   else{
                    $("#msgHerramienta2").html(" ");        
                  $("#msgHerramienta").css({'color':'green'})           
                   $('#formHerramientaEntregada')[0].reset();
                   $('div').removeClass('has-error ');
                  $('div').removeClass('has-success ');
                   $("#cantidadHerramientaDisponible").html(" ");
                  $('.help-block').remove();
                  $("#msgHerramienta").html(result);
                }

        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }});
        
      }  
    });

     $('#recursoHerramienta').change(function() {


         if ($( "#recursoHerramienta" ).val() > 0){
          var recurso = $('#recursoHerramienta').val();
          
        $.ajax({
            data: "idRecurso="+recurso,
            url: "../control/ControlInventario.php", 
            type: "post",
            dataType: "json",
            cache: false,
            success: function(result){
              var msg =" "; 
              var total = result[0]['total'];
               if(total <= "0"){    
                $('#btnRegistrarHerramientaEntregada').prop('disabled', true);
                $('#cantidadHerramientaEntregada').prop('disabled', true);
                $("#cantidadHerramientaDisponible").css({'color':'red'});
                 msg ="No hay "+result[0]['nombre']+" disponible para entregar.";
               }else{     

                $('#hexistente').val(total);
                 //$("#cantidadHerramientaEntregada").rules("add", {max:total,messages: {max:"La cantidad es mayor que la existencia del recurso."}});
                $('#btnRegistrarHerramientaEntregada').prop('disabled', false);
                $('#cantidadHerramientaEntregada').prop('disabled', false);
                msg ="Hay <b>"+total+ "</b> "+result[0]['nombre']+" en existencia.";
                 $("#cantidadHerramientaDisponible").css({'color':'green'}); 
              }
                  $("#cantidadHerramientaDisponible").html(msg);

        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }});
        
      }  
        /* Act on the event */
      });
      



    
 });

 



