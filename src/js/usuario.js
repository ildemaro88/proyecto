/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    
    $('#modalUsuario').on('hidden.bs.modal', function(){ 
       $(this).find('#formUsuario')[0].reset();         
        $('div').removeClass('has-error ');
        $('div').removeClass('has-success ');
        $('.help-block').remove();
       
        

    });

     $('#modalUsuario').on('shown.bs.modal', function () {
      
      
       $('#idTrabajador').focus();
    });  
   
    $('#usuarios').DataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ filas por página",
            "zeroRecords": "No hay registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "search":"Buscar",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
      }
    });
    
    $('#btnNuevo').click(function(){
        $("label.error").remove();
        $('#modalUsuario').modal("show");        
        $('#btnActualizarUsuario').hide();
        $('#btnRegistrarUsuario').show();
        $('#trabajador').show();
    $('#nombreUsuario').prop('disabled', false);
    $('#clave').show();
        //$('#formUsuario')[0].reset();
        
        
    });

    $.validator.setDefaults( {
                submitHandler: function () {
                    alert( "submitted!" );
                }
            } );

    $( "#formUsuario" ).validate( {
                rules: {
                    idTrabajador: "required",
                    nombreUsuario: "required",
                    claveUsuario: "required",
                    rolUsuario: {required: true, number: true},
                    correo: "required",
                    estatusUsuario: "required"
                },
                messages: {
                    idTrabajador: "Este campo es obligatorio",
                    nombreUsuario: "Este campo es obligatorio",
                    claveUsuario: "Este campo es obligatorio",
                    rolUsuario: {required: "Este campo es obligatorio", number: "Solo números"},
                    correo: "Este campo es obligatorio",
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
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                                        $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );

    $('#btnRegistrarUsuario').click(function(){

        if ($( "#formUsuario" ).valid()){
             var idTrabajador = $('#idTrabajador').val();
             var nombre = $('#nombreUsuario').val();
             var clave = $('#claveUsuario').val();
             var rol = $('#rolUsuario').val();
             var correo = $('#correo').val();
             var estatus = $('#estatusUsuario').val();
             var actualiza =" ";
             //alert(cantidad);
            $.ajax({
                data: "nombreUsuario="+nombre+"&idTrabajador="+idTrabajador+"&clave="+clave+"&rol="+rol+"&correo="+correo+"&estatus="+estatus+"&actualiza="+actualiza,
                url: "../control/ControlUsuario.php", 
                type: "post",
                success: function(result){
                   // alert(result);
               if(result != "0"){  
                  $("#msg").css({'color':'green'})                   
                  $("#msg").html(result);
                  location.reload();
                }
                else{
                  $("#msg").css({'color':'red'})
                   $("#msg").html("Ya existe un usuario registrado para este trabajador .Por favor verifique e intente nuevamente.");
                }
                },
       error: function(data) {
            alert("error: "+ data);
            }});
     
         }
    });

    $('#btnActualizarUsuario').click(function(){
        
        if ($( "#formUsuario" ).valid()){
            var usuario = {
                id: $('#idUsuario').val(),
                  idTrabajador: $('#idTrabajador').val(),
             nombre : $('#nombreUsuario').val(),
             clave : $('#claveUsuario').val(),
              rol : $('#rolUsuario').val(),
             correo :$('#correo').val(),
              estatus : $('#estatusUsuario').val(),
              actualiza : " "
               
            };
            var usuariojson = JSON.stringify(usuario);
            $.ajax({
                data: {usuariojson:usuariojson},
                url: "../control/ControlUsuario.php", 
                type: "post",
                success: function(result){
                    $("#msg").css({'color':'green'})                   
                    $("#msg").html(result);
                    location.reload();
                 },
       error: function(data) {
            alert("error: "+ data);

                
            }});
     
         }
    });


   $('#confirm-delete').on('click', '.btn-ok', function(e) {
                    var $modalDiv = $(e.delegateTarget);
                    var id = $(this).data('recordId');
                    
                    $.ajax({
                        data:'idUsuarioE='+id,
                        url: "../control/ControlUsuario.php", 
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
    });

});




function editar(id){
    var id = id;

    $.ajax({
        data: "idUsuario="+id,
        url: "../control/ControlUsuario.php", 
        type: "post",
        dataType: "json",
        cache: false,
        success: function(result){
            $('#modalUsuario').modal("show");
            $('#btnActualizarUsuario').show();
            $('#trabajador').hide();
            $('#nombreUsuario').prop('disabled', true);
            $('#btnRegistrarUsuario').hide(); 
            $('#clave').hide(); 
            $('#idTrabajador').val(result[0].id_trabajador);
            $('#nombreUsuario').val(result[0].usuario);
            $('#rolUsuario').val(result[0].id_rol);
            $('#correo').val(result[0].correo);
            $('#estatus').val(result[0].id_estatus);
            //$('#telefonoTrabajador').val(result[0].telefono);
            $('#idUsuario').val(result[0].id_usuario);
        
        },
       error: function(data) {
            alert(data);
       

        
    }});

}