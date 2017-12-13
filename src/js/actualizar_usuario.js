/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    
    
    $( "#formUsuarioActualizar" ).validate( {
                rules: {
                    idTrabajador: "required",
                    nombreUsuario: "required",
                    claveUsuario: "required",
                    rolUsuario: "required",
                    correo: {required:true, email:true},
                    estatusUsuario: "required",
                    password: "required",
				    claveUsuario2: {
              required: true,
				      equalTo: "#claveUsuario"},
                },
                messages: {
                    idTrabajador: "Este campo es obligatorio",
                    nombreUsuario: "Este campo es obligatorio",
                    claveUsuario: "Este campo es obligatorio",
                    claveUsuario2: {required:"Este campo es obligatorio",equalTo:"Introduzca nuevamente la contraseña. Deben coincidir"},
                    rolUsuario:  "Este campo es obligatorio",
                    correo: {required:"Este campo es obligatorio",email:"Introduzca un correo electrónico válido"},
                    estatusUsuario: "Este campo es obligatorio"
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
                    $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
                                        $( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                                        $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                     $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
                                        $( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );

                }
            } );

    $('#btnUsuarioActualizar').click(function(){
        
        if ($( "#formUsuarioActualizar" ).valid()){
        	var cl = MD5($('#claveUsuario').val());
            var usuario = {
                id: $('#idUsuario').val(),
                  idTrabajador: $('#idTrabajador').val(),
             nombre : $('#nombreUsuario').val(),
             clave : cl,
              rol : $('#idRol').val(),
             correo :$('#correo').val(),
              estatus : '1',
              actualiza :"1"
               
            };
            var usuariojson = JSON.stringify(usuario);
            $.ajax({
                data: {usuarioClavejson:usuariojson},
                url: "../control/ControlUsuario.php", 
                type: "post",
                success: function(result){ 
                   $('#formUsuarioActualizar')[0].reset();
                   $('div').removeClass('has-error ');
                  $('div').removeClass('has-success ');

                   //$("#cantidadMaterialDisponible").html(" ");
                  $('.help-block').remove();
                    $("#msg").css({'color':'green'})                   
                    $("#msg").html(result);
                    //setTimeout(function() {
                        //$modalDiv.modal('hide').removeClass('loading');
                        //alert("Operacion Exitosa");
                    //}, 1000)
                    //location.reload();
                 },
       error: function(data) {
            alert("error: "+ data);

                
            }});
     
         }
    });
    
 });
 

    



