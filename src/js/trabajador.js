/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
 $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
    $('#modalTrabajador').on('hidden.bs.modal', function(){ 
       $(this).find('#formTrabajador')[0].reset();         
        $('div').removeClass('has-error ');
        $('div').removeClass('has-success ');
        $('.help-block').remove();
       
        

    });

     $('#modalTrabajador').on('shown.bs.modal', function () {
      
      
       $('#ciTrabajador').focus();
    });  
   
    $('#trabajadores').DataTable({
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
        $('#modalTrabajador').modal("show");        
        $('#btnActualizarTrabajador').hide();
        $('#btnRegistrarTrabajador').show();
        //$('#formTrabajador')[0].reset();
        
        
    });

    $.validator.setDefaults( {
                submitHandler: function () {
                    alert( "submitted!" );
                }
            } );

    $( "#formTrabajador" ).validate( {
                rules: {
                    nombreTrabajador: "required",
                    cargoTrabajador: "required",
                    direccionTrabajador: "required",
                    telefonoTrabajador: {required: true, number: true},
                    apellidoTrabajador: "required",
                    ciTrabajador: "required"
                },
                messages: {
                    nombreTrabajador: "Este campo es obligatorio",
                    cargoTrabajador: "Este campo es obligatorio",
                    direccionTrabajador: "Este campo es obligatorio",
                    telefonoTrabajador: {required: "Este campo es obligatorio", number: "Introduzca solo números"},
                    apellidoTrabajador: "Este campo es obligatorio",
                    ciTrabajador: "Este campo es obligatorio"
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

    $('#btnRegistrarTrabajador').click(function(){

        if ($( "#formTrabajador" ).valid()){
             var nombre = $('#nombreTrabajador').val();
             var cargo = $('#cargoTrabajador').val();
             var direccion = $('#direccionTrabajador').val();
             var telefono = $('#telefonoTrabajador').val();
             var apellido = $('#apellidoTrabajador').val();
             var ci = $('#ciTrabajador').val();
             //alert(cantidad);
            $.ajax({
                data: "nombreTrabajador="+nombre+"&cargoTrabajador="+cargo+"&direccionTrabajador="+direccion+"&telefonoTrabajador="+telefono+"&apellidoTrabajador="+apellido+"&ciTrabajador="+ci,
                url: "../control/ControlTrabajador.php", 
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
                   $("#msg").html("Ya existe un trabajador registrado con la C.I.: "+ ci +" .Por favor verifique e intente nuevamente.");
                }
                },
       error: function(data) {
            alert("error: "+ data);
            }});
     
         }
    });

    $('#btnActualizarTrabajador').click(function(){
        
        if ($( "#formTrabajador" ).valid()){
            var trabajador = {
               id: $('#idTrabajador').val(),
               nombre: $('#nombreTrabajador').val(),
               cargo: $('#cargoTrabajador').val(),
               direccion: $('#direccionTrabajador').val(),
               telefono: $('#telefonoTrabajador').val(),
               ci: $('#ciTrabajador').val(),
               apellido: $('#apellidoTrabajador').val()
            };
            var trabajadorjson = JSON.stringify(trabajador);
            $.ajax({
                data: {trabajadorjson:trabajadorjson},
                url: "../control/ControlTrabajador.php", 
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
                        data:'idTrabajadorE='+id,
                        url: "../control/ControlTrabajador.php", 
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
        data: "idTrabajador="+id,
        url: "../control/ControlTrabajador.php", 
        type: "post",
        dataType: "json",
        cache: false,
        success: function(result){
            $('#modalTrabajador').modal("show");
            $('#btnActualizarTrabajador').show();
            $('#btnRegistrarTrabajador').hide(); 
            $('#nombreTrabajador').val(result[0].nombre);
            $('#apellidoTrabajador').val(result[0].apellido);
            $('#ciTrabajador').val(result[0].ci);
            $('#cargoTrabajador').val(result[0].id_cargo);
            $('#direccionTrabajador').val(result[0].direccion);
            $('#telefonoTrabajador').val(result[0].telefono);
            $('#idTrabajador').val(result[0].id_trabajador);
        
        },
       error: function(data) {
            alert(data);
       

        
    }});

}