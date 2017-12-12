/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('#casas').DataTable({
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
        $('#modalCasa').modal("show");
        $('#formCasa')[0].reset();
        
    });
    
    
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
    



