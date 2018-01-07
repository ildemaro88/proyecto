/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
 $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
    $('#modalPrestamo').on('hidden.bs.modal', function(){ 
       $(this).find('#formPrestamo')[0].reset();         
        $('div').removeClass('has-error ');
        $('div').removeClass('has-success ');
        $('.help-block').remove();
       
        

    });

     $('#modalPrestamo').on('shown.bs.modal', function () {
      
      
       $('#nombrePrestamo').focus();
    });  
   
    $('#prestamos').DataTable({
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
        $('#modalPrestamo').modal("show");        
        $('#btnActualizarPrestamo').hide();
        $('#btnRegistrarPrestamo').show();
        //$('#formPrestamo')[0].reset();
        
        
    });

    $.validator.setDefaults( {
                submitHandler: function () {
                    alert( "submitted!" );
                }
            } );

   /* $( "#formPrestamo" ).validate( {
                rules: {
                    nombrePrestamo: "required",
                    cargoPrestamo: "required",
                    direccionPrestamo: "required",
                    telefonoPrestamo: {required: true, number: true},
                    apellidoPrestamo: "required",
                    ciPrestamo: "required"
                },
                messages: {
                    nombrePrestamo: "Este campo es obligatorio",
                    cargoPrestamo: "Este campo es obligatorio",
                    direccionPrestamo: "Este campo es obligatorio",
                    telefonoPrestamo: {required: "Este campo es obligatorio", number: "Introduzca solo números"},
                    apellidoPrestamo: "Este campo es obligatorio",
                    ciPrestamo: "Este campo es obligatorio"
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
            } );*/

   /* $('#btnRegistrarPrestamo').click(function(){

        if ($( "#formPrestamo" ).valid()){
             var nombre = $('#nombrePrestamo').val();
             var cargo = $('#cargoPrestamo').val();
             var direccion = $('#direccionPrestamo').val();
             var telefono = $('#telefonoPrestamo').val();
             var apellido = $('#apellidoPrestamo').val();
             var ci = $('#ciPrestamo').val();
             //alert(cantidad);
            $.ajax({
                data: "nombrePrestamo="+nombre+"&cargoPrestamo="+cargo+"&direccionPrestamo="+direccion+"&telefonoPrestamo="+telefono+"&apellidoPrestamo="+apellido+"&ciPrestamo="+ci,
                url: "../control/ControlPrestamo.php", 
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
    });*/

    $('#btnActualizarPrestamo').click(function(){
        
        if ($( "#formPrestamo" ).valid()){
            var prestamo = {
               id: $('#id').val(),
               idHerramienta: $('#idHerramienta').val(),
               cantidad: $('#cantidad').val(),
               estatus: $('#estatus').val(),

            };
            var prestamojson = JSON.stringify(prestamo);
            $.ajax({
                data: {prestamojson:prestamojson},
                url: "../control/ControlPrestamo.php", 
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
                        data:'idPrestamoE='+id,
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
    });

});




function editar(id){
    var id = id;

    $.ajax({
        data: "idPrestamo="+id,
        url: "../control/ControlPrestamo.php", 
        type: "post",
        dataType: "json",
        cache: false,
        success: function(result){
            $('#modalPrestamo').modal("show");
            $('#btnActualizarPrestamo').show();
            $('#responsable').val(result[0].responsable);
            $('#herramienta').val(result[0].herramienta);
            $('#cantidad').val(result[0].cantidad);
            $('#fechaSalida').val(result[0].fecha);
            $('#telefono').val(result[0].telefono);
            $('#id').val(result[0].id_prestamo);
            $('#idHerramienta').val(result[0].id_recurso);
            $('#estatus').val(result[0].id_estatus);
        
        },
       error: function(data) {
            alert("No puede editar los solicitudes de Material");
       

        
    }});

}