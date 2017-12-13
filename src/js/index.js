/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
  
      $( "#formIndex" ).validate( {
        rules: {
            usuario: "required",
            clave: "required",
            correo: "required",            
        },
        messages: {
            usuario: "Este campo es obligatorio",
            clave: "Este campo es obligatorio",
            correo: "Introduzca el correo",            
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
            $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
                                $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                                $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    } );

      if($("#formRecuperar").length){
          $( "#formRecuperar" ).validate( {
            rules: {
                correo: "required",            
            },
            messages: {
                correo: "Introduzca el correo",            
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
                $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
                                    $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                                    $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
            }
        } );
    }
    
 });
 
 $('#btnRegistrar').click(function(){
         var numero = $('#numeroCasa').val();
         var direccion = $('#direccioncasa').val();
        $.ajax({
            data: "numeroCasa="+numero+"&direccioncasa="+direccion,
            url: "../class/ajax.php", 
            type: "post",
            success: function(result){
            $("#msg").html(result);
            location.reload();
        }});
        
        
    });
    
$('#btnRegistrar').click(function(){
         var numero = $('#numeroCasa').val();
         var direccion = $('#direccioncasa').val();
        $.ajax({
            data: "numeroCasa="+numero+"&direccioncasa="+direccion,
            url: "../class/ajax.php", 
            type: "post",
            success: function(result){
            $("#msg").html(result);
            location.reload();
        }});
        
        
    });



