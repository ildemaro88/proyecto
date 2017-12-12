/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
		    $('#materiales').DataTable({
		    	"language": {
		            "lengthMenu": "Mostrar _MENU_ filas por página",
		            "zeroRecords": "No hay registros",
		            "info": "Mostrando página _PAGE_ de _PAGES_",
		            "infoEmpty": "Sin registros",
		            "search":"Buscar",
		            "infoFiltered": "(filtrado de _MAX_ registros totales)"
      }
    });
    
        $.validator.setDefaults( {
        submitHandler: function () {
            alert( "submitted!" );
        }
    } );

    $('#modalMaterial').on('shown.bs.modal', function () {
      $('#nombreMaterial').focus();
    });  

    $('#modalMaterial').on('hidden.bs.modal', function(){ 
       $(this).find('#formMaterial')[0].reset();         
        $('div').removeClass('has-error ');
        $('div').removeClass('has-success ');
        $('.help-block').remove();

    });


    $( "#formMaterial" ).validate( {
        rules: {
            nombreMaterial: "required",
            estatusMaterial: "required"            
        },
        messages: {
            nombreMaterial: "Este campo es obligatorio",
            estatusMaterial: "Este campo es obligatorio"            
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

    
    $('#btnNuevo').click(function(){
        $('#modalMaterial').modal("show");
        $('#formMaterial')[0].reset();
         $('#btnActualizarMaterial').hide();
        $('#btnRegistrarMaterial').show();
        
    });

    $('#btnActualizarMaterial').click(function(){
    
      if ($( "#formMaterial" ).valid()){
          var material = {
             id: $('#idMaterial').val(),
             nombre: $('#nombreMaterial').val(),
             estatus: $('#estatusMaterial').val(),
             tipo:"2"            
          };
          var recursojson = JSON.stringify(material);
          $.ajax({
              data: {recursojson:recursojson},
              url: "../control/ControlRecurso.php", 
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

     $('#btnRegistrarMaterial').click(function(){
         var nombre = $('#nombreMaterial').val();
         var estatus = $('#estatusMaterial').val();
         if ($( "#formMaterial" ).valid()){
        $.ajax({
            data: "nombreRecurso="+nombre+"&estatusRecurso="+estatus+"&tipoRecurso=2",
            url: "../control/ControlRecurso.php", 
            type: "post",
            success: function(result){
               if(result != "0"){        
                  $("#msg").css({'color':'green'})           
                  $("#msg").html(result);
                  location.reload();
                }
                else{
                   $("#msg").css({'color':'red'})
                   $("#msg").html("El material "+ nombre +" ya se encuentra registrado. Verifique el Inventario.");
                }
            //$("#msg").html(result);
           //location.reload();
        }});
        
      }  
    });

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
                    var $modalDiv = $(e.delegateTarget);
                    var id = $(this).data('recordId');
                    
                    $.ajax({
                        data:'idRecursoE='+id,
                        url: "../control/ControlRecurso.php", 
                        type: 'post',
                        success: function(data) {
                            if(data !== "0"){
                                location.reload();                           
                            }else{
                                alert("El material no puede ser eliminado, debido a que existen cantidades prestadas");
                            }
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

    $('#formMaterial')[0].reset();
    $("label.error").remove();    
    var id = id;

    $.ajax({
        data: "idRecurso="+id,
        url: "../control/ControlRecurso.php", 
        type: "post",
        dataType: "json",
        cache: false,
        success: function(result){
            $('#modalMaterial').modal("show");

            $('#btnActualizarMaterial').show();
            $('#btnRegistrarMaterial').hide();
            $('#nombreMaterial').val(result[0].nombre);
            $('#estatusMaterial').val(result[0].estatus);
            $('#idMaterial').val(result[0].id_recurso);
            
        
        },
       error: function(data) {
            alert(data);
       

        
    }});

}