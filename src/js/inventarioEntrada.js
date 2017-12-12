/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
 $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });

//Recibido
    $('#formMaterialEntrante')[0].reset();
    $('#formHerramientaEntrante')[0].reset();    

    $( "#formMaterialEntrante" ).validate( {
        rules: {
            recursoMaterial: "required",
            cantidadMaterialEntrante: {required:true,
                                            min:1}          
        },
        messages: {
            recursoMaterial: "Este campo es obligatorio",
            cantidadMaterialEntrante: {required:"Este campo es obligatorio",min:"La cantidad debe ser mayor a 0"},          
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

 $( "#formHerramientaEntrante" ).validate( {
        rules: {
            recursoHerramienta: "required",
            cantidadHerramientaEntrante: {required:true,
                                            min:1}            
        },
        messages: {
            recursoHerramienta: "Este campo es obligatorio",
            cantidadHerramientaEntrante: {required:"Este campo es obligatorio",min:"La cantidad debe ser mayor a 0"},
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
    
    ////////////////////////////MATERIAL//////////////////////

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
               if(result[0]['total'] <= "0"){   
                $("#cantidadMaterialDisponible").css({'color':'red'});
                 msg ="No hay "+result[0]['nombre']+" en existencia.";
               }else{     
                msg ="Hay <b>"+result[0]['total']+ "</b> "+result[0]['nombre']+" en existencia.";
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
     $('#btnRegistrarMaterialEntrante').click(function(){
         var recurso = $('#recursoMaterial').val();
         
         var total = $('#cantidadMaterialEntrante').val();
         var tipo = "1";
         
         if ($( "#formMaterialEntrante" ).valid()){
          
        $.ajax({
            data: "recurso="+recurso+"&totalRecurso="+total+"&tipoTransaccion="+tipo,
            url: "../control/ControlInventario.php", 
            type: "post",
            success: function(result){
               //if(result != "0"){        
                  $("#msgMaterial").css({'color':'green'})           
                   $('#formMaterialEntrante')[0].reset();
                   $('div').removeClass('has-error ');
                  $('div').removeClass('has-success ');

                   $("#cantidadMaterialDisponible").html(" ");
                  $('.help-block').remove();
                  $("#msgMaterial").html(result);

        },
                        error: function(jqXHR, textStatus, error) {
                             alert('error: ' + jqXHR.responseText);
                        }});
        
      }  
    });


     ////////////////////////////HERRAMIENTA//////////////////////

          $('#btnRegistrarHerramientaEntrante').click(function(){
         var recurso = $('#recursoHerramienta').val();
         
         var total = $('#cantidadHerramientaEntrante').val();
         var tipo = "1";
         
         if ($( "#formHerramientaEntrante" ).valid()){
          
        $.ajax({
            data: "recurso="+recurso+"&totalRecurso="+total+"&tipoTransaccion="+tipo,
            url: "../control/ControlInventario.php", 
            type: "post",
            success: function(result){
               //if(result != "0"){        
                  $("#msgHerramienta").css({'color':'green'})           
                   $('#formHerramientaEntrante')[0].reset();

                   $("#cantidadHerramientaDisponible").html(" ");
                   $('div').removeClass('has-error ');
                  $('div').removeClass('has-success ');
                  $('.help-block').remove();
                  $("#msgHerramienta").html(result);

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
               if(result[0]['total'] <= "0"){   
                $("#cantidadHerramientaDisponible").css({'color':'red'});
                 msg ="No hay "+result[0]['nombre']+" disponible para entregar.";
               }else{     
                msg ="Hay <b>"+result[0]['total']+ "</b> "+result[0]['nombre']+" en existencia.";
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

 



