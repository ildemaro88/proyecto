<?php
require_once 'menu.php';
?>
<body >
    
    <?php if(!empty($_GET['backup'])){
    	echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?>
                <div >
                 <em id="msg" style="color: red "> Usuario/Contraseña Incorrectos. Intente de nuevo.</em>
                </div>
                <?php }?>


<div class="col-md-offset-5"><h4>RECURSOS PRESTADOS</h4></div>
<hr>
  <canvas id="oilChart" width="600" height="200"></canvas>

</body>
<script>
$(function (){

	$.ajax({
              data: {pie :'pppp'},
              url: "../control/ControlRecurso.php", 
              type: "post",
              success: function(result){ 
              	var labelss =[]; 
              	var datas =[]; 
              	var resultado = JSON.parse(result);
              	for(var i in resultado) {    

			    var item = resultado[i];   
			    //alert(item);
			   //employees.accounting.push({ 
			        labelss.push(item.nombre_recurso);
			        datas.push(item.cantidad);
			    //});
			}
              	
              	
              	var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: labelss,
    datasets: [
        {
            data: datas,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});

               
                
                
               },
              error: function(data) {
                alert("error: "+ data);

              
          }});



});

</script>