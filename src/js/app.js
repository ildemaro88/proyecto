
$(document).ready(function() {

	$('select').select2({  
	placeholder: 'Seleccione --',  
	  language: {

	    noResults: function() {

	      return "No hay resultado";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	});

});